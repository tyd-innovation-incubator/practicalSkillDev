<?php
namespace App\Repositories\Stakeholder;

use App\Models\Stakeholder\CompanyService;
use App\Repositories\BaseRepository;

class CompanyServiceRepository extends BaseRepository
{
    const MODEL = CompanyService::class;

    public function __construct()
    {

    }

    public function getServices($company_id){
        $assoc = $this->query()->where('company_id',$company_id)->get();
        return $assoc;
    }
}