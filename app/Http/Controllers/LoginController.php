<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function doLogin(){
        $input=request()->only('email','password');
        $remember=request('remember_me');
        if(auth()->attempt($input,$remember)){
            return redirect('/mountair')->with('message','Welcome To MountAir !!');
        }
        return redirect('/')->with('message','Incorrect Email Or Password');
    }
    public function viewLogin(){
        return view('mountair-index');
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
