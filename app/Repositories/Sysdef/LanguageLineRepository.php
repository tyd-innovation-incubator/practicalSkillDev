<?php

namespace App\Repositories\Sysdef;

use App\Repositories\BaseRepository;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineRepository extends BaseRepository
{
    const MODEL = LanguageLine::class;

    public function __construct()
    {

    }

    /**
     * get the row by key id
     * @param $key
     * @return mixed
     */
    public function getByKey($key){
        return $this->query()->where('key', $key)->first();
    }
}
