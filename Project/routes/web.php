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

Route::get('/','HomeController@view');

Route::get('/Login','LoginController@view');
Route::post('/Login','LoginController@getLoginRequest');

Route::get('/LogOut','LoginController@logOut');
Route::get('/SeparateGroup', 'SeparateGroupController@view');

Route::get('/MyInfo','MyInfoController@view');
Route::get('/MyInfo/ChangePassword','MyInfoController@viewChangePasswordPage');
Route::post('/MyInfo/ChangePassword','MyInfoController@changePasswordRequest');
Route::post('/MyInfo','MyInfoController@getUpdateRequest');


//Router Group for Accountant

Route::middleware(['accountant'])->group(function (){
    Route::get('/AccountantList','AccountantController@view');
    Route::post('/AccountantList','AccountantController@getAccountantList');

    Route::get('/UpdatePayment','AccountantController@viewUpdate');
    Route::post('/UpdatePayment','AccountantController@getUpdateRequest');
});



//Router  Group for Manager
Route::middleware(['manager'])->group(function () {
    Route::get('/RoomList','RoomController@viewRoom');
    Route::post('/RoomList' , 'RoomController@getRoomRequest' );

    Route::get('/RoomList/ViewDetail/{roomId}','RoomController@getViewRoomDetailRequest');
    Route::get('/RoomList/ViewDetail/{roomId}/{roomType}','RoomController@getChangeRTRequest');

    Route::post('/RoomList/ViewDetail/{roomId}','RoomController@updateRoomRequest');
    Route::get('/RoomList/AddRoom','RoomController@viewAddRoom');
    Route::post('/RoomList/AddRoom','RoomController@addRoomRequest');

    Route::get('/RoomTypeList/AddRoomType','RoomTypeController@viewAddRoomType');
    Route::post('/RoomTypeList/AddRoomType','RoomTypeController@addRoomTypeRequest');

    Route::get('/RoomtypeList','RoomTypeController@viewRoomType');
    Route::post('/RoomtypeList','RoomTypeController@updateRoomTypeRequest');

    Route::get('/AccountList','AccountController@view');
    Route::post('/AccountList','AccountController@getViewAccountRequest');

    Route::get('AccountList/viewDetail/{userID}','AccountController@viewDetail');
    Route::post('AccountList/viewDetail/{userID}','AccountController@getUpdateRequest');

    Route::get('/AccountList/AddAccount','AccountController@viewAddPage');
    Route::post('/AccountList/AddAccount','AccountController@addAccountRequest');

    Route::get('/thanhtoan','ThanhToan@view');
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
Route::get('/Checkout','K003Controller@checkOut_View');
Route::get('/Checkout/LoadResDetail','K003Controller@loadResDetail');
Route::get('/Checkout/SaveCheckOut','K003Controller@saveCheckOut');

Route::get('/checkinList','K003Controller@viewCheckIn');
Route::post('/checkinList','K003Controller@getSearchCheckInRequest');

Route::get('/checkoutList','K003Controller@viewCheckOut');
Route::post('/checkoutList','K003Controller@getSearchCheckOutRequest');

// Booking
Route::get('/book','BookController@index');
Route::get('/LoadRoomType','BookController@loadRoomType');
Route::get('/LoadRoomInfor','BookController@loadRoomInfor');
Route::get('/Book/ConfirmView','BookController@confirmView');
Route::get('/Book/ConfirmView/BookRoomOnline','BookController@bookRoomOnline');