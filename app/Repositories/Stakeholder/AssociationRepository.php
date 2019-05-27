<?php
namespace App\Repositories\Stakeholder;


use App\Exceptions\GeneralException;
use App\Imports\Stakeholder\AssociationMemberImport;
use App\Models\Stakeholder\Association;
use App\Models\Stakeholder\AssociationMember;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\DocumentRepository;
use App\Services\Stakeholder\UserForCreatedAssoiationNotification;
use App\Services\Storage\Traits\AttachmentHandler;
use App\Services\Storage\Traits\FileHandler;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use PhpParser\Node\Expr\AssignOp\Mod;
use Webpatser\Uuid\Uuid;


class AssociationRepository extends BaseRepository
{
    use FileHandler, AttachmentHandler;

    const MODEL = Association::class;
    protected $base = null;
    protected $documents;
    protected $service;


    /**
     * AssociationRepository constructor.
     * @throws \App\Exceptions\GeneralException
     */
    public function __construct()
    {
        $this->documents = new DocumentRepository();
        $this->base = $this->real(association_dir() . DIRECTORY_SEPARATOR);
        if (!$this->base) {
            throw new GeneralException('Base directory does not exist');
        }
        $this->service = new UserForCreatedAssoiationNotification();
    }

    /*Get the list of Association with pagination */
    public function getAll(){
        $query = $this->query()
            ->orderBy('id', 'desc')
            ->paginate(sysdef()->name('pagination_high'));
        return $query;
    }


    /*Get the list of Association administered by Contact person*/
    public  function  getAssociationAdministeredByUser(Model $user)
    {
        return $user->associations;
    }

    /*Get association by id*/

    public  function getAssociationById($id){
        return $this->query()->where(['association_id',$id]);
    }

    /*Get association by id*/

    public  function getAssociationByCodeId(Model $association ,$content_type){
        $contents = $association->associationContents()->where('content_type_cv_id', $content_type)->get();
        return $contents;
    }

    /* store a new created Association*/
    public function store(array $input)
    {
        return DB::transaction(function () use($input){
            $association = $this->query()->create([
                'name'=>$input['name'],
                'code_value_id'=>$input['logistic_association'],
                'phone'=>$input['phone'],
                'telephone'=>$input['telephone'],
                'email'=>$input['email'],
                'fax'=>$input['fax'],
                'web'=>$input['web'],
                'box'=>$input['box'],
                'description'=>$input['description'],
            ]);
            $this->attachUser($association);
            $this->service->queryUserForAssociationCreatedNotification($association);
            return $association;
        });
    }

    /* update an existing association*/
    public function  update(array $input,Association $association)
    {
        return DB::transaction(function () use($input,$association){
            $association->update([
                'name'=>$input['name'],
                'code_value_id'=>$input['logistic_association'],
                'phone'=>$input['phone'],
                'telephone'=>$input['telephone'],
                'email'=>$input['email'],
                'fax'=>$input['fax'],
                'web'=>$input['web'],
                'box'=>$input['box'],
                'description'=>$input['description'],
            ]);

            return $association;
        });
    }

    /*Delete Association*/
    public function delete(Association $association)
    {
        $association->delete();
    }

    /*Attach user to the association */
    public function attachUser(Model $association)
    {
        $user = access()->user();
        $association->users()->attach([$user->id =>  ['isadmin' => 1, 'isregister' => 1]]);
    }

    /*Attatch association contents in association*/
    public  function  attachContent(array $input,Association $association)
    {

        $association->associationContents()->attach([$input['content_type']=>[
            'title'=>$input['title'],
            'description'=>$input['description'],
            'uuid'=>  (string) Uuid::generate(4),
        ]]);
    }

    /*update attached association contents*/
    public  function  updateContents(array  $input,$association_content)
    {
        $association_content = DB::table('association_content')->where('uuid', $association_content)
            ->update([
                'content_type_cv_id'=>$input['content_type'],
                'title'=>$input['title'],
                'description'=>$input['description'],
            ]);
    }

    /*delete attached association content*/
    public  function  deleteContent($association_content)
    {
        $association_content = DB::table('association_content')->where('uuid', $association_content)->delete();
    }


    /*get association contents for datatable*/
    public function  getContentsForDataTable(Model $association, $content_type)
    {
        $contents = $association->associationContents()->where('content_type_cv_id', $content_type);
        return $contents;
    }



