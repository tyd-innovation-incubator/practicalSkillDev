<?php

namespace App\Repositories\Sysdef;

use App\Models\Sysdef\Country;
use App\Models\Sysdef\DocumentGroup;
use App\Repositories\BaseRepository;

class DocumentGroupRepository extends BaseRepository
{
    const MODEL = DocumentGroup::class;


    /**
     * @param $id
     * @return mixed
     * Get documents belong to document group provided
     */
    public function getDocumentsByGroup($id)
    {
        $document_group = $this->find($id);
        $documents = $document_group->documents;
        return $documents;
    }




}