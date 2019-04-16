<?php
namespace App\Repositories\Sysdef;

use App\Models\Sysdef\Feedback;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FeedbackRepository extends BaseRepository
{
    const MODEL = Feedback::class;

    /**
     * FeedbackRepository constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $isreviewed
     * @return mixed
     */
    public function getAllForAdminDatatable($isreviewed)
    {
        return $this->query()->orderBy('id', 'desc')->where('isreviewed', $isreviewed);
    }

    /**
     * @param Feedback $feedback
     * @return mixed
     */
    public function setReadAt(Feedback $feedback){
        return  DB :: transaction(function() use ($feedback){
            $feedback->update([
                'read_at' => Carbon::now(),
            ]);
            return $feedback;
        });
    }

    /**
     * @param Feedback $feedback
     * @param $review
     * @return mixed
     */
    public function review(Feedback $feedback, $review){
        return  DB :: transaction(function() use ($feedback, $review){
            $feedback->update([
                'isreviewed' => $review,
            ]);
            return $feedback;
        });
    }

    public function reviewAll($review){
        return  DB :: transaction(function() use ($review){
            $feedback = $this->query()->update([
                'isreviewed' => $review,
            ]);
            return $feedback;
        });
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input) {
        return DB::transaction(function () use($input){
            if(access()->check()) {
                $user = access()->user();
                $feedback = $this->query()->create([
                    'user_id' =>$user->id,
                    'comment'=>$input['message'],
                ]);
                return $feedback;
            } else {
                $feedback = $this->query()->create([
                    'name' => $input['name'],
                    'phone' => $input['phone'],
                    'email' => $input['email'],
                    'comment'=>$input['message'],
                ]);
                return $feedback;
            }
        });
    }

    /**
     * @param Feedback $feedback
     * @return mixed
     */
    public function destroy(Feedback $feedback)
    {
        return DB::transaction(function () use($feedback) {
            $feedback->delete();
        });
    }

    /**
     * @param Feedback $feedback
     * @return mixed
     */
    public function destroyAll()
    {
        return DB::transaction(function () {
            $this->query()->delete();
        });
    }
}
