<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $amount = $request->input('amount');
            $subscriptionPeriod = $request->input('subscription_period');
            $mobileNumber = $request->input('mobile_number');

            // Check if mobile number exists in the users table
            $user = User::where('mobile_number', $mobileNumber)->first();
            if (!$user) {
                return redirect()->back()->withErrors(['mobile_number' => 'You need to sign up first.']);
            }

            $response = $this->gateway->purchase(array(
                'amount' => $amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                session(['mobile_number' => $mobileNumber, 'subscription_period' => $subscriptionPeriod, 'amount' => $amount]);
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->payment_date = now(); // Set payment_date to the current timestamp
                $payment->save();

                // Update user payment status based on mobile number
                $mobileNumber = session('mobile_number');
                $subscriptionPeriod = session('subscription_period');
                $amount = session('amount');

                $user = User::where('mobile_number', $mobileNumber)->first();
                if ($user) {
                    $user->payment_status = 1; // payment success
                    $user->subscription_period = $subscriptionPeriod;
                    $user->amount = $amount;
                    $user->payment_date = now(); // Directly use now() for payment_date
                    $user->save();
                }

                return redirect()->route('dashboard')->with('success', 'Payment is Successful. Your Transaction Id is : ' . $arr['id']);


            } else {
                return $response->getMessage();
            }
        } else {
            return 'Payment declined!!';
        }
    }



    public function error()
    {
        return 'User declined the payment!';
    }

    public function index()
    {
        return view('hello');
    }
}
