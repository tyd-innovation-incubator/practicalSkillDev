<?php

namespace App\Repositories\Sysdef;

use App\Models\Sysdef\Currency;
use App\Repositories\BaseRepository;

class CurrencyRepository extends BaseRepository
{
    const MODEL = Currency::class;


    public function getCurrencyByCode($code)
    {
        $currency = $this->query()->where('code', $code)->first();
            return $currency;
    }

    public  function  getCurrencyName($id){
        $currency = $this->query()->select('name')->where('id',$id)->first();
        return $currency->name;

    }
    public  function getCurrencyDisplaySymbol($id)
    {
        return $return = $this->query()->select('code')->where('id', $id)->first()->code;

    }

}