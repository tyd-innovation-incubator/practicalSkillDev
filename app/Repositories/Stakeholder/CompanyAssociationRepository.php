<?php
namespace App\Repositories\Stakeholder;

use App\Models\Stakeholder\CompanyAssociation;
use App\Repositories\BaseRepository;

class CompanyAssociationRepository extends BaseRepository
{
    const MODEL = CompanyAssociation::class;

    public function __construct()
    {

    }

    public function getAssociations($company_id){
        $assoc = $this->query()->where('company_id',$company_id)->get();
        return $assoc;
    }
}