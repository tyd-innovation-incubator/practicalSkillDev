<?php
namespace App\Repositories\Information;

use App\Exceptions\GeneralException;
use App\Models\Information\Legislation;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\DocumentRepository;
use App\Services\Storage\Traits\AttachmentHandler;
use App\Services\Storage\Traits\FileHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LegislationRepository extends BaseRepository
{

    use AttachmentHandler, FileHandler;

    const MODEL = Legislation::class;

    protected $base = null;
    protected $documents;

    /**
     * LegislationRepository constructor.
     */
    public function __construct()
    {
        $this->base = $this->real(legislation_dir() . DIRECTORY_SEPARATOR);
        if (!$this->base) {
            throw new GeneralException('Base directory does not exist');
        }
    }

    public function getAllPaginate(){
        return $this->query()->paginate(sysdef()->name('pagination_low'));
    }

    public function getForAdminDataTable(){
        return $this->query();
    }

    public function getAllByService($authority_id){
        return $this->query()->whereHas('authority', function ($q) use ($authority_id) {
            $q->where('authority_cv_id', $authority_id);
        })->get();
    }

    /**
     * @param array $input
     * @return mixed
     * Store legislation information
     */
    public function store(array $input)
    {
        return  DB :: transaction(function() use ($input){
            $legislation = $this->query()->create([
                'user_id'=>access()->id(),
                'authority_cv_id' =>$input['authority'] ,
                'description' => $input['description'],
                'title' => $input['title'],
                'source' => $input['source'],
                'legislation_cv_id' => array_key_exists('type', $input) ?  $input['type'] : null,
                'logistic_service_cv_id' => array_key_exists('service_type', $input) ?  $input['service_type'] : null,
                'logistic_service_sub_cv_id' => array_key_exists('sub_service_type', $input) ?  $input['sub_service_type'] : null,
                'effective_date' => standard_date_format($input['date']),
            ]);
            //Upload files
            $this->uploadFile($legislation,'file');
            return $legislation;
        });
    }

    /**
     * @param Legislation $legislation
     * @param array $input
     * @return mixed
     */
    public function update(Legislation $legislation,  array $input)
    {
        return  DB :: transaction(function() use ($input, $legislation){
            $legislation->update([
                'authority_cv_id' =>$input['authority'] ,
                'legislation_cv_id' =>$input['type'] ,
                'description' => $input['description'],
                'title' => $input['title'],
                'source' => $input['source'],
                'logistic_service_cv_id' => array_key_exists('service_type', $input) ?  $input['service_type'] : null,
                'logistic_service_sub_cv_id' => array_key_exists('sub_service_type', $input) ?  $input['sub_service_type'] : null,
                'effective_date' => standard_date_format($input['date']),
            ]);
            //Upload files
            $this->uploadFile($legislation, 'file');
            return $legislation;
        });
    }

    public function delete(Legislation $legislation)
    {
        $legislation->delete();
    }


    /**
     * @param Model $legislation
     * @param $file_key_name
     */
    public function uploadFile(Model $legislation, $file_key_name)
    {
        DB::transaction(function () use ($legislation, $file_key_name) {
            $documents = new DocumentRepository();
            $document_id = $documents->getRegulationFileDocumentId();
            /*Attach to document pivot table*/
            if (request()->hasFile($file_key_name)) {
                $file = request()->file($file_key_name);
                if ($file->isValid()) {
                    /*Check if already attached - if exist detach*/
                    $this->unlinkLegislationFile($legislation, $document_id);
                    /*Save into pivot table*/
                    $legislation->documents()->syncWithoutDetaching([$document_id => [
                        'name' => $file->getClientOriginalName(),
                        'description' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'mime' => $file->getMimeType(),
                        'ext' => $file->getClientOriginalExtension(),
                    ]]);
                }

                $uploadedDocument = count($legislation->documents()->where('document_id', $document_id)->first()) ? $legislation->documents()->where('document_id',$document_id)->first()->pivot : null ;
                $path = $this->base . DIRECTORY_SEPARATOR . $legislation->id . DIRECTORY_SEPARATOR . $document_id ;
                /*Unlink if exist*/
                if (count($uploadedDocument)) {
                    $file_path = $legislation->legislationFileDir($uploadedDocument->id);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                /*Save Document*/
                $this->saveDocument($legislation, $file_key_name, $path, $uploadedDocument);
            } else {
                return false;
            }
        });

    }

    /**
     * Detach/unlink Legislation attachment and attachment from directory
     */
    public function unlinkLegislationFile(Model $legislation, $document_id)
    {
        $uploadedDocument = $legislation->documents()->where('document_id', $document_id)->first() ;

            if (count($uploadedDocument)){
                /*Detach attachment from dir*/
                $file_path = $legislation->legislationFileDir($uploadedDocument->pivot->id);

                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

    }
}
