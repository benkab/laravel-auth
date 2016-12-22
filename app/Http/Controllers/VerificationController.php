<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notify;
use Illuminate\Support\Str;
use Nexmo;
use App\User;
use Mail;

class VerificationController extends Controller
{
    public function getSendVerificationCode()
    {

        // Check if user is already verified
        if(Auth::user()->verified){
            Notify::info('Your account is already verified');
            return redirect()->back();
        }

        // Retrieve user phone number
        $phonenumber    = Auth::user()->phonenumber;

        // Create the code
        $code           = Str::random(5);

        // Update the user's verification code
        Auth::user()->update([
            'code' => $code
        ]);
        
        // Create the message
        $message        = 'Your verication code is ' . $code;

        // Send the sms
        Nexmo::message()->send([
            'to' => '27835221162',
            'from' => '27820000654',
            'text' => $message
        ]);

        Notify::success('An sms with the vefication code has been sent to your number');
        return redirect()->back();
    }

    public function postSendVerificationCode(Request $request)
    {
        // Retrieve request data
        $code       = $request['code'];

        // Validation
        $this->validate($request, [
            'code'             => 'required | min:5 | max:5'
        ]);

        // User's code
        $user_code  = Auth::user()->code;

        // Compare the codes
        $value = str_is($code, $user_code);

        if($value){

            // Update the user's verification code
            Auth::user()->update([
                'verified' => true
            ]);

            Notify::success('Your account has been successfully verified');
            return redirect()->back();
        }
        else{
            Notify::error('The code entered is not correct');
            return redirect()->back();
        }

    }

    public function postSendVerificationEmail()
    {

        // Retrieve user 
        $user    = Auth::user();

        // Generate the token
        $token   = Str::random(64);

        // Update the user's verification token
        Auth::user()->update([
            'token' => $token
        ]);

        // Sending the email
        Mail::send('emails.verification', ['user' =>  $user], function ($message) use ($user) {
            $message->from('no-reply@auth.com', 'AUTH');
            $message->to($user->email, $user->firstname)->subject('Account verification');
        });

        Notify::success('Your activation email has been successfully sent to ' . $user->email);
        return redirect()->back();
    }

    public function getVerificationToken($token)
    {
        // Check if user is already verified
        if(Auth::user()->verified){
            Notify::info('Your account is already verified');
            return redirect()->route('home');
        }

            // Verify the token 

            // User's token
            $user_token  = Auth::user()->token;

            // Compare the codes
            $value = str_is($token, $user_token);

            if($value){
                
                // Update the user's verification code
                Auth::user()->update([
                    'verified' => true
                ]);

                Notify::success('Your account has been successfully verified');
                return redirect()->route('home');
              
            }
            else{
                Notify::error('The token provided is not correct');
                return redirect()->route('home');
            }

    }
}
