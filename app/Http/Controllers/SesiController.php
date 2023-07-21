<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sesiController extends Controller
{
    //form login
    function index(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required'=>'Email Wajib di Isi', //message jika email belum terisi
            'password.required'=>'Password Wajib di Isi', //message jika password belum terisi
        ]);

        //pengecekan email dan password
        $infoLogin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infoLogin)){
            // return redirect('/admin');
            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            }elseif (Auth::user()->role == 'viewers') {
                return redirect('viewers');
            }

        }else{
            //error messages salah password atau email
            return redirect('')->withErrors('Username atau passwords tidak sesuai')->withInput(); 
        }

    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
