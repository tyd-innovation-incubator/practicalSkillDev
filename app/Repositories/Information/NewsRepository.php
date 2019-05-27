<?php
namespace App\Repositories\Information;

use App\Events\Sockets\Notification\NewsCreated;
use App\Jobs\Notifications\SendPostedNewsEmail;
use App\Jobs\Notifications\SendSms;
use App\Models\Information\News;
use App\Notifications\Information\CreatedNewsNotification;
use App\Repositories\Access\UserRepository;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\CodeValueRepository;
use App\Repositories\Sysdef\DocumentRepository;
use App\Services\Notifications\UserForNewsNotification;
use App\Services\Storage\Traits\AttachmentHandler;
use App\Services\Storage\Traits\FileHandler;
use Illuminate\Support\Facades\DB;


class NewsRepository extends BaseRepository
{

    use AttachmentHandler, FileHandler;

    const MODEL = News::class;

    protected $code_value;
    protected $base = null;
    protected $service;


    public function __construct()
    {
        $this->service = new UserForNewsNotification();
        $this->code_value = new CodeValueRepository();
    }

    /**
     * Store new News information
     * @param array $input
     * @return mixed
     */
    public function store(array $input)
    {
        $user_ = new UserRepository();
        return  DB :: transaction(function() use ($input, $user_){
            $news = $this->query()->create([
                'user_id'=>access()->id(),
                'title' =>$input['title'] ,
                'content' => $input['content'],
                'source' => $input['source'],
                'logistic_service_cv_id' => array_key_exists('service_type', $input) ? $input['service_type'] : null,
                'islocal' => $input['islocal'],
            ]);

            //Upload photos
            $this->uploadPhotos($news->id);

//          $this->userForNotificationService->setNews($news);

//          dispatch(new SendPostedNewsEmail($news));
            $this->service->queryUsersForNewsNotification($news);

            foreach($user_->getAll() as $user) {
                alert()->store($news,[
                    'user_id' => $user->id,
                    'type_cv_id' => 209,
                    'data' => __('strings.email.alert.alerts.information.news.news_post', ['title' => $news->title]),
                ]);
//                $user->notify(new CreatedNewsNotification($news));
//
//                //check settings and send email
//                if ($user->isNotificationSendable(185, array_key_exists('service_type', $input) ? $input['service_type'] : null, 'email')) {
//                }
//
//                //check settings and send sms
//                if ($user->isNotificationSendable(185, array_key_exists('service_type', $input) ? $input['service_type'] : null, 'sms')) {
//                }
            }

            event(new NewsCreated($news->title, $news->uuid));

            return $news;
        });
    }

    /**
     * Update existing news information
     * @param News $news
     * @param array $input
     * @return mixed
     */
    public function update(News $news, array $input)
    {
        return  DB :: transaction(function() use ($input, $news){
            $news->update([
                'title' =>$input['title'] ,
                'content' => $input['content'],
                'source' => $input['source'],
                'logistic_service_cv_id' => array_key_exists('service_type', $input) ? $input['service_type'] : null,
                'islocal' => $input['islocal'],
            ]);
            return $news;
        });
    }

    /**
     * Upload photos of news
     */
    public function uploadPhotos($id)
    {
        $documents = new DocumentRepository();
        $document_id = $documents->getNewsImageDocumentId();
        $news = $this->find($id);
        $user = access()->user();
        $this->base =  $this->real(tempo_per_user_dir() . DIRECTORY_SEPARATOR);
        $temp_folder =  $this->base  . DIRECTORY_SEPARATOR . $user->id;
        $files = glob($temp_folder . '/*');

        foreach($files as $file){
            //Make sure that this is a file and not a directory.
            if(is_file($file)){
                /*Attach documents- photos*/
                $news->documents()->attach([$document_id => [
                    'name' => pathinfo($file, 2),
                    'description' => pathinfo($file, 2),
                    'size' => filesize($file),
                    'mime' => mime_content_type($file),
                    'ext' => pathinfo($file, PATHINFO_EXTENSION),
                ]]);

                $uploadedDocument =  $news->documents()->where('document_id',$document_id)->orderBy('document_resource.id', 'desc')->first()->pivot;
                //save to news folder

                $this->base  = null;
                $this->base =  $this->real(news_dir() . DIRECTORY_SEPARATOR);
                $path = $this->base . DIRECTORY_SEPARATOR . $news->id . DIRECTORY_SEPARATOR . $document_id;
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

    /*Remove uploaded documents of news*/
    public function removePhoto($uploaded_doc_id)
    {
        return  DB :: transaction(function() use ($uploaded_doc_id){
            $news = $this->query()->whereHas('documents', function($query) use($uploaded_doc_id){
                $query->where('document_resource.id', $uploaded_doc_id);
            })->first();

            /*unlink image from folder - storage*/
            $file_path = $news->newsImageFileDir($uploaded_doc_id);
            if(is_file($file_path)){
                unlink($file_path);
            }
            /*Detach image from pivot table*/
            DB::table('document_resource')->where('id', $uploaded_doc_id)->delete();
            return $news;
        });
    }

    /*Delete news - soft delete*/
    public function delete(News $news)
    {
        $news->delete();
    }

    /**
     * Get all news for datatable
     */
    public function getForAdminDatatable()
    {
        $news = $this->query()->select([
            DB::raw("concat_ws(' ', users.name, users.othernames) as posted_by"),
            DB::raw("news.title"),
            DB::raw("code_values.name as category"),
            DB::raw("news.content"),
            DB::raw("news.source"),
            DB::raw("news.islocal"),
            DB::raw("news.created_at"),
            DB::raw("news.uuid"),
        ]) ->join("users", "users.id", "=", "news.user_id")
            ->leftJoin("code_values", "code_values.id", "=", "news.logistic_service_cv_id")->orderBy('news.id', 'desc');
        return $news;
    }

    /**
     * used on news.search page
     * @return mixed
     */
    public function getAll(){
        $query = $this->query()
            ->orderBy('id', 'desc')
            ->paginate(sysdef()->name('pagination_low'));
        return $query;
    }

    /**
     * Get all news by service
     * @param $logistic_service_cv_id
     * @return mixed
     */
    public function getAllByService($logistic_service_cv_id){
        $query = $this->query()
            ->where('logistic_service_cv_id', $logistic_service_cv_id)
            ->orderBy('id', 'desc')
            ->paginate(sysdef()->name('pagination_low'));
        return $query;
    }

    /*
     * Get $limit news by category, for similar news display
     */
    public function getAllByServiceLimit($id, $logistic_service_cv_id, $limit = 4){
        $query = $this->query()
            ->where('logistic_service_cv_id', $logistic_service_cv_id)
            ->where('id','<>', $id)
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get()->chunk(4);
        return $query;
    }

    /**
     * Display latest $limit news on homepage
     * @param $limit
     * @return mixed
     */
    public function getLatestNews($limit){
        $query = $this->query()
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
        return $query;
    }

    /**
     * @param $keyword
     * @return mixed
     * Get news using keyword submitted
     */
    public function getAllByKeyword($keyword){
        $query = $this->query()
            ->where(function($query) use($keyword){
                $query->where('title','~*', $keyword)->orWhere('content','~*', $keyword);
            })
            ->orderBy('id', 'desc')
            ->paginate(sysdef()->name('pagination_low'));
        return $query;
    }
}
