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

Route::get('/K001','K001Controller@view');
Route::post('/K001','K001Controller@getLoginRequest');

Route::get('/K001/LogOut','K001Controller@logOut');
Route::get('/K002', 'K002Controller@view');

Route::get('/K012','K012Controller@view');
Route::get('/K012/K012_1','K012Controller@viewChangePasswordPage');
Route::post('/K012/K012_1','K012Controller@changePasswordRequest');
Route::post('/K012','K012Controller@getUpdateRequest');

//Router  Group for Manager
Route::middleware(['manager'])->group(function () {
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

    Route::get('/K011','K011Controller@view');
    Route::post('/K011','K011Controller@getViewAccountRequest');

    Route::get('K011_1/K011_2/{userID}','K011Controller@viewDetail');
    Route::post('K011_1/K011_2/{userID}','K011Controller@getUpdateRequest');

    Route::get('/K011_1/K011_3','K011Controller@viewAddPage');
    Route::post('/K011_1/K011_3','K011Controller@addAccountRequest');
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
Route::get('/K004_1/K004_2','K004Controller@getGuest');
Route::get('/K004_1/K004_2/GetReservationDetail','K004Controller@getReservationDetail');
Route::get('/K004_1/K004_2/LoadBookedRoom','K004Controller@loadBookedRoom');
Route::get('/K004_1/K004_2/GetStatus','K004Controller@getReservationStatus');
Route::get('/K004_1/K004_2/UpdateReservation','K004Controller@updateReservation');
Route::get('/K004_1/K004_2/ChangeSttToProcessing', 'K004Controller@changeSttToProcessing');

//K004_3: Change Room Booked
Route::get('/K004_1/K004_2/K004_3','K004Controller@K004_3_View');
Route::get('/K004_1/K004_2/K004_3/GetRoomFree','K004Controller@getRoomFree');
Route::get('/K004_1/K004_2/K004_3/CheckRoom','K004Controller@checkRoom');
Route::get('/K004_1/K004_2/K004_3/SaveRoom','K004Controller@saveRoom');

//K004_4: Reservation Offline
Route::get('/K004_4','K004Controller@K004_4_View');
Route::get('/K004_4/GetRoomType','K004Controller@getRoomType');
Route::get('/K004_4/SearchRoomFree','K004Controller@searchRoomFree');
Route::get('/K004_4/insertResInfor','K004Controller@insertResInfor');

//K003_2: Check-in
Route::get('/K003','K003Controller@view');
Route::post('/K003','K003Controller@getRoomStatusRequest');
Route::get('/K003_2','K003Controller@k003_2_View');
Route::get('/K003_2/SearchRoomTypeFree','K003Controller@searchRoomTypeFree');
Route::get('/K003_2/Checkin','K003Controller@checkIn');
Route::get('/K003_2/CheckIsReservation','K003Controller@checkIsReservation');
Route::get('/K003_2/SaveInforCustomer','K003Controller@saveInforCustomer');

//K003_3: Check out;
Route::get('/K003_3','K003Controller@k003_3_View');


Route::get('/K013','K013Controller@viewCheckIn');
Route::post('/K013','K013Controller@getSearchCheckInRequest');

// Booking
Route::get('/book', 'BookController@index');