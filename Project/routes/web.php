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

Route::get('/','K008Controller@view');

Route::get('/K001','K001Controller@View');
Route::post('/K001','K001Controller@getLoginRequest');

Route::get('/K005_1','K005Controller@viewRoom');
Route::post('/K005_1' , 'K005Controller@getRoomRequest' );

Route::get('/K005_1/K005_2/{roomId}','K005Controller@getViewRoomDetailRequest');
Route::get('/K005_1/K005_2/{roomId}/{roomType}','K005Controller@getChangeRTRequest');

Route::post('/K005_1/K005_2/{roomId}','K005Controller@updateRoomRequest');
Route::get('/K005_1/K005_3','K005Controller@viewAddRoom');
Route::post('/K005_1/K005_3','K005Controller@addRoomRequest');

Route::get('/K010_1','K010Controller@viewAddRoomType');
Route::post('/K010_1','K010Controller@addRoomTypeRequest');

Route::get('/K010_2','K010Controller@viewRoomType');
Route::post('/K010_2','K010Controller@updateRoomTypeRequest');

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
//K004_1: Reservation_List
Route::get('/K004_1','K004Controller@K004_1_View');
Route::get('/K004_1/GetStatus','K004Controller@getReservationStatus');
Route::get('/K004_1/SearchReservation','K004Controller@getReservation');
Route::post('/K004','K004Controller@postUserInfor');

//K004_2: Reservation_Detail
Route::get('/K004_1/K004_2','K004Controller@K004_2_View');
Route::get('/K004_1/K004_2','K004Controller@GetGuest');
Route::get('/K004_1/K004_2/GetReservationDetail','K004Controller@GetReservationDetail');
Route::get('/K004_1/K004_2/LoadBookedRoom','K004Controller@LoadBookedRoom');
Route::get('/K004_1/K004_2/GetStatus','K004Controller@getReservationStatus');
Route::get('/K004_1/K004_2/UpdateReservation','K004Controller@UpdateReservation');

//K004_3: Change Room Booked
Route::get('/K004_1/K004_2/K004_3','K004Controller@K004_3_View');
Route::get('/K004_1/K004_2/K004_3/GetRoomFree','K004Controller@GetRoomFree');
Route::get('/K004_1/K004_2/K004_3/CheckRoom','K004Controller@CheckRoom');
Route::get('/K004_1/K004_2/K004_3/SaveRoom','K004Controller@SaveRoom');

