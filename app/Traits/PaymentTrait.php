<?php 

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

trait PaymentTrait{
   
    public function init(){
        $api = new Api(env('RAZORPAY_KEY'),env('RAZORPAY_SECRET'));
        return $api;
    }

    public function fetch($razorObj,$razorpay_payment_id){
        $payment = $razorObj->payment->fetch($razorpay_payment_id);
        return  $payment;
    }

    public function capture($razorPaymentObj,$amount){
       return  $razorPaymentObj->capture(array('amount'=>$amount));
    }

}