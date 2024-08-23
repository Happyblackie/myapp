<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
       
        //dd($request);
        //dd($request->username);

        //Validate
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);
        //dd($fields);



        //Register
       $user =  User::create($fields);


        //Login
        Auth::login($user);


        //Rgister
        return redirect()->route('home');
    }


    //Login User

    public function login(Request $request)
    {
        
        //Validate
        $fields = $request->validate([
           
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);
        //dd($request);

        //Try to login User
        if(Auth::attempt($fields, $request->remember))
        {
            // return redirect()->route('home');
             //alternatively
            return redirect()->intended('dashboard'); // takes user to intended page
        }
        else
        {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records'
            ]);
        }
    }


    //Logout Users
    public function logout(Request $request)
    {
       // dd('ok');

       //Logout the USER
       Auth::logout();

       //Invalidate user's session
       $request->session()->invalidate();
        
       //Regenerate CSRF token
       $request->session()->regenerateToken();

       //Redirect to home
       return redirect('/');

    }



}


