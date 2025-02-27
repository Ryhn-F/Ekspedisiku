<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SesiController extends Controller
{
   function index(){
return view('Login.login');
   }

   function login(Request $request){
$request->validate([
    'email' => 'required'
    ,'password' => 'required'
],[
    'email.required' => 'Email Wajib Diisi yah emuach',
    'password.required' => 'Password Wajib Diisi Nigger'
]);

$infologin =[
    'email' => $request->email,
    'password' => $request->password,
];

if(Auth::attempt($infologin)){

   if (Auth::user()->role == 'admin'){
        return redirect('admin');
    }else if (Auth::user()->role == 'user'){
        return redirect('/home');
    }else{
        return redirect('')->withErrors("Username dan Password Tidak sesuai")->withInput();
    }

        return redirect('admin');
    }else{
        return redirect('/')->withErrors("Username dan password yang dimasukkan tidak sesuai")->withInput();

    }
}

function logout(){
    Auth::logout();
    return redirect('/login-test');
}


function register(){
   return view('regist');
}

}

function logout(){
    Auth::logout();
    return redirect('/');
}
