<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{   
     function indexHome(){
      $data = array(
        'title' => 'Home Page'
      );
       return view('home', $data);
    }

    function indexAdmin(){
    //    echo 'Hallo, Selemat Datang di Halaman Admin';
    //    echo "<h1>" . Auth::User()->name . "</h1>";
    //    echo "<a href='logout'>Logout</a>";

    $data = array(
        'title' => 'Home Page'
      );
       return view('home', $data);

    }


    function indexViewer(){
    //    echo 'Hallo, Selemat Datang di Halaman Viewers';
    //    echo "<h1>" . Auth::User()->name . "</h1>";
    //    echo "<a href='logout'>Logout</a>";
    $data = array(
        'title' => 'Home Page'
      );
       return view('home', $data);
    }
}
