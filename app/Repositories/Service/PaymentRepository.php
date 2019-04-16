<?php

namespace App\Repositories\Service;

use App\Models\Service\Payment;
use App\Repositories\BaseRepository;
use App\Repositories\Sysdef\CodeValueRepository;
use Carbon\Carbon;
use App\Services\Service\Pesapal;
use Illuminate\Support\Facades\DB;

class PaymentRepository extends  BaseRepository
{
    const MODEL = Payment::class;


    public  function  __construct( )
    {
        $this->code_value = new CodeValueRepository();
    }

    /**
     * @param $input
     * @return mixed
     */
    public  function store($input){
        $user = access()->user();
        return DB::transaction(function () use($input, $user){
            $payment = $this->query()->create([
                'msisdn' => $user->phone,
                'reference' => $input['reference'],
                'amount' => $input['amount'],
                'invoice_id' => $input['invoice_id'],
                'code_value_id' => $input['code_value_id'],
                'currency_id' => $input['currency_id'],
                'result' => $input['result'],
                'operator' => $input['operator'],
                'transid' => $input['transid'],
                'utility_ref' => $input['utility_ref'],
                'external_reference' => $input['external_reference'],
            ]);
            return $payment;
        });
    }

    public  function  getPackageDetail($id)
    {
        $package = $this->query()->where(['id',$id])->first();
        return $package;
    }

    /*PESAPAL*/

    public function pesapalInit($invoice){
        $params = [];

        $amount = $invoice->amount * (real)$invoice->paymentPeriod->name;
        $amount = number_format($amount, 2);//format amount to 2 decimal places
        $desc = $invoice->portalService->name;
        $type ="MERCHANT";
        $reference =$invoice->uuid;
        $first_name = $invoice->user->name;
        $last_name = $invoice->user->othernames;
        $email = $invoice->user->email;
        $phonenumber = $invoice->user->phone;

        if (!array_key_exists('currency', $params)) {
            if (config('pesapal.currency') != null) {
                $params['currency'] = config('pesapal.currency');
            }
        }

        $params = array_merge($params);


        $token = NULL;

        $consumer_key = 'iDNCGwZNDLzBbrIM+sdvHNc8DbXKYKKp';

        $consumer_secret = 'waO9SWR+XV6rafZ46XG6jmi3/YU=';

        $signature_method = new Pesapal\OAuthSignatureMethod_HMAC_SHA1();

        $callback_url = route('payment.pesapal'); //redirect url, the page that will handle the response from pesapal.

        $iframelink = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4';


        $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
        <PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"" . $amount . "\" Description=\"" . $desc . "\" Type=\"" . $type . "\" Reference=\"" . $reference . "\" FirstName=\"" . $first_name . "\" LastName=\"" . $last_name . "\" Email=\"" . $email . "\" PhoneNumber=\"" . $phonenumber . "\" xmlns=\"http://www.pesapal.com\" />";

        $post_xml = htmlentities($post_xml);

        $consumer = new Pesapal\OAuthConsumer($consumer_key, $consumer_secret);

        $iframe_src = Pesapal\OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);

        $iframe_src->set_parameter("oauth_callback", $callback_url);

        $iframe_src->set_parameter("pesapal_request_data", $post_xml);

        $iframe_src->sign_request($signature_method, $consumer, $token);

        return view('service.payment.payment')->with('iframe_src',$iframe_src);
    }

    public function pesapalConfirm($request, $pesapal_transaction_tracking_id, $pesapal_merchant_reference, $invoice){
        //add payment
        $input = [
            'reference' => $pesapal_merchant_reference,
            'amount' => $invoice->amount,
            'invoice_id' => $invoice->id,
            'code_value_id' => '94', //aggregator
            'currency_id' => $invoice->currency_id,
            'result' => '',
            'operator' => 'PESAPAL',
            'transid' => $pesapal_transaction_tracking_id,
            'utility_ref' => $pesapal_merchant_reference,
            'external_reference' => $pesapal_merchant_reference,
        ];
        return $this->store($input);
    }

    /*PESAPAL END*/
}