    /**
     * @param Model $association
     * @param $document_id => document id which is going to be attached i.e. logo, Tin
     * @param $file_key_name => name of input on the create request
     * Attach association document files i.e. tin, logo, certificates.
     */
    public function attachAssociationDocument(Model $association, $document_id, $file_key_name)
    {
        DB::transaction(function () use ($association, $file_key_name, $document_id) {
            /*Attach to document pivot table*/
            if (request()->hasFile($file_key_name)) {
                $file = request()->file($file_key_name);
                if ($file->isValid()) {
                    /*Check if already attached - if exist detach*/
                    $this->unlinkAssociationAttachmentFile($association, $document_id);
                    /*Save into pivot table*/
                    $association->documents()->sync([$document_id => [
                        'name' => $file->getClientOriginalName(),
                        'description' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'mime' => $file->getMimeType(),
                        'ext' => $file->getClientOriginalExtension(),
                    ]]);
                }
                $path = $this->base . DIRECTORY_SEPARATOR . $association->id . DIRECTORY_SEPARATOR . $document_id;
                $uploadedDocument = ($association->documents()->where('document_id', $document_id)->count() > 0) ? $association->documents()->where('document_id',$document_id)->orderBy('document_resource.id', 'desc')->first()->pivot : null ;
                /*Unlink if exist*/
                if (count($uploadedDocument)) {
                    $file_path = $association->associationAttachmentFile($uploadedDocument->id);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }

                /*Save Document*/
                $this->saveDocument($association, $file_key_name, $path, $uploadedDocument);
//                $data = Excel::load($path)->get();

            } else {
                return false;
            }
        });

    }




