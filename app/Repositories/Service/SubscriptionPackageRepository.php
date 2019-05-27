<?php


namespace App\Repositories\Service;

use App\Models\Auth\User;
use App\Models\Service\Invoice;
use App\Models\Service\PackageSubscription;
use App\Models\Service\Payment;
use App\Models\Sysdef\RoleCharge;
use App\Notifications\PackageSubscriptionExpiredNotification;
use App\Repositories\Access\UserRepository;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\CodeValueRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubscriptionPackageRepository extends BaseRepository
{
    const  MODEL = PackageSubscription::class;



    protected  $code_value;
    protected $users;
    protected $payment;

    public  function  __construct()
    {
        $this->code_value = new CodeValueRepository();
        $this->users = new UserRepository();
        $this->payments = new PaymentRepository();
    }

    public function  store($input)
    {

        $user = access()->user();
        return DB::transaction(function () use ($input, $user) {
            $package_subscription = $this->query()->create([
                'user_id' => $user->id,
                'role_charge_id' => $input['charge'],
                'payment_period_cv_id' => $input['payment_period'],
            ]);
            //upload files
            return $package_subscription;
        });
    }

    public  function update($payment)
    {
        $package_subscription = $this->find($payment->invoice->resource_id);
        return  DB::transaction(function() use ($payment,$package_subscription){

            $package_subscription->update([
                'ispaid' => 1,
                'start_date' =>$payment->created_at ,
            ]);

            return $package_subscription;

        });

    }


    public function subscribe(Invoice $invoice)
    {
//        if(isset($package_subscription->role_charge_id)){
            $package_subscription = $this->find($invoice->resource_id);
            $charge =RoleCharge::where('id', $package_subscription->role_charge_id)->first();
            $user = User::find($invoice->user_id);
            $user->roles()->sync($charge->role->id);
            $user->touch();
            $this->users->attachRolePermissions($user);
//        }
    }

    /*Set the expire date of the package */

    public function setValidityOfSubscriptionPackage(){

        DB::transaction(function () {
            $now = Carbon::now();
            $subscription_packages = $this->query()
                ->select('ispaid', 'start_date','payment_period_cv_id','role_charge_id')
                ->where('ispaid', 1)
                ->get();
            foreach ($subscription_packages as $subscription_package) {
                $start_date = Carbon::parse($subscription_package->start_date);
                $package_duration =$start_date->addMonths($subscription_package->payment_period_cv_id);

                if ($now = $package_duration) {
                    $charge =RoleCharge::where('id', $subscription_package->role_charge_id)->first();
                    $user = User::find($subscription_package->user_id);
                    $user->roles()->sync($charge->role->id,2);
                    $user->touch();

                    $user->notify(new PackageSubscriptionExpiredNotification($subscription_package));
                    alert()->store($subscription_package, [
                        'user_id' => $subscription_package->user_id,
                        'type_cv_id' => 209,
                        'data' => __('strings.email.subscription.expired'),
                    ]);
                }
            }
        });
    }


    /**
     * @param $portal_service_cv_id
     * @return mixed
     * get user subscription Package for datatable
     */
    public function getByUserSubscriptionPackageForDatatable($user){
        return $this->query()
            ->orderBy('id', 'desc')
            ->where('user_id', $user->id);
    }


    /**
     * @param $isapproved
     * @return mixed
     */
    public function getAdvertisementsByStatusForAdminDatatable($ispaid){
        return $this->query()
            ->where('ispaid', $ispaid)
            ->orderBy('id', 'desc');
    }

}
