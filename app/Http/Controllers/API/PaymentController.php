<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function createPaymentIntent(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $customer = Stripe\Customer::create(array(
            "address" => [
                    "line1" => "Virani Chowk",
                    "postal_code" => "360001",
                    "city" => "Rajkot",
                    "state" => "GJ",
                    "country" => "IN",
                ],
            "email" => auth()->user()->email,
            "name" => auth()->user()->first_name,
            "source" => $request->stripeToken

        ));
        Stripe\Charge::create ([
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "customer" => $customer->id,
            "description" => "Test payment from itsolutionstuff.com.",
            "shipping" => [
              "name" => 'asas',
              "address" => [
                "line1" => "510 Townsend St",
                "postal_code" => "98140",
                "city" => "San Francisco",
                "state" => "CA",
                "country" => "US",

                ],
            ]
        ]);

        return response()->json([
            'message' => "Payment Successfully",
        ]);
    }

}
