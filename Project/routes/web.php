<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('AccessDeny',function (){
    return view('AccessDeny');
});

Route::get('/','K008Controller@View');
Route::get('/K001','K001Controller@View');
Route::post('/K001','K001Controller@getLoginRequest');

//Router  Group for Manager
Route::middleware(['manager'])->group(function () {

});


//Router Group for Receptionist
Route::middleware(['receptionist'])->group(function () {
    Route::get('/K003','K003Controller@View');
    Route::get('/K003/searchReservation','K003Controller@getReservation');
    Route::get('/K003/GetStatus','K003Controller@getReservationStatus');
    Route::post('/K003','K003Controller@postUserInfor');
});
