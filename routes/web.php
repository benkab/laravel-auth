<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::get('/', [
    'uses' => 'HomeController@getHome',
    'as' => 'home'
])->middleware('auth');

    // User and Auth
    Route::get('/signin', [
        'uses' => 'UserController@getSignin',
        'as' => 'signin'
    ])->middleware('guest');

    Route::get('/signup', [
        'uses' => 'UserController@getSignup',
        'as' => 'signup'
    ])->middleware('guest');

    Route::post('/signin', [
        'uses' => 'UserController@postSignin',
        'as' => 'post.signin'
    ])->middleware('guest');

    Route::post('/signup', [
        'uses' => 'UserController@postSignup',
        'as' => 'post.signup'
    ])->middleware('guest');

    Route::get('/logout', [
        'uses' => 'UserController@postLogout',
        'as' => 'logout'
    ]);

// Verification
Route::get('/verifcation/code', [
    'uses' => 'VerificationController@getSendVerificationCode',
    'as' => 'send.code'
])->middleware('auth');

Route::post('/verifcation/code', [
    'uses' => 'VerificationController@postSendVerificationCode',
    'as' => 'verify.code'
])->middleware('auth');

Route::get('/verifcation/email', [
    'uses' => 'VerificationController@postSendVerificationEmail',
    'as' => 'verify.email'
])->middleware('auth');

Route::get('/verifcation/token/{token}', [
    'uses' => 'VerificationController@getVerificationToken'
])->middleware('auth');