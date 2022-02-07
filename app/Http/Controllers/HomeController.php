<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Carbon\Carbon;
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
    { //validation

        $this->validate($req, [
            'quantity' => 'required',
            'color' => 'required',
            'size' => 'required',

        ]);
        $cart = Cart::where('product_id', $req->product_id)->first();
        if($req->product_quantity >= $req->quantity){
            if (!is_null($cart)) {
                if ($cart->color == $req->color && $cart->size == $req->size) {
                    $cart->quantity = $cart->quantity + $req->quantity;
                    $cart->save();
                    return redirect('/cart');
                } else {
                    $cart = new Cart();
                    $cart->user_id = Auth::id();
                    $cart->product_id = $req['product_id'];
                    $cart->quantity = $req['quantity'];
                    $cart->size =  $req['size'];
                    $cart->color = $req['color'];
                    $cart->save();
                    return redirect('/cart');
                }
            }
            else {
                $cart = new Cart();
                $cart->user_id = Auth::id();
                $cart->product_id = $req['product_id'];
                $cart->quantity = $req['quantity'];
                $cart->size =  $req['size'];
                $cart->color = $req['color'];
                $cart->save();
                return redirect('/cart');
            }
        }
        else{
            return redirect('/shop')->with('error','Quantity is not available. You can order maximum '.$req->product_quantity.' quantity');

        }

    }

    public function deletecart($id)
    {
        Cart::where('id', $id)->delete();
        return back();
    }
    public function updatecart(Request $req)
    {
        if($req->product_quantity >= $req->qty)  {
        Cart::where('product_id', $req['name'])->update(['quantity' => $req['qty']]);
        return back();
    }
    else{
        return redirect('/cart')->with('error','Quantity is not available. You can order maximum '.$req->product_quantity.' quantity');
    }
    }
    public function ordernow(Request $req, Order $order)
    {

        //validation
        $req->validate([
            'name' => 'required',
            'address' => 'required|max:255',
            'homeaddress' => 'required|max:255',
            'city' => 'required|max:255',
            'postcode' => 'required|',
            'phone' => 'required|',
            'email' => 'email|',
            'payment' => 'required|',
        ]);
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
                //product -
                $product = Product::where('id', $card->product_id)->get();
                $product->quantity = $product[0]['quantity'] - $order->quantity;
                Product::where('id', $card->product_id)
                    ->update(['quantity' => $product[0]['quantity'] - $order->quantity]);
                //end product -

                //order
                $today = Order::whereDate('created_at', Carbon::today())->get();
                $orders = $today->where('user_id', Auth::id());
                //MAIL
                $details = [
                    'title' => 'LARRYBRIN',
                    'body' => 'Dear Customer Your Product Delevery Soon',
                    'auth' => Auth::user(),
                    'order' => $orders,
                ];
                Mail::to($req['email'])->queue(new \App\Mail\MyTestMail($details));

                $details = [
                    'title' => 'LARRYBRIN',
                    'body' => 'Dear admin  user send a order',
                    'auth' => Auth::user(),
                    'order' => Order::whereDate('created_at', Carbon::today())->get()
                    //'order' => $today_order,
                ];
                Mail::to('taijulhira2686@gmail.com')->queue(new \App\Mail\MyTestMail($details));
            }
        return redirect('/shop')
            ->with(Cart::where('user_id', $userid)->delete())
            ->with('success', 'send a mail... your product delivery Soon thank you....');
    }
    function mail()
    {
        $details = [
            'title' => 'LARRYBRIN',
            'body' => 'Dear admin one user send a order',
            'auth' => Auth::user(),
            'order' => Order::where('user_id', Auth::id())->get()

        ];
        Mail::to('imteajsajid1@gmail.com')->send(new \App\Mail\MyTestMail($details));
    }
}
