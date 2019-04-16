<?php

namespace App\Repositories\Sysdef;


use App\Models\Sysdef\Document;
use App\Repositories\BaseRepository;

class DocumentRepository extends BaseRepository
{
    const MODEL = Document::class;


    /*Company logo document id*/
    public function getCompanyLogoDocumentId()
    {
        return 11;
    }


    /*Commodity Images */
    public function getCommodityImageDocumentId()
    {
        return 12;
    }

    /*News Image */
    public function getNewsImageDocumentId()
    {
        return 6;
    }

    /*Event Image */
    public function getEventImageDocumentId()
    {
        return 7;
    }

    /*cargo owner documents */
    public function getCargoOwnerDocumentId()
    {
        return 13;
    }
    /*service provider documents */
    public function getServiceProviderDocumentId()
    {
        return 14;
    }


    /*Regulation / legislation files */
    public function getRegulationFileDocumentId()
    {
        return 10;
    }

    public function getDocumentsByGroupFilter(array $filter)
    {
        $documents = $this->query()->whereHas('documentGroup', function ($query) use($filter){
            $query->whereIn('document_group_id', $filter);
        })->get();
        return $documents;
    }

    /**
     * Ads Images
     */
    public function getAdImageDocumentId()
    {
        return 9;
    }

    /**
     * Association members
     */
    public function getAssociationMembersDocumentId()
    {
        return 15;
    }
}
