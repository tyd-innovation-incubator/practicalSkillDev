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

class UserRepository extends BaseRepository
{

    const MODEL = User::class;

    public function __construct()
    {

    }


    public function storeEducationDetails($id)
    {

        dd($id);
    }
}

