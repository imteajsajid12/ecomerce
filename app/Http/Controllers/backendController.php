<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class backendController extends Controller
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

    protected function guard()
    {
        return Auth::guard('admins');
    }
}
