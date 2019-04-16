<?php
namespace App\Repositories\Sysdef;

use App\Models\Sysdef\Alert;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlertRepository extends BaseRepository
{
    const MODEL = Alert::class;

    /**
     * NotificationRepository constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getByUserAll($user_id){
        return $this->query()
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @param $user_id
     * @param $type_cv_id
     * @return mixed
     */
    public function getByUserByTypeAll($user_id, $type_cv_id){
        return $this->query()
            ->where('user_id', $user_id)
            ->where('type_cv_id', $type_cv_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getByUser($user_id){
        return $this->query()
            ->where('user_id', $user_id)
            ->whereNull('read_at')
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @param $user_id
     * @param $type_cv_id
     * @return mixed
     */
    public function getByUserByType($user_id, $type_cv_id){
        return $this->query()
            ->where('user_id', $user_id)
            ->where('type_cv_id', $type_cv_id)
            ->whereNull('read_at')
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @param $user_id
     * @param $type_cv_id
     * @return mixed
     */
    public function getByUserByTypeCount($user_id, $type_cv_id){
        return $this->query()
            ->where('user_id', $user_id)
            ->where('type_cv_id', $type_cv_id)
            ->whereNull('read_at')
            ->orderBy('id', 'desc')
            ->count();
    }

    /**
     * @param $user_id
     * @param $type_cv_id
     * @return mixed
     */
    public function getByUserByTypeHeader($user_id, $type_cv_id){
        return $this->query()
            ->where('user_id', $user_id)
            ->where('type_cv_id', $type_cv_id)
            ->whereNull('read_at')
            ->orderBy('id', 'desc')
            ->limit(sysdef()->name('pagination_summary'))
            ->get();
    }

    public function getUserAlertsForDatatable($user, $type){
        return $this->query()
            ->where('user_id', $user->id)
            ->where('type_cv_id', $type)
            ->orderBy('id', 'desc');
    }

    /**
     * @param Model $model
     * @param $input
     * @return mixed
     */
    public function store(Model $model, $input){
        return  DB::transaction(function() use ($input, $model) {
            $alert = $this->query()->create([
                'user_id' => $input['user_id'],
                'type_cv_id' => $input['type_cv_id'],
                'data' => $input['data'],
                'resource_id' => $model->id,
                'resource_type' => $model->id
            ]);
            $model->alert()->save($alert);
            return $alert;
        });
    }

    /**
     * @param $alert
     * @return mixed
     */
    public function destroy($alert){
        return  DB::transaction(function() use ($alert) {
            $alert->delete();
        });
    }

    /**
     * Deletes all alerts based on user session
     * @return mixed
     */
    public function destroyAll(){
        return  DB::transaction(function() {
            $this->query()
                ->where('user_id', access()->user()->id)
                ->delete();
        });
    }

    /**
     * Mark this alert as read
     * @param $alert
     * @return mixed
     */
    public function markAsRead($alert)
    {
        return  DB :: transaction(function() use ($alert){
            if(is_null($alert->read_at)){
                $alert->update([
                    'read_at' => Carbon::now(),
                ]);
            }
            return $alert;
        });
    }

    /**
     * On each show/profile controller function mark a model is read at on alert
     * @param $user_id
     * @param $resource_type
     * @param $resource_id
     * @return mixed
     */
    public function markRead($user_id, $resource_type, $resource_id) {
        return  DB :: transaction(function() use ($user_id, $resource_type, $resource_id) {
            $this->query()
                ->where('user_id', $user_id)
                ->where('resource_type', $resource_type)
                ->where('resource_id', $resource_id)
                ->whereNull('read_at')
                ->update([
                    'read_at' => Carbon::now(),
                ]);
        });
    }

    /**
     * Mark all alerts as read
     * @return mixed
     */
    public function markAllAsRead()
    {
        return  DB :: transaction(function(){
            $this->query()
                ->where('user_id', access()->user()->id)
                ->update([
                    'read_at' => Carbon::now(),
                ]);
        });
    }

    public function markReadByTypeCv($user_id, $type_cv_id) {
        return  DB :: transaction(function() use ($user_id, $type_cv_id) {
            $this->query()
                ->where('user_id', $user_id)
                ->where('type_cv_id', $type_cv_id)
                ->whereNull('read_at')
                ->update([
                    'read_at' => Carbon::now(),
                ]);
        });
    }
}
