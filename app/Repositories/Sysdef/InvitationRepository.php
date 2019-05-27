<?php
/**
 * Created by PhpStorm.
 * User: dontito
 * Date: 1/14/19
 * Time: 3:37 PM
 */

namespace App\Repositories\Sysdef;


use App\Models\Sysdef\Invitation;
use App\Notifications\System\SendAssociationInvitation;
use App\Notifications\System\SendStakeholderInvitation;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class InvitationRepository extends  BaseRepository
{

    const MODEL = Invitation::class;


    public  function __construct()
    {

    }

    public function  store(array $input)
    {
        return DB::transaction( function () use($input){
            $user = access()->user();
            $invitation = $this->query()->create([
               'user_id' =>$user->id,
                'user_account_cv_id'=>$input['user_account_type'],
                'email'=>$input['email'],
            ]);
            $email = $input['email'];

            if ($input['user_account_type']==6)
            {
                $invitation->notify(new SendAssociationInvitation($email));

            }else{
                $invitation->notify(new SendStakeholderInvitation($email));
            }
            return $invitation;
        });
    }

}