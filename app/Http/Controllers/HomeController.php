<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }



    public function cart1(Request $req)
    {
        $cart = Cart::where('product_id', $req->product_id)->first();

        if (!is_null($cart)) {
            $cart->increment('quantity');
        } else {
            $cart = new Cart();
            $cart->user_id = Auth::id();
            $cart->product_id = $req['product_id'];
            $cart->quantity = "1";
            $cart->size = $req['size'];
            $cart->color = $req['color'];
            $cart->save();
            // dd($req);
            return redirect('/cart');
        }
        // return redirect('cart');
    }

    public function deletecart($id)
    {
        Cart::where('id', $id)->delete();
        return back();
    }
    public function updatecart(Request $req)
    {
        Cart::where('product_id', $req['name'])->update(['quantity' => $req['qty']]);
        return back();
    }

    public function ordernow(Request $req, Order $order)
    {
        $userid = auth::id();
        $allcard = Cart::where('user_id', $userid)->get();
        foreach ($allcard as $card)
            if (!$card) {
                return redirect('cart');
            } else {
                $order = new Order;
                $order->product_id = $card['product_id'];
                $order->user_id = $card['user_id'];
                $order->quantity = $card['quantity'];
                $order->size = $card['size'];
                $order->color = $card['color'];
                $order->firstname = $req['name'];
                $order->address = $req['address'];
                $order->homeaddress = $req['homeaddress'];
                $order->city = $req['city'];
                $order->postcode = $req['postcode'];
                $order->phone = $req['phone'];
                $order->email = $req['email'];
                $order->payment = $req['payment'];
                $order->save();
                $details = [
                    'title' => 'Male Fashion',
                    'body' => 'Dear Coustomer Your Product Delevery Soon'
                ];

                Mail::to($req['email'])->send(new \App\Mail\MyTestMail($details));

                $details = [
                    'title' => 'Male Fashion',
                    'body' => 'Dear admin one user send a order'
                ];

                Mail::to('taijulhira2686@gmail.com')->send(new \App\Mail\MyTestMail($details));
                //user

                //->with( Member:: where ('user_id',$userid)->delete())


            }
        return redirect('/shop')->with(Cart::where('user_id', $userid)->delete())
            ->with('success', 'send a mail,your product delevery on 72h thank you.');
    }
    function mail()
    {
        //mail
        $details = [
            'title' => 'Time Zone',
            'body' => 'Dear admin one user send a order'
        ];

        Mail::to('taijulhira2686@gmail.com')->send(new \App\Mail\MyTestMail($details));
        //end
        return back();
    }
}
