<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //show login page
    public function showLogin()
    {
        return view('pages.login');
    }

    //show register page
    public function showRegister()
    {
        return view('pages.register');
    }

     //register user

     
    //login user

    
}
