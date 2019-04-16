<?php

namespace App\Repositories\Information;

use App\Models\Information\Forum;
use App\Models\Sysdef\CodeValue;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\CodeValueRepository;
use Illuminate\Support\Facades\DB;


class ForumRepository extends BaseRepository
{
    const MODEL = Forum::class;

    protected $code_value;

    public function __construct()
    {
        $this->code_value = new CodeValueRepository();
    }

    public function getAllDiscussionsForAminDatatable()
    {
        return $this->query();
    }

    /**
     * @return mixed
     */
    public function getAllForum()
    {
        return $return = $this->code_value->getCodeValuesPaginate('23');
    }

    /**
     * @return mixed
     */
    public function getAllForumForSelect()
    {
        return $return = $this->code_value->getCodeForSelect("23");
    }

    public function getAllForumsNoPagination(){
        return $return = $this->code_value->getCodeValues("23");
    }

    public function getForumDetail($id){
        return $this->code_value->find($id);
    }

    public function getLatestThreads($limit = 3){
        $query = $this->query()->select(['id', 'title', 'content', 'user_id', 'uuid', 'company_id', 'views', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
        return $query;
    }

    public function getThreads($code_value_id)
    {
        $threads = $this->query()->select(['id', 'title', 'content', 'user_id', 'uuid', 'company_id', 'views', 'created_at'])
            ->where("code_value_id", $code_value_id)
            ->orderBy('created_at', 'desc')
            ->get();
        return $threads;
    }

    public function getThreadsLimit($code_value_id, $limit = 6)
    {
        $threads = $this->query()
            ->select(['title', 'content', 'user_id', 'uuid', 'company_id', 'views', 'created_at'])
            ->where("code_value_id", $code_value_id)->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
        return $threads;
    }

    public function searchThis($input){
        //$query = $this->search($input)->paginate(50);
        //$query = Forum::search($input)->paginate(50);
        $query = $this->query()
            ->where('content', $input)
            ->orwhere('content', 'like',  '%' . $input .'%')
            ->paginate(sysdef()->name('pagination_high'));
        return $query;
    }

    /**
     * @param array $input
     * @param $reference
     * @return mixed
     */
    public function storeThread(array $input, CodeValue $reference)
    {
        return DB::transaction(function () use ($input,$reference) {
            $user = access()->user();
            $company = $user->getCompanyAdministeredByUser();
            $forum = $this->query()->create([
                'title' => $input['title'],
                'content' => $input['content'],
                'user_id' => access()->id(),
                'company_id' => count($company) ? $company->id : null,
                'code_value_id' => $reference->id,
                'source' => $input['website'],
                'url' => $input['url'],
            ]);
            return $forum;
        });
    }

    /*
     * Update 'forums'
     */
    public function editThread(array $input,Forum $forum){
        DB::transaction(function () use ($input, $forum) {
            $forum->title = $input['title'];
            $forum->content = $input['content'];
            $forum->source = $input['website'];
            $forum->url = $input['url'];
            return $forum->update();
        });
    }

    public function destroy(Forum $forum){
        DB::transaction(function () use ($forum) {
            $forum->delete();
        });
    }

    /*
     * Get recent forum  by user/company for tendering_actions
     */
    public function getRecentForumsByUserForDataTable($user)
    {
        $company_administered = $user->getCompanyAdministeredByUser();
        if(count($company_administered)) {
            return $this->query()->whereHas('user', function ($query) use ($company_administered) {
                $query->where('company_id', $company_administered->id)->orderBy('id', 'desc');
            });
        }else{
            return $this->query()->whereHas('user', function ($query) use ($user) {
                $query->where('user_id', $user->id)->orderBy('id', 'desc');
            });
        }
    }

    public function attachViews($forum){
        return DB::transaction(function () use ($forum) {
            return $forum->update([
                'views' => $forum->getUniqueViews(),
            ]);
        });
    }
}
