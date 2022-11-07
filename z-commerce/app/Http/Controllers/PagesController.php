<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //home
    public function home(){
        return view('pages/home');
    }

    //cart
    public function cart(){
        return view('pages/cart');
    }

}
