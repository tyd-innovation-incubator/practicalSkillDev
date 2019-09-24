<?php
/**
 * Created by PhpStorm.
 * User: dontito
 * Date: 5/23/19
 * Time: 6:41 PM
 */

namespace App\Repositories\Access;


use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository
{

    const MODEL = User::class;

    public function __construct()
    {

    }


    public function storeEducationDetails(array $input,$uuid)
    {
        $user = User::where('uuid',$uuid)->get()->first();

        $education_user_detail = $user->educationDetails()->where('user_id',$user->id)->get()->first();

        return DB::transaction(function() use ($input, $education_user_detail)
        {
            $user_education_details = $education_user_detail->query()->create(
                [
                    'degree_name' => $input['degree_name'],
                    'university_name' => $input['university_name'],
                    'qualification' => $input['qualification'],
                    'start_date' => $input['start_date'],
                    'end_date' => $input['end_date']
                ]
            );

            dd($user_education_details);

        });






    }
}

