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

Route::get('/K005_1','K005Controller@ViewRoom');
Route::post('/K005_1' , 'K005Controller@GetRoomRequest' );

Route::get('/K005_1/K005_2/{roomId}','K005Controller@getViewRoomDetailRequest');
Route::get('/K005_1/K005_2/{roomId}/{roomType}','K005Controller@getChangeRTRequest');

Route::post('/K005_1/K005_2/{roomId}','K005Controller@UpdateRoomRequest');
Route::get('/K005_1/K005_3','K005Controller@ViewAddRoom');
Route::post('/K005_1/K005_3','K005Controller@AddRoomRequest');

Route::get('/K010_1','K010Controller@ViewAddRoomType');
Route::post('/K010_1','K010Controller@AddRoomTypeRequest');

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
