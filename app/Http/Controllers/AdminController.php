<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{   
     function indexHome(){
       return view('home');
    }

    function indexAdmin(){
    //    echo 'Hallo, Selemat Datang di Halaman Admin';
    //    echo "<h1>" . Auth::User()->name . "</h1>";
    //    echo "<a href='logout'>Logout</a>";

    return view('home');

    }


    function indexViewer(){
    //    echo 'Hallo, Selemat Datang di Halaman Viewers';
    //    echo "<h1>" . Auth::User()->name . "</h1>";
    //    echo "<a href='logout'>Logout</a>";
    return view('home');
    }
}
