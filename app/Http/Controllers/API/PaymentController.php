<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
         Stripe::setApiKey(config('services.stripe.secret'));
             $currentYear = Carbon::now()->format('y');
             $currentMonth = Carbon::now()->format('m');

            $validator = Validator::make($request->all(), [

                // 'number' => 'required|numeric|digits_between:13,19',
                // 'cvc' => 'required|numeric|digits_between:3,4',
                // 'exp_month' => 'required|numeric|min:1|max:12',
                // 'exp_year' => 'required|numeric|min:' . $currentYear . '|max:' . ($currentYear + 10),
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
            //    $task =  Task::find($request->task_id);

            //   $paymentData = [
            //     'first_name' =>$request->first_name,
            //     'last_name' =>$request->last_name,
            //     'email' =>$request->email,
            //     'phone_number' =>$request->phone_number,
            //     'area_code' =>$request->area_code,
            //     'price' =>$plan->price??null,
            //     'task_id' =>$request->task_id,
            //     'provider_id' =>$task->service_provider_id??null,
            //     'customer_id' =>$task->customer_id??null,
            // ];

            try {
                $token = Token::create([
                    'card' => [
                        'number' => 4242424242424242,
                        'cvc' => 123,
                        'exp_month' => 12,
                        'exp_year' => 24,
                    ],
                ]);

                  $token['id'];

                return   $stripe =  Charge::create ([
                        "amount" => 100 * 100,
                        "currency" => "usd",
                        "source" => $token['id'],
                        "description" => "Payment Created by ",
                ]);
                $stripe->balance_transaction;

                //    Payment::Create($paymentData);

                //     $notificationData = [
                //     'user_id'      =>auth()->user()->id,
                //     'provider_id'  =>$task->service_provider_id,
                //     'description'  =>'Payment Send successfully',
                //     'description_provider' =>'Your task payment has been send to admin please say to admin withdraw my account',
                //     'type' =>'withdraw'
                //     ];
                //   Notification::Create($notificationData);

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
