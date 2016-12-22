<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Notify;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSignin()
    {
        return view('auth.signin');
    }

    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignin(Request $request)
    {

        // Retrieve request data 
        $email           = $request['email'];
        $password        = $request['password'];
        
        // Validation
        $this->validate($request, [
            'email'             => 'required | email',
            'password'          => 'required'
        ]);

        // Login
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('home');
        }
        else
        {
            Notify::error('Failed to log in with the credentials provided.');
            return redirect()->back();
        }
        
    }

    public function postSignup(Request $request)
    {

        // Retrieve request data 
        $username        = $request['username'];
        $firstname       = $request['firstname'];
        $lastname        = $request['lastname'];
        $phonenumber     = $request['phonenumber'];
        $email           = $request['email'];
        $password        = $request['password'];
        $passwordHashed  = Hash::make($password);
        
        // Validation
        $this->validate($request, [
            'username'          => 'required',
            'firstname'         => 'required | alpha',
            'lastname'          => 'required | alpha',
            'phonenumber'       => 'required | numeric',
            'email'             => 'required | email',
            'password'          => 'required | min:6',
            'confirmpassword'   => 'required | same:password' 
        ]);

        // Add new user 
        $user               = new User();
        $user->username     = $username;
        $user->firstname    = $firstname;
        $user->lastname     = $lastname;
        $user->phonenumber  = $phonenumber;
        $user->email        = $email;
        $user->password     = $passwordHashed;
        $user->save();

        Notify::info('Your account has been successfully created.');
        return redirect()->back();
        
    }

    public function postLogout()
    {
        Auth::logout();
        Notify::info('You have been successfully logged out.');
        return redirect()->route('signin');
    }

    public function getRetrievePassword()
    {
        return view('auth.forgotpassword');
    }

    public function postRetrievePassword(Request $request)
    {

        $email      = $request['email'];

        // Validation
        $this->validate($request, [
            'email'             => 'required | email'
        ]);

        // Verify if email exists
        $user   = User::where('email', '=', $email)->first();
        if($user)
        {
            dd('all good');
        }
        else{
            Notify::error('There is not an account registered with the provided email');
            return redirect()->back();
        }

    }
}
