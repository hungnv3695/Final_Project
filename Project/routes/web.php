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
//Route::middleware(['receptionist'])->group(function () {
//    Route::get('/K004_1/GetStatus','K004Controller@getReservationStatus');
//    Route::post('/K004','K004Controller@postUserInfor');
//
//    Route::get('/K004_1/K004_2/View','K004Controller@K004_2_View');
//    Route::get('/K004_1/K004_2','K004Controller@GetReservationDetail');
//
//
//});
Route::get('/K004_1','K004Controller@K004_1_View');
Route::get('/K004_1/GetStatus','K004Controller@getReservationStatus');
Route::get('/K004_1/SearchReservation','K004Controller@getReservation');
Route::post('/K004','K004Controller@postUserInfor');

Route::get('/K004_1/K004_2','K004Controller@K004_2_View');
Route::get('/K004_1/K004_2','K004Controller@GetGuest');
Route::get('/K004_1/K004_2/GetReservationDetail','K004Controller@GetReservationDetail');
Route::get('/K004_1/K004_2/GetRoomFree','K004Controller@GetRoomFree');
