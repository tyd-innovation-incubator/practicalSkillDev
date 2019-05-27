<?php
/**
 * Created by PhpStorm.
 * User: mbelwamchayungu
 * Date: 1/9/19
 * Time: 10:25 AM
 */
namespace App\Repositories\Sysdef;

use App\Repositories\Access\UserRepository;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class NewsletterRepository extends BaseRepository
{
    protected $user;
    protected $users;
    /**
     * NewsletterRepository constructor.
     */
    public function __construct()
    {
        $this->user = access()->user();
        $this->users = new UserRepository();
    }

    /**
     * Update the newsletter settings [sms, email]
     * @param $request
     * @param $user
     * @return mixed
     */
    public function updateNewsletter($request, $user){
        return DB::transaction(function () use ($request, $user) {
            $this->user = access()->user();
            foreach (code_value()->getAllByCode(48) as $content) {
                $array = [];
                $count_sms = count($request->input('sms-'.$content->reference));
                $count_email = count($request->input('email-'.$content->reference));
                $sms = ($count_sms > 0) ? 1 : 0;
                $email = ($count_email > 0) ? 1 : 0;
                $count = count($request->input('d'.$content->reference));
                if ($count > 0) {
                    $row = $request->input('d'.$content->reference);
                    for ($i = 0; $i < $count; $i++) {
                        $array[] = $row[$i];
                        $logistic_service = $row[$i];
                        if ($user->isNotificationAvailable($content->id, $logistic_service)) {
                            $user->newsletters()->newPivotStatement()
                                ->where('newsletter_content_cv_id', '=', $content->id)
                                ->where('type_cv_id', '=', $logistic_service)
                                ->update([
                                    'sms' => $sms,
                                    'email' => $email,
                                ]);
                        } else {
                            $user->newsletters()->attach($content, [
                                'newsletter_content_cv_id' => $content->id,
                                'type_cv_id' => $logistic_service,
                                'email' => $email,
                                'sms' => $sms,
                            ]);
                        }
                    }
                }
                $user->newsletters()->newPivotStatement()
                    ->where('user_id', $user->id)
                    ->where('newsletter_content_cv_id', '=', $content->id)
                    ->whereNotIn('type_cv_id', $array)
                    ->delete();
            }
        });
    }
}
