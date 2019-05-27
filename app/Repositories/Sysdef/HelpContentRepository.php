<?php
namespace App\Repositories\Sysdef;

use App\Models\Sysdef\HelpContent;
use App\Models\Sysdef\HelpGroup;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class HelpContentRepository extends BaseRepository
{
    const MODEL = HelpContent::class;

    /**
     * HelpContentRepository constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param HelpGroup $helpGroup
     * @return mixed
     */
    public function getAllForAdminDatatable(HelpGroup $helpGroup){
        return $this->query()->where('help_group_id', $helpGroup->id);
    }

    /**
     * @param $input
     * @param HelpGroup $help_group
     * @return mixed
     */
    public function store($input, HelpGroup $help_group){
        return DB::transaction(function () use ($input, $help_group) {
            $help = $this->query()->create([
                'user_id' => access()->user()->id,
                'help_group_id' => $help_group->id,
                'title' => $input['title'],
                'content' => $input['content'],
            ]);
            return $help;
        });
    }

    /**
     * @param HelpContent $help_content
     * @param array $input
     * @return mixed
     */
    public function update(HelpContent $help_content, array $input)
    {
        return  DB :: transaction(function() use ($input, $help_content){
            $help_content->update([
                'title' =>$input['title'] ,
                'content' => $input['content'],
            ]);
            return $help_content;
        });
    }

    /**
     * @param HelpContent $help_content
     * @throws \Exception
     */
    public function destroy(HelpContent $help_content)
    {
        $help_content->delete();
    }
}
