<?php
namespace App\Repositories\Information;

use App\Jobs\Notifications\SendSms;
use App\Models\Information\Event;
use App\Notifications\Information\CreateEventNotification;
use App\Repositories\Access\UserRepository;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\CodeValueRepository;
use App\Repositories\Sysdef\DocumentRepository;
use App\Services\Notifications\UserForEventNotification;
use App\Services\Storage\Traits\AttachmentHandler;
use App\Services\Storage\Traits\FileHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EventRepository extends BaseRepository
{

    use AttachmentHandler, FileHandler;

    const MODEL = Event::class;

    protected $code_value;
    protected $base = null;
    protected $service;

    public function __construct()
    {
        $this->code_value = new CodeValueRepository();
        $this->service = new UserForEventNotification();
    }


    /**
     * @param array $input
     * @return mixed
     */
    public function store(array $input)
    {
        $user_ = new UserRepository();
        return  DB :: transaction(function() use ($input, $user_){
            $event = $this->query()->create([
                'user_id'=>access()->id(),
                'event_type_cv_id' =>$input['event_type'] ,
                'description' => $input['description'],
                'host' => $input['host'],
                'title' => $input['title'],
                'time' => $input['time'],
                'location' => $input['location'],
                'start_date' =>  standard_date_format($input['start_date']),
                'end_date' => standard_date_format($input['end_date']),
            ]);
            //Upload photos
            $this->uploadPhotos($event->id);

            $this->service->queryUsersForEventNotification($event);
//            foreach($user_->getAll() as $user) {
//                //check settings and send email
//                if ($user->isNotificationSendable(186, array_key_exists('service_type', $input) ? $input['service_type'] : null, 'email')) {
//                    $user->notify(new CreateEventNotification($user));
//                }
//                //check settings and send sms
//                if ($user->isNotificationSendable(186, array_key_exists('service_type', $input) ? $input['service_type'] : null, 'sms')) {
//                    SendSms::dispatch($user, trans('strings.sms.accepted_offer'));
//                }
//            }
            return $event;
        });
    }


    /**
     * @param Event $event
     * @param array $input
     * @return mixed
     */
    public function update(Event $event, array $input)
    {
        return  DB :: transaction(function() use ($input, $event){
            $event->update([
                'event_type_cv_id' =>$input['event_type'] ,
                'description' => $input['description'],
                'host' => $input['host'],
                'title' => $input['title'],
                'time' => $input['time'],
                'location' => $input['location'],
                'start_date' =>  standard_date_format($input['start_date']),
                'end_date' => standard_date_format($input['end_date']),
            ]);
            return $event;
        });
    }


    /**
     * Upload photos of event
     */
    public function uploadPhotos($id)
    {
        $documents = new DocumentRepository();
        $document_id = $documents->getEventImageDocumentId();
        $event = $this->find($id);
        $user = access()->user();
        $this->base =  $this->real(tempo_per_user_dir() . DIRECTORY_SEPARATOR);
        $temp_folder =  $this->base  . DIRECTORY_SEPARATOR . $user->id;
        $files = glob($temp_folder . '/*');

        foreach($files as $file){
            //Make sure that this is a file and not a directory.
            if(is_file($file)){
                /*Attach documents- photos*/
                $event->documents()->attach([$document_id => [
                    'name' => pathinfo($file, 2),
                    'description' => pathinfo($file, 2),
                    'size' => filesize($file),
                    'mime' => mime_content_type($file),
                    'ext' => pathinfo($file, PATHINFO_EXTENSION),
                ]]);

                $uploadedDocument =  $event->documents()->where('document_id',$document_id)->orderBy('document_resource.id', 'desc')->first()->pivot;
                //save to $event folder
                $this->base  = null;
                $this->base =  $this->real(event_dir() . DIRECTORY_SEPARATOR);
                $path = $this->base . DIRECTORY_SEPARATOR . $event->id . DIRECTORY_SEPARATOR . $document_id;
                $this->makeDirectory($path);
                $image_name = $uploadedDocument->id . '.' . $uploadedDocument->ext;
                $image_path = $path . DIRECTORY_SEPARATOR . $image_name;
                fopen($image_path , 'w');
                rename($file, $image_path);

                //Use the unlink function to delete the file from temporary folder.
//                unlink($file);
            }
        }
//        /*Check if temp folder is empty and then delete*/
        $files = glob($temp_folder . '/*');
        if(count($files)==0 && file_exists($temp_folder)) {
            rmdir($temp_folder);
        }
    }

    /*Remove uploaded photo of event*/
    public function removePhoto($uploaded_doc_id)
    {
        return  DB :: transaction(function() use ($uploaded_doc_id){
            $event = $this->query()->whereHas('documents', function($query) use($uploaded_doc_id){
                $query->where('document_resource.id', $uploaded_doc_id);
            })->first();

            /*unlink image from folder - storage*/
            $file_path = $event->eventImageFileDir($uploaded_doc_id);
            if(is_file($file_path)){
                unlink($file_path);
            }
            /*Detach image from pivot table*/
            DB::table('document_resource')->where('id', $uploaded_doc_id)->delete();
            return $event;
        });
    }



    /*Delete $event - soft delete*/
    public function delete(Event $event)
    {
        $event->delete();
    }

    /**
     * Get all events for datatable for admin
     */
    public function getForAdminDatatable()
    {
        $events = $this->query()->select([
            DB::raw("concat_ws(' ', users.name, users.othernames) as posted_by"),
            DB::raw("events.title"),
            DB::raw("code_values.name as event_type"),
            DB::raw("events.host"),
            DB::raw("events.time"),
            DB::raw("events.location"),
            DB::raw("events.description"),
            DB::raw("events.start_date"),
            DB::raw("events.end_date"),
            DB::raw("events.created_at"),
            DB::raw("events.uuid"),

        ]) ->join("users", "users.id", "=", "events.user_id")
            ->leftJoin("code_values", "code_values.id", "=", "events.event_type_cv_id")->orderBy('events.id', 'desc');

        return $events;
    }

    /**
     * Get all events for datatable by a certain association only
     */
    public function getByAssociationDatatable($association)
    {
        $events = $this->query()->select([
            DB::raw("concat_ws(' ', users.name, users.othernames) as posted_by"),
            DB::raw("events.title"),
            DB::raw("code_values.name as event_type"),
            DB::raw("events.host"),
            DB::raw("events.time"),
            DB::raw("events.location"),
            DB::raw("events.description"),
            DB::raw("events.start_date"),
            DB::raw("events.end_date"),
            DB::raw("events.created_at"),
            DB::raw("events.uuid"),

        ]) ->join("users", "users.id", "=", "events.user_id")
            ->join("association_user", "association_user.id", "=", "events.user_id")
            ->leftJoin("code_values", "code_values.id", "=", "events.event_type_cv_id")->orderBy('events.id', 'desc')
            ->where('association_user.association_id', $association->id);

        return $events;
    }


    /*Get all events*/
    public function getAll(){
        $query = $this->query()
            ->orderBy('id', 'desc')
            ->paginate(10);
        return $query;
    }

    public function getLatest($limit){
        $query = $this->query()
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
        return $query;
    }

    /*Get events using category and limit*/
    public function getAllByEventLimit($id, $event_type_cv_id, $limit = 4){
        $query = $this->query()
            ->where('event_type_cv_id', $event_type_cv_id)
            ->where('id','<>', $id)
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get()->chunk(4);
        return $query;
    }

    /*Get events using category selected*/
    public function getAllByEvent($event_type_cv_id){
        $query = $this->query()
            ->where('event_type_cv_id', $event_type_cv_id)
            ->orderBy('id', 'desc')
            ->paginate(sysdef()->name('pagination_low'));
        return $query;
    }


    /**
     * @param $keyword
     * @return mixed
     * Get events using keyword submitted
     */
    public function getAllByKeyword($keyword){
        $query = $this->query()
            ->where(function($query) use($keyword){
                $query->where('title','~*', $keyword)->orWhere('description','~*', $keyword)->orWhere('host','~*', $keyword);
            })
            ->orderBy('id', 'desc')
            ->paginate(sysdef()->name('pagination_low'));
        return $query;
    }


}
