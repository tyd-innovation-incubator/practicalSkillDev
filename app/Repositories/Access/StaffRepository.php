<?php

namespace App\Repositories\Access;

use App\Models\Auth\Staff;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StaffRepository extends BaseRepository
{

    const MODEL = Staff::class;


    /**
     * Create Staff when creating a user
     * @param array $input
     * @param Model $user
     * @return mixed
     */
    public function create(array $input, Model $user)
    {
        return DB::transaction(function () use ($input, $user) {
            $staff = $this->query()->create([
                'user_id' => $user->id,
                'unit_id' => $input['unit'],
                'designation_id' => $input['designation']
            ]);

            return $staff;
        });
    }


    /**
     * @param array $input
     * @param Model $staff
     * @return mixed
     * Update staff
     */
    public function update(array $input , Model $staff)
    {
        return DB::transaction(function () use ($input, $staff) {
            $staff->update([
                'unit_id' => $input['unit'],
                'designation_id' => $input['designation']
            ]);

            return $staff;
        });
    }

}
