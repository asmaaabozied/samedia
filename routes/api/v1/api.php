<?php

use Illuminate\Support\Facades\Route;

/// new website
Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('/add-contactus', 'App\Http\Controllers\Api\ContactUsController@contactus');
Route::get('/setting', 'App\Http\Controllers\Api\ContactUsController@contacts');
Route::post('/updatesetting', 'App\Http\Controllers\Api\ContactUsController@updatesetting');
Route::get('/aboutus', 'App\Http\Controllers\Api\ContactUsController@termandcondition');
Route::get('/listofcontacts', 'App\Http\Controllers\Api\ContactUsController@listofcontacts');
Route::get('/listofpermission', 'App\Http\Controllers\Api\AuthController@listofpermission');
Route::delete('/deletecontact/{id}', 'App\Http\Controllers\Api\ContactUsController@deletecontact');
Route::post('/updateProfile', 'App\Http\Controllers\Api\AuthController@updateProfile');

// end of new website


Route::post('/activateRegister', 'App\Http\Controllers\Api\AuthController@activateRegister');
Route::post('/resendCodeRegister', 'App\Http\Controllers\Api\AuthController@resendCode');
Route::post('/forgetPassword', 'App\Http\Controllers\Api\AuthController@forgetPassword');
Route::post('/checkCodeForget', 'App\Http\Controllers\Api\AuthController@checkCode');
Route::post('/resetpassword', 'App\Http\Controllers\Api\AuthController@resetpassword');


Route::apiResource('sliders', 'App\Http\Controllers\Api\SliderController');
Route::apiResource('services', 'App\Http\Controllers\Api\ServiceController');
Route::apiResource('teams', 'App\Http\Controllers\Api\TeamController');
Route::apiResource('projects', 'App\Http\Controllers\Api\ProjectController');
Route::apiResource('roles', 'App\Http\Controllers\Api\RoleController');


Route::group(['middleware' => 'auth:api'], function () {


    Route::post('/logout', 'App\Http\Controllers\Api\AuthController@logout');
//    Route::post('/updateProfile', 'App\Http\Controllers\Api\AuthController@updateProfile');


    //end aquars


    Route::post('/changepassword', 'App\Http\Controllers\Api\AuthController@changepassword');
    Route::post('/changephone', 'App\Http\Controllers\Api\AuthController@changephone');
    Route::post('/confirmupdatephone', 'App\Http\Controllers\Api\AuthController@confirmupdatephone');


});


