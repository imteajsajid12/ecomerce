<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\frontend;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\backendloginController;
use App\Http\Controllers\AdminController;


Route::get('/', [frontend::class, 'index'])->name('home');
//google login
Route::get('auth/google', [GoogleController::class,'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class,'handleGoogleCallback']);
//end

Auth::routes();

Route::get('/home', [frontend::class, 'index'])->name('home');



Route::get('/shop', [frontend::class, 'Shop'])->name('Shop');



Route::get('/cart', [frontend::class, 'cart'])->name('cat');
Route::get('/blog', [frontend::class, 'blog']);
Route::get('/contacts', [frontend::class, 'contacts']);
Route::post('contacts/add', [frontend::class, 'contacts_add'])->name('contact_add');
Route::get('/chakout', [frontend::class, 'chakout']);
Route::get('/about', [frontend::class, 'about']);
Route::get('/shop-details', [frontend::class, 'shop_details']);
Route::get('/blog-details', [frontend::class, 'blog_details']);
Route::get('detelase/{id}', [frontend::class, 'detelse']);





//scearch
Route::get('scearch/', [frontend::class, 'scearch']);
//product

Route::get('/shop/man', [frontend::class, 'man']);

Route::get('/shop/women', [frontend::class, 'women']);

Route::get('shop/bag', [frontend::class, 'bag']);

Route::get('shop/clothing', [frontend::class, 'clothing']);

Route::get('/shop/shoes', [frontend::class, 'shoes']);

Route::get('/shop/accessories', [frontend::class, 'accessories']);

Route::get('/shop/kids', [frontend::class, 'kids']);


//end
//caert
Route::post('detelase/addcart', [HomeController::class, 'cart1'])->name('addcart');
Route::get('cart/delete/{id}', [HomeController::class, 'deletecart']);
Route::Post('cart/update', [HomeController::class, 'updatecart'])->name('update');
Route::Post('cart/addcart', [HomeController::class, 'ordernow'])->name('ordernow');

Route::get('mail', [HomeController::class, 'mail']);



///admin

Route::get('/admin/home', [AdminController::class, 'admin1']);
Route::get('admin', [backendloginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin', [backendloginController::class,'Login']);
//add->show
Route::get('/admin/add_product', [AdminController::class, 'product']);
Route::post('admin_add', [AdminController::class, 'admin_add'])->name('admin_add');
Route::get('/admin/product_table', [AdminController::class, 'show_product']);
Route::get('admin/edite{id}', [AdminController::class, 'product_edite']);
Route::POST('admin/update/{id}', [AdminController::class, 'product_update']);
Route::get('admin/delete{id}', [AdminController::class, 'product_delete']);
//end
//order
Route::get('/admin/order', [AdminController::class, 'order']);
Route::get('admin/detelase/{id}', [AdminController::class, 'order_detelse']);
Route::get('admin/add', [AdminController::class, 'delevery_delete'])->name('delevery_delete');

//contracts
Route::get('/admin/contacts', [AdminController::class, 'contracts']);
Route::get('admin/contacts{id}', [AdminController::class, 'delete_contrects']);
//sell
Route::get('/admin/sell', [AdminController::class, 'sell']);
Route::get('admin/sell/{id}', [AdminController::class, 'sell_delete']);

///test
Route::get('test',[frontend::class,'test']);
