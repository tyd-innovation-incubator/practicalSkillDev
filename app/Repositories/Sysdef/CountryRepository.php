<?php

namespace App\Repositories\Sysdef;

use App\Models\Sysdef\Country;
use App\Repositories\BaseRepository;

class CountryRepository extends BaseRepository
{
    const MODEL = Country::class;

    public function getCountryByCode($code)
    {
        return $this->query()->where('code', $code)->first();
    }
}