<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Notify;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        return view('profile');
    }

    public function postUpdateProfile(Request $request)
    {

        // Retrieve request data 
        $username        = $request['username'];
        $firstname       = $request['firstname'];
        $lastname        = $request['lastname'];
        $phonenumber     = $request['phonenumber'];
        $email           = $request['email'];
        
        // Validation
        $this->validate($request, [
            'username'          => 'required',
            'firstname'         => 'required | alpha',
            'lastname'          => 'required | alpha',
            'phonenumber'       => 'required | numeric',
            'email'             => 'required | email'
        ]);

        Auth::user()->update([
            'username'          => $username,
            'firstname'         => $firstname,
            'lastname'          => $lastname,
            'phonenumber'       => $phonenumber,
            'email'             => $email
        ]);

        Notify::success('Your details have been successfully updated.');

        return redirect()->back();
    }
}
