<?php
namespace App\Repositories\Information;

use App\Models\Information\ForumReport;
use App\Repositories\BaseRepository;
use App\Repositories\Information\ForumThreadRepository;
use Illuminate\Support\Facades\DB;


class ForumReportRepository extends BaseRepository
{
    const MODEL = ForumReport::class;

    protected $forum;
    protected $forum_thread;

    public function __construct()
    {
        $this->forum = new ForumRepository();
        $this->forum_thread = new ForumThreadRepository();
    }

    public function getAll(){
        $query = $this->query()
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return $query;
    }

    public function storeForumReport(array $input, $report, $type){
        //type: forum or thread
        return DB::transaction(function () use ($input, $report, $type) {
            if($type == "thread") {
                $forum = $this->forum->find($report->forum_id);
                $forum_report = $this->query()->create([
                    'forum_thread_id' => $report->id,
                    'message' => $input['message'],
                    'user_id' => access()->id(),
                ]);
                return $forum->uuid;
            }elseif($type == "forum"){
                $forum_report = $this->query()->create([
                    'forum_id' => $report->id,
                    'message' => $input['message'],
                    'user_id' => access()->id(),
                ]);
                return $report->uuid;
            }
        });
    }

    public function forumReportDestroy($id){
        DB::transaction(function () use ($id) {
            $this->find($id)->delete();
        });
    }

    public function forumReportDestroyAll(){
        DB::transaction(function () {
            $this->query()->delete();
        });
    }
}