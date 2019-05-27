<?php
namespace App\Repositories\Information;

use App\Models\Information\Announcement;
use App\Models\Information\Event;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\CodeValueRepository;
use Illuminate\Support\Facades\DB;

class AnnouncementRepository extends BaseRepository
{
    const MODEL = Announcement::class;

    protected $code_value;

    public function __construct()
    {

    }



    /**
     * @param array $input
     * Store new announcement information
     */
    public function store(array $input)
    {
        return  DB :: transaction(function() use ($input){
            $user = access()->user();
            $company = $user->getCompanyAdministeredByUser();
            $announcement = $this->query()->create([
                'user_id'=>access()->id(),
                'company_id' => count($company) ? $company->id : null ,
                'description' => $input['description'],
                'title' => $input['title'],
                'isadmin' => $user->user_account_type == 1 ? 1 : 0,
            ]);
            return $announcement;
        });
    }


    /**
     * @param event
     * @param array $input
     * Update existing announcement information
     */
    public function update(Announcement $announcement, array $input)
    {
        return  DB :: transaction(function() use ($input, $announcement){
            $announcement->update([
                'description' => $input['description'],
                'title' => $input['title'],
            ]);
            return $announcement;
        });
    }


    /*Delete Announcement - soft delete*/
    public function delete(Announcement $announcement)
    {
        $announcement->delete();
    }


    /*Search all announcements for user to access*/
    public function getAll(){
        $query = $this->query()
            ->orderBy('id', 'desc')
            ->paginate(sysdef()->name('pagination_low'));
        return $query;
    }

    /*Search all announcements for user to access using keyword submitted by user*/
    public function getAllByKeyword($keyword){
        $query = $this->query()
            ->where(function($query) use($keyword){
                $query->where('title','~*', $keyword)->orWhere('description','~*', $keyword);
            })
            ->orderBy('id', 'desc')
            ->paginate(sysdef()->name('pagination_low'));
        return $query;
    }



    /**
     * Get all announcements for admin datatable
     */
    public function getForAdminDatatable()
    {
        $association = $this->query()->select([
            DB::raw("announcements.title"),
            DB::raw("announcements.description"),
            DB::raw("announcements.created_at"),
            DB::raw("announcements.uuid"),
        ])->where('announcements.isadmin',1)->orderBy('announcements.id', 'desc');

        return $association;
    }


    /*Get recent announcements by user/company for DataTable*/
    public  function getAnnouncementsByUserForDataTable($user)
    {
        $company_administered = $user->getCompanyAdministeredByUser();
        if(count($company_administered)) {
            return $this->query()->whereHas('company', function ($query) use ($company_administered) {
                $query->where('company_id', $company_administered->id)->orderBy('id', 'desc');
            });
        }else{
            return $this->query()->whereHas('user', function($query) use($user) {
                $query->where('user_id', $user->id)->orderBy('id', 'desc');
            });
        }
    }

    /**
     * Get all announcements  for User datatable
     */
    public function getForUserDatatable()
    {
        $association = $this->query()->select([
            DB::raw("announcements.title"),
            DB::raw("announcements.description"),
            DB::raw("announcements.created_at"),
            DB::raw("announcements.uuid"),
        ])->where('announcements.isadmin',0)->orderBy('announcements.id', 'desc');

        return $association;
    }

    /**
     * Get all announcements for association datatable
     */
    public function getForAssociationDatatable()
    {
        $user= access()->user();
        $association = $this->query()->select([
            DB::raw("announcements.title"),
            DB::raw("announcements.description"),
            DB::raw("announcements.created_at"),
            DB::raw("announcements.uuid"),
        ])->where('announcements.user_id',$user->id)->orderBy('announcements.id', 'desc');

        return $association;
    }

/*Get latest announcment for homepage*/
    public function getLatest($limit){
        $query = $this->query()
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
        return $query;
    }

}
