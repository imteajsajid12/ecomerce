<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Sell;
use App\Models\Shipping;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }
    //
    public function admin1()
    {
        return view('backend.dashboard')
            ->with('product', Product::all())
            ->with('order', Order::all())
            ->with('delivery', Product::all())
            ->with('conteact', Contact::all())
            ->with('total1', Sell::get()->sum("total_price"))
            ->with('total', Sell::all());
    }
    public function product()
    {


        return view('backend.add_product')->with('categories', categories::all());
    }
    public function admin_add(Request $req)
    {
        //validation
        $this->validate($req, [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'color' => 'required',
            'size' => 'required',
            'details' => 'required|',
            'photo' => 'required',
            'catagory' => 'required',
        ]);
        if($req->color == !null){
        $member = new Product();
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
        $member->detelse = $data['details'];
        $member->catagory = $data['catagory'];
        $member->quantity = $data['quantity'];
        $member->color = $data['color'];
        $member->size = $data['size'];
        $member->price = $data['price'];
        $member->video = $data['video'];
        $member->image = $file_name;
        $member->image2 = $file_name2;
        $member->image3 = $file_name3;
        $member->save();
        return back()->with('success', 'Product Add Successfully.');
        }
    }
    public function show_product()
    {
        return view('backend.product_tables')->with('product', Product::all());;
    }
    public function product_delete($id)
    {

        $data = Product::where('id', $id)->first();
        $image_path = "image/" . $data->image;
        $image_path2 = "image/" . $data->image2;
        $image_path3 = "image/" . $data->image3;
        @unlink($image_path);
        @unlink($image_path2);
        @unlink($image_path3);
        Product::where('id', $id)->delete();
        return back()->with('success', 'delete successfylly.');
    }

    public function product_edite(Product $id)
    {
        return view('backend.edite')->with('data', $id);
    }
    public function product_update(Request $req)
    {       //validation

        $this->validate($req, [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'color' => 'required',
            'details' => 'required|max:1000',
            //'photo' => 'required',
            'catagory' => 'required',
        ]);
        if($req->color == !null){
            dd($req->color);
           $datas =Product::find($req->id);
        if ($req->hasFile('image')) {
            $image_path = "image/" . $req['image'];
            $image_path2 = "image/" . $req['image2'];
            $image_path3 = "image/" . $req['image3'];
            @unlink($image_path);
            @unlink($image_path2);
            @unlink($image_path3);
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

            $data['image'] = $file_name;
            $data['image2'] = $file_name2;
            $data['image3'] = $file_name3;
        } else {
            $data['image'] = $datas->image;
            $data['image2'] = $datas->image2;
            $data['image3'] =$datas->image3;
        }
        $data = array();
        $data['name'] = $req->name;
        $data['detelse'] = $req->details;
        $data['catagory'] = $req->catagory;
        $data['color'] = $req->color;
        $data['price'] = $req->price;
        Product::where('id', $req['id'])->update($data);
        return redirect('/admin/product_table')->with('success', 'Update successful.');
    }
    }
    public function contracts()
    {
        return view('backend.contact')->with('con', Contact::all());
    }
    public function delete_contrects($id)
    {
        Contact::where('id', $id)->delete();
        return back()->with('success', 'delete successful.');;
    }
    public function order()
    {
        return view('backend.order')
            ->with('order', Order::all());
    }
    public function order_details($id)
    {
        return view('backend.delivery_product')
            ->with('data', Order::where('id', $id)->get());
    }
    public function delivery_delete(Request $req)
    {
        $data = Order::where('id', $req['id'])->first();
        //dd($data->product_id);
        $order = new Sell();
        $order->product_id = $data->product_id;
        $order->total_price = $req['total'];
        $order->save();
        //Order::where('id', $req['id'])->delete();
        $data->delete();
        return redirect('/admin/order');
    }
    public function sell()
    {
        return view('backend.sell')
            ->with('sell', Sell::all());
    }
    public function sell_delete($id)
    {
        Sell::where('id', $id)->delete();
        return back();
    }
}