    /* Detach/unlink association attachment and attachment from directory*/
    public function unlinkAssociationAttachmentFile(Model $association, $document_id)
    {
        if (($association->documents()->where('document_id', $document_id)->count() > 0)){
            /*Detach attachment from dir*/
            $uploaded_doc = $association->documents()->where('document_id', $document_id)->orderBy('document_resource.id')->first();
            $file_path = $association->associationAttachmentFile($uploaded_doc->pivot->id);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }

    /**
     * Upload association members from excel
     */
    public function uploadAssociationMembers(Model $association, array $input)
    {
        DB::transaction(function () use ($association) {
            /*Start attach document*/
            $documents = new DocumentRepository();
            $document_id = $documents->getAssociationMembersDocumentId();
            $file_key_name = 'document_file15';// as reffered on the file input on the blade
            $this->attachAssociationDocument($association, $document_id, $file_key_name);
            /*end attach document*/

            /*Start upload members from doc to db table*/
            $most_recent_members_document = $association->documents()->orderBy('document_resource.id', 'desc')->first();
            $this->uploadAssociationMembersToTable($association, $most_recent_members_document);
            /*End upload members from doc to db table*/
        });
    }


    /**
     * @param Model $association
     * @param $recent_member_doc
     * Upload members into db table from the uploaded excel
     */
    public function uploadAssociationMembersToTable(Model $association, $recent_member_doc)
    {

        $uploaded_cod_id = $recent_member_doc->pivot->id;//document resource
        $linked_file = $association->associationAttachmentFile($uploaded_cod_id);
        $pivot_doc = $recent_member_doc->pivot;
        $input = ['association' => $association, 'document_resource_id' => $pivot_doc->id];

        $headings = (new HeadingRowImport())->toArray($linked_file);

//        /** start : Check if all excel headers are present */

        $verifyArr = ['company_name','registration_number','tin'];
        foreach ($verifyArr as $key) {
            if (!in_array($key,$headings[0][0], true)) {
                throw new GeneralException(trans('exceptions.upload.column_missing', ['column' => $key]));
            }
        }
        /** end : Check if all excel headers are present */

        /*Flag off existing members for new import*/
        $this->resetIsrenewAllMembers($association->id);
        /*Import Data*/
        Excel::import(new AssociationMemberImport($input), $linked_file);

//        $reader = Excel::load($linked_file)->get();
//        $headerRow = $reader->first()->keys()->toArray();


//
//        /*update rows imported*/
//        Excel::load($linked_file, function($reader) use ($pivot_doc) {
//            $objWorksheet = $reader->getActiveSheet();
//            //exclude the heading
//            $upload_checker = [
//                'total_rows' => $objWorksheet->getHighestRow() - 1,
//                'rows_imported' => 0,
//                'upload_error' => NULL,
//                'error' => 0,
//            ];
//            $pivot_doc->upload_checker = serialize($upload_checker);
//            $pivot_doc->save();
//        });

//        /** start : Uploading excel data into the database */
//        Excel::filter('chunk')
//            ->selectSheetsByIndex(0)
//            ->load($linked_file)
//            ->chunk(250, function($result)  use($pivot_doc, $association, $linked_file)  {
//                $rows = $result->toArray();
//
//                try {
//                    //let's do more processing (change values in cells) here as needed
//                    //$counter = 0;
//                    foreach ($rows as $row) {
//
//                        $error = 0;
//                        foreach ($row as $key => $value) {
//                            /*check if there is any error*/
//
//                        }

        /* end: Validating row entries */

        /* insert into db */

//                        $data = ['name' => $row['company_name'], 'tin' => $row['tin'], 'external_reference' => $row['registration_number'], 'association_id' => $association->id, 'document_resource_id' => $pivot_doc->id];
//                        $association_member_id = DB::table('association_members')->insertGetId(
//                            $data
//                        );
//                        /*update rows imported*/
//                        $this->updateUploadChecker($association, $pivot_doc);


//                    }
//
//                } catch (\Exception $e) {
//                    // an error occurred
//                    $error_message = $e->getMessage();
//                    $this->saveExceptionMessage($association, $pivot_doc,$error_message);
//                }
//
//
//            }, true);

    }

    /*Reset all members of this association before new import of active members*/
    public function resetIsrenewAllMembers($association_id)
    {
        /*reset association member*/
        AssociationMember::query()->where('association_id', $association_id)->update([
            'isrenewed' => 0,
        ]);
        /*reset company association*/
        DB::table('company_association')->where('logistic_association_cv_id', $association_id)->update(['member_active' => 0]);
    }


    /*Update/activate membership status*/
    public function activateMemberStatus($association_id, $external_reference)
    {
        DB::table('company_association')->where('external_reference', $external_reference)->where('logistic_association_cv_id',$association_id)->update(['member_active' => 1]);
    }


    /**
     * @param $association_id
     * Sync membership status when uploading members of associations
     *
     */
    public function syncMembershipStatus($association_id)
    {
        $renewed_members_reg_nos = AssociationMember::query()->where('association_id', $association_id)->where('isrenewed', 1)->pluck('company_id')->all();
        /*reset all on company_association*/
        DB::table('company_association')->where('association_id', $association_id)->update(['member_active' => 0]);
        /*Set company association*/
        DB::table('company_association')->where('association_id', $association_id)->whereIn('external_reference', $renewed_members_reg_nos)->update(['member_active' => 1]);
    }


    /* Save exception method when uploading employee list */
    public function saveExceptionMessage(Model $association, $pivot_doc,$exception_message){

        $member_uploaded_count = $association->associationMembers()->where('document_resource_id', $pivot_doc->id);
        $linked_file = $association->associationAttachmentFile($pivot_doc->id);
        Excel::load($linked_file, function($reader) use ($pivot_doc, $association, $exception_message, $member_uploaded_count) {
            $objWorksheet = $reader->getActiveSheet();
            //exclude the heading
            $upload_checker = [
                'total_rows' => $objWorksheet->getHighestRow() - 1,
                'rows_imported' => $member_uploaded_count,
                'upload_error' => $exception_message,
                'error' => 1,
            ];
            $pivot_doc->upload_checker = serialize($upload_checker);
            $pivot_doc->save();
        });
    }

    /*Update upload checker*/
    public function updateUploadChecker(Model $association, $pivot_doc)
    {
        $member_uploaded_count = $association->associationMembers()->where('document_resource_id', $pivot_doc->id);
        $unserialized_upload_checker = unserialize($pivot_doc->upload_checker);
        $upload_checker = [
            'total_rows' => $unserialized_upload_checker['total_rows'],
            'rows_imported' => $member_uploaded_count,
            'upload_error' => $unserialized_upload_checker['upload_error'],
            'error' =>$unserialized_upload_checker['error'],
        ];
        $pivot_doc->upload_checker = serialize($upload_checker);
        $pivot_doc->save();
    }


    /*Check if company is active member*/
    public function checkIfCompanyIsActiveMember($association_cv_id, $reg_no)
    {
        $association = $this->query()->where('code_value_id', $association_cv_id)->first();
        if(isset($association->id)) {
            $check = AssociationMember::query()->where('association_id', $association->id)->where('external_reference', $reg_no)->where('isrenewed', 1)->count();
            if ($check > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
