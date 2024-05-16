<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }
    public function doRegister(Request $request){
        
        $validated = $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:4',
        ]);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect('/')->with('success','Thanks For Registering');

    }
}
