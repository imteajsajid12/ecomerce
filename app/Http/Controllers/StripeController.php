<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Stripe;

class StripeController extends Controller
{

public function index()
{
    return view('payment.credit-card');
}

    public function checkout(Request $request)
    {
        echo $request->data();
        $price=0;
        $user_id = Auth::user()->id;
        $allcard = Cart::where('user_id', $user_id)->get();
        foreach ($allcard as  $cart)
        {
            $totalp =$cart->product->price * $cart->quantity;
             $total_price =$price += $totalp;
        }


        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer="imteaj";

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $total_price * 100,
            'currency' => 'USD',
            //"customer" => $customer,
            'description' => 'Payment From LARRYBRIN',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        return view('payment.credit-card', compact('intent'));

    }


}
