<?php

namespace App\Repositories\Information;

use App\Models\Information\ForumThread;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\CodeValueRepository;
use Cog\Laravel\Love\Likeable\Services\LikeableService;
use Illuminate\Support\Facades\DB;


class ForumThreadRepository extends BaseRepository
{
    const MODEL = ForumThread::class;

    protected $love_likes;

    public function __construct()
    {
        $this->love_likes = new LikeableService();
    }

    /*
     * get all threads
     */
    public function getAll(){

    }

    public function searchThis($input){
        //$query = $this->search($input)->paginate(50);
        $query = $this->query()
            ->where('message', $input)
            ->orwhere('message', 'like',  '%' . $input .'%')
            ->paginate(sysdef()->name('pagination_high'));
        return $query;
    }

    public function getThreadsForumGid($forum_id){
        $thread = $this->query()
            ->where('forum_id', $forum_id)
            ->get();
        return $thread;
    }

    /**
     * Get threads of the forum by ID
     * @param $forum_id
     * @return mixed
     */
    public function getThreadsForumId($forum_id){
        $thread = $this->query()->select(['id','forum_id', 'user_id', 'parent_id', 'message', 'likes', 'dislikes', 'uuid','created_at'])
            ->orderBy('created_at','asc')
            ->where('forum_id', $forum_id)
            ->paginate(sysdef()->name('pagination_high'));
        return $thread;
    }

    public function getThreadsForumIdCount($forum_id){
        $thread = $this->query()->select(['id'])
            ->where('forum_id', $forum_id)
            ->count();
        return $thread;
    }

    public function getDiscussionDetails($id){
        $thread = $this->query()->select(['forum_id', 'user_id', 'parent_id', 'message', 'likes', 'dislikes', 'uuid','created_at'])
            ->where('id', $id)
            ->first();
        return $thread;
    }

    /**
     * Store discussion post, parent_id can be empty (new) or with id (reply)...check performed to avoid foreign key constraint
     * @param array $input
     * @param $forum_id
     * @param $parent_id
     * @param $likes
     * @param $dislikes
     * @return mixed
     */
    public function storeDiscussion(array $input, $forum_id, $parent_id, $likes, $dislikes){
        $message = $input['message'];
        return DB::transaction(function () use ($message, $forum_id, $parent_id, $likes, $dislikes) {
            if($parent_id > 0) {
                $forum_thread = $this->query()->create([
                    'message' => $message,
                    'forum_id' => $forum_id,
                    'parent_id' => $parent_id,
                    'user_id' => access()->id(),
                    'likes' => $likes,
                    'dislikes' => $dislikes,
                ]);
                return $forum_thread;
            }else{
                $forum_thread = $this->query()->create([
                    'message' => $message,
                    'forum_id' => $forum_id,
                    'user_id' => access()->id(),
                    'likes' => $likes,
                    'dislikes' => $dislikes,
                ]);
                return $forum_thread;
            }
        });
    }

    public function storeUpdateDiscussion(array $input, ForumThread $thread){
        return DB::transaction(function () use ($input,$thread) {
            $thread->message = $input['message'];
            return $thread->update();
        });
    }

    /**
     * @param $id
     */
    public function destroyDiscussion($thread){
        DB::transaction(function () use ($thread) {
            $thread->delete();
        });
    }

    public function updateLikes($id, $likes){
        $thread_likes = $this->query()->find($id);
        $thread_likes->likes = $likes;
        $thread_likes->update();
    }

    public function updateDislikes($id, $dislikes){
        $thread_likes = $this->query()->find($id);
        $thread_likes->dislikes = $dislikes;
        $thread_likes->update();
    }
}
