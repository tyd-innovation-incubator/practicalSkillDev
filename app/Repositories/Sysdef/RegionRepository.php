<?php

namespace App\Repositories\Sysdef;

use App\Models\Sysdef\Region;
use App\Repositories\BaseRepository;

class RegionRepository extends BaseRepository
{
    const MODEL = Region::class;

    public function getRegionByCode($hasc)
    {
        $region = $this->query()->where('hasc', $hasc)->first();
            return $region;
    }

    public function getRegionById($id)
    {
        $region = $this->query()->where('id', $id)->first();
        return $region;
    }
}