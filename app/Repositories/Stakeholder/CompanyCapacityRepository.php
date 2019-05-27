<?php
namespace App\Repositories\Stakeholder;

use App\Models\Stakeholder\CompanyCapacity;
use App\Repositories\BaseRepository;

class CompanyCapacityRepository extends BaseRepository
{
    const MODEL = CompanyCapacity::class;

    public function __construct()
    {

    }

    public function getCapacities($company_id){
        $assoc = $this->query()->where('company_id',$company_id)->get();
        return $assoc;
    }
}