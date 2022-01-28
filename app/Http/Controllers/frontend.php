<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\categories;
use App\Models\Contact;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class frontend extends Controller
{
    public function index()
    {
            return view('index')
            ->with('Womens',Product::where('catagory', 'women')->latest()->get())
            ->with('Mens', Product::where('catagory', 'men')->latest()->get());

    }
    public function Shop()
    {
        return view('shop')
            ->with('product', Product::paginate(20))
            ->with('categories', categories::all());
    }
    public function cart()
    {
        $user_id = Auth::id();
        return view('shopping-cart')
            ->with('product', cart::where('user_id', $user_id)->get());
    }
    public function blog()
    {
        return view('blog');
    }
    public function contacts()
    {
        return view('contact');
    }
    public function contacts_add(Request $req)
    {
        $contact = new Contact();
        $contact->name = $req['name'];
        $contact->email = $req['email'];
        $contact->messege = $req['messege'];
        $contact->save();
        return back();
    }
    public function checkout()
    {
        $user_id = Auth::id();
        return view('checkout')
            ->with('product', cart::where('user_id', $user_id)->get());
    }
    public  function about()
    {
        return view('about');
    }
    public function shop_details()
    {
        return view('shop-details');
    }
    public function  blog_details()
    {
        return view(' blog-details');
    }
    public function  details($id)
    {
        return view(' shop-details')
            ->with('product', Product::find($id))
            ->with('products', Product::all());
    }
    //cart
    public function cart1(Request $req)
    {
        // $cart=Member::where('product_id',$req->product_id)->first();

        // if(!is_null($cart)){
        //    $cart->increment ('quantity');
        // }
        // else{
        //     $cart = new Member();
        //     $cart->user_id =Auth::id();
        $cart = new cart();
        $cart->Product_id = $req['product'];
        $cart->quantiy = $req['quantity'];
        $cart->size = $req['size'];
        $cart->color = $req['color'];
        $cart->save();

        return redirect('/cart');
    }

    // public function cartdelete($id){
    //     Member:: where ('product_id',$id)->delete();
    //     return redirect('cart')
    //     ->with('success','Delete successfully');
    // }



    //admin
    public function  admin()
    {
        return view('admin');
    }
    public function admin1(Product  $member, Request $req)
    {
        $image = $req->file('photo');

        $file_name = time() . '.' . $image->getClientOriginalExtension();
        $req->photo->move('image/', $file_name);
        //2
        $image2 = $req->file('photo2');

        $file_name2 = time() . '1' . '.' . $image2->getClientOriginalExtension();
        $req->photo2->move('image/', $file_name2);
        //3
        $image3 = $req->file('photo3');
        $file_name3 = time() . '2' . '.' . $image3->getClientOriginalExtension();
        $req->photo3->move('image/', $file_name3);

        $data = $req->all();
        $member->name = $data['name'];
        $member->detelse = $data['detelse'];
        $member->catagory = $data['catagory'];
        $member->price = $data['price'];
        $member->image = $file_name;
        $member->image2 = $file_name2;
        $member->image3 = $file_name3;
        $member->save();
        return redirect('/admin');
    }

    public function  test()
    {   $database=11;
        $req=12;
        if($database >= $req){
            return 'true';
        }
        else{
            return 'false';
        }
        $cart = Cart::where('product_id', 1)->first();
        dd($cart);

    }
    //
    //product
    public function  categories($id)
    {
        return view('shop')
            ->with('product', Product::where('catagory', $id)->paginate(20))
            ->with('categories', categories::all());
    }

    // scearch

    public function scearch(Request $req)
    {
        return view('shop')
            ->with('product', Product::where('name', 'like', '%' . $req->input('qurey') . '%')
                ->orwhere('catagory', 'like', '%' . $req->input('qurey') . '%')->paginate(20))
            ->with('categories', categories::all());
    }
}
