<?php
/**
 * Created by PhpStorm.
 * User: dontito
 * Date: 1/17/19
 * Time: 2:25 PM
 */

namespace App\Repositories\Sysdef;


use App\Http\Requests\Sysdef\ContactUsCreateRequest;
use App\Models\Auth\User;
use App\Notifications\System\ContactUsSendNotification;
use App\Repositories\BaseRepository;

class ContactUsRepository extends BaseRepository
{
    public function __construct()
    {

    }


    public function sendContactUsNotification(ContactUsCreateRequest $request)
    {
        $contact_us = $request->all();
        (new User())->forceFill([
            'name'=>$request->get('name'),
            'email'=>sysdef()->name('support_email'),
            'message'=>$request->get('message'),

        ])->notify(new ContactUsSendNotification($request));

    }
}