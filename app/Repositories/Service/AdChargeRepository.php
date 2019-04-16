<?php

namespace App\Repositories\Service;

use App\Models\Service\AdCharge;
use App\Repositories\BaseRepository;

class AdChargeRepository extends BaseRepository
{
    const MODEL = AdCharge::class;

    /**
     * @return mixed
     */
    public function getAllForSelect() {
        $query = $this->query()->select(['id', 'code_value_id'])->get();
        return $query->pluck('codeValue.name', 'id');
    }
}
