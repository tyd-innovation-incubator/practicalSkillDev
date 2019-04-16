<?php

namespace App\Repositories\Sysdef;

use App\Models\Sysdef\Region;
use App\Models\Sysdef\Sysdef;
use App\Models\Sysdef\SysdefGroup;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class SysdefRepository extends BaseRepository
{
    const MODEL = Sysdef::class;

    public function __construct()
    {

    }

    public function update(array $input, Sysdef $sysdef){
        return  DB :: transaction(function() use ($input, $sysdef){
            $sysdef->update([
                'value' =>$input['sysdef_value'] ,
            ]);
            return $sysdef;
        });
    }
}
