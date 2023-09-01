<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentDetails;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Token;
use Stripe\Customer;
use Stripe\Transfer;
use Stripe\Charge;
use Stripe\SetupIntent;
use Stripe\Card;
use Stripe\PaymentMethod;
use Stripe\Balance;
use Carbon\Carbon;

class PaymentController extends Controller
{

    public function createPayment(Request $request)
    {    
         
        $amount = 3;
         Stripe::setApiKey(config('services.stripe.secret'));
             $currentYear = Carbon::now()->format('y');
             $currentMonth = Carbon::now()->format('m');

            $validator = Validator::make($request->all(), [
                'first_name'=> 'required',
                'last_name'=> 'required',
                'email'=> 'required|email',
                'phone_number'=> 'required|numeric',
                'number' => 'required|numeric|digits_between:13,19',
                'cvc' => 'required|numeric|digits_between:3,4',
                'exp_month' => 'required|numeric|min:1|max:12',
                'exp_year' => 'required|numeric|min:' . $currentYear . '|max:' . ($currentYear + 10),
            ]);

             $validator->after(function ($validator) use ($request, $currentYear, $currentMonth) {
                    $expiryYear = $request->exp_year;
                    $expiryMonth = $request->exp_month;

                    // Check if the expiry year is the current year and the expiry month is in the past
                    if ($expiryYear == $currentYear && $expiryMonth < $currentMonth) {
                        $validator->errors()->add('cardExpiryMonth', 'The credit card has expired.');
                    }



                    // If the expiry year is the current year, check if the expiry month is greater than or equal to the current month
                    if ($expiryYear == $currentYear && $expiryMonth < $currentMonth) {
                        $validator->errors()->add('cardExpiryMonth', 'The credit card has expired.');
                    }
                });

            if ($validator->fails()) {
                return response()->json(['message'=>$validator->messages()->first(),'success' => false]);
            } 
           
              

            try {
                $token = Token::create([
                    'card' => [
                        'number' => $request->number,
                        'cvc' => $request->cvc,
                        'exp_month' => $request->exp_month,
                        'exp_year' => $request->exp_year,
                    ],
                ]);

                 $token['id'];

                $stripe =  Charge::create ([
                        "amount" => $amount * 100,
                        "currency" => "usd",
                        "source" => $token['id'],
                        "description" => "Payment Created by ",
                ]);
                 
                $paymentData = [
                'user_id' =>auth()->id(), 
                'amount' =>$amount,
                'transaction_id'=>$stripe->id,
                'status'=>$stripe->status,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                ];
                    PaymentDetails::Create($paymentData);

                    $notificationData = [
                    'user_id'      =>auth()->user()->id,
                    'type'  =>"amount",
                    'description'  =>'$'.$amount.' has been credtied in the Account',
                     
                    ];
                  Notification::Create($notificationData);

                    return response()->json(['message' => 'Payment Created susccessfully','success'=>true]);
                } catch (\Exception $e) {

                    return response()->json(['message' => $e->getMessage(),'success'=>false], 500);
                }
        }



    // public function createPaymentIntent(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    //     $customer = Stripe\Customer::create(array(
    //         "address" => [
    //                 "line1" => "Virani Chowk",
    //                 "postal_code" => "360001",
    //                 "city" => "Rajkot",
    //                 "state" => "GJ",
    //                 "country" => "IN",
    //             ],
    //         "email" => auth()->user()->email,
    //         "name" => auth()->user()->first_name,
    //         "source" => $request->stripeToken

    //     ));
    //     Stripe\Charge::create ([
    //         "amount" => $request->amount * 100,
    //         "currency" => "usd",
    //         "customer" => $customer->id,
    //         "description" => "Test payment from itsolutionstuff.com.",
    //         "shipping" => [
    //           "name" => 'asas',
    //           "address" => [
    //             "line1" => "510 Townsend St",
    //             "postal_code" => "98140",
    //             "city" => "San Francisco",
    //             "state" => "CA",
    //             "country" => "US",

    //             ],
    //         ]
    //     ]);

    //     return response()->json([
    //         'message' => "Payment Successfully",
    //     ]);
    // }

}
