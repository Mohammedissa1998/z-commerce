<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function postRegister(Request $request)
     {


    // dd($request);
        //validation
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);


      

        //registration
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);


        //login 
        Auth::login($user);

        return back()->with('success','succesfully Logged in');
        
     }
    
//logout 

public function logout(){

    Auth::logout();
    return back();
}

//login user
public function postLogin(Request $request){

//validate
$details = $request->validate([
'email' => 'required|email',
'password' => 'required'

]);
//login
if (Auth::attempt($details))
{

    return redirect()->intended('/');
}
return back()->withErrors([

    'email' => 'invalid login'

]);
//return


}

    
}
