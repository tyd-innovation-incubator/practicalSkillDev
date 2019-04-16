<?php
namespace App\Repositories\Sysdef;

use App\Models\Sysdef\HelpGroup;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class HelpGroupRepository extends BaseRepository
{
    const MODEL = HelpGroup::class;

    /**
     * HelpGroupRepository constructor.
     */
    public function __construct()
    {

    }

    /**
     *
     */
    public function getAllPaginate(){
        return $this->query()->paginate(sysdef()->name('pagination_high'));
    }

    /**
     * @return mixed
     */
    public function getAllForAdminDatatable() {
        return $this->query();
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input){
        return DB::transaction(function () use ($input) {
            $help = $this->query()->create([
                'user_id' => access()->user()->id,
                'name' => $input['name'],
                'description' => $input['description'],
            ]);
            return $help;
        });
    }

    /**
     * @param HelpGroup $help_group
     * @param array $input
     * @return mixed
     */
    public function update(HelpGroup $help_group, array $input)
    {
        return  DB :: transaction(function() use ($input, $help_group){
            $help_group->update([
                'name' =>$input['name'] ,
                'description' => $input['description'],
            ]);
            return $help_group;
        });
    }

    /**
     * @param HelpGroup $help_group
     * @throws \Exception
     */
    public function destroy(HelpGroup $help_group)
    {
        $help_group->delete();
    }
}
