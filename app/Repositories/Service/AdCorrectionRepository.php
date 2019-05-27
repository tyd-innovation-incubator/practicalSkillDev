<?php
namespace App\Repositories\Service;

use App\Models\Service\AdCorrection;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class AdCorrectionRepository extends BaseRepository
{
    const MODEL = AdCorrection::class;

    public function store($ad_id, $user,$input){
        return  DB::transaction(function() use ($input, $user,$ad_id) {
            return $this->query()->create([
                'ad_id' => $ad_id,
                'user_id' => $user->id,
                'correction' => $input['correction']
            ]);
        });
    }
}
