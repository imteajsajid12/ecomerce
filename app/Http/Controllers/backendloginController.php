<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class backendloginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo ='admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    $this->middleware('guest:admins')->except('logout');
    }
    public function showLoginForm(){
        return view('backend.layouts.login');
    }


        // public function admin1(){
        //     return view('backend.dashboard');
        // }

    protected function guard()
    {
        return Auth::guard('admins');
    }
}
