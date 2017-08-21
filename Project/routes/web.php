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
Route::get('/Home','HomeController@view');
Route::get('/Room','HomeController@viewRoom');
Route::get('/Cuisine','HomeController@viewCuisine');
Route::get('/Services','HomeController@viewService');
Route::get('/Gallery','HomeController@viewGallery');

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
Route::middleware(['receptionist'])->group(function () {
    //K004_1: Reservation_List
    Route::get('/ReservationList','ReservationController@viewReservationList');
    Route::get('/ReservationList/GetStatus','ReservationController@getReservationStatus');
    Route::get('/ReservationList/SearchReservation','ReservationController@getReservation');
    Route::post('/K004','ReservationController@postUserInfor');

//K004_2: Reservation_Detail
    Route::get('/ReservationList/ReservationDetail','ReservationController@viewReservationDetail');
    Route::get('/ReservationList/ReservationDetail','ReservationController@getGuest');
    Route::get('/ReservationList/ReservationDetail/GetReservationDetail','ReservationController@getReservationDetail');
    Route::get('/ReservationList/ReservationDetail/LoadBookedRoom','ReservationController@loadBookedRoom');
    Route::get('/ReservationList/ReservationDetail/GetStatus','ReservationController@getReservationStatus');
    Route::get('/ReservationList/ReservationDetail/UpdateReservation','ReservationController@updateReservation');
    Route::get('/ReservationList/ReservationDetail/ChangeSttToProcessing', 'ReservationController@changeSttToProcessing');

//K004_3: Change Room Booked
    Route::get('/ReservationList/ReservationDetail/ChangeBookedRoom','ReservationController@viewChangeBookedRoom');
    Route::get('/ReservationList/ReservationDetail/ChangeBookedRoom/GetRoomFree','ReservationController@getRoomFree');
    Route::get('/ReservationList/ReservationDetail/ChangeBookedRoom/CheckRoom','ReservationController@checkRoom');
    Route::get('/ReservationList/ReservationDetail/ChangeBookedRoom/SaveRoom','ReservationController@saveRoom');

//K004_4: Reservation Offline
    Route::get('/BookOffline','ReservationController@viewBookOffline');
    Route::get('/BookOffline/GetRoomType','ReservationController@getRoomType');
    Route::get('/BookOffline/SearchRoomFree','ReservationController@searchRoomFree');
    Route::get('/BookOffline/insertResInfor','ReservationController@insertResInfor');

//K003_2: Check-in
    Route::get('/CheckInDetail','CheckInOutController@view');
    Route::post('/CheckInDetail','CheckInOutController@getRoomStatusRequest');

    Route::get('/CheckInDetail','CheckInOutController@viewCheckIn');
    Route::get('/CheckInDetail/SearchRoomTypeFree','CheckInOutController@searchRoomTypeFree');
    Route::get('/CheckInDetail/Checkin','CheckInOutController@checkIn');
    Route::get('/CheckInDetail/CheckIsReservation','CheckInOutController@checkIsReservation');
    Route::get('/CheckInDetail/SaveInforCustomer','CheckInOutController@saveInforCustomer');

//K003_3: Check out;
    Route::get('/Checkout','CheckInOutController@checkOut_View');
    Route::get('/Checkout/LoadResDetail','CheckInOutController@loadResDetail');
    Route::get('/Checkout/SaveCheckOut','CheckInOutController@saveCheckOut');
    Route::get('/Checkout/LoadService','CheckInOutController@loadService');
    Route::get('/Checkout/GetUserName','CheckInOutController@getUserName');


    Route::get('/CheckinList','CheckInOutController@viewCheckInList');
    Route::post('/CheckinList','CheckInOutController@getSearchCheckInRequest');

    Route::get('/CheckoutList','CheckInOutController@viewCheckOut');
    Route::post('/CheckoutList','CheckInOutController@getSearchCheckOutRequest');

    //Invoice
    Route::get('/Invoice','InvoiceController@viewInvoice');
});



// Booking
Route::get('/book','BookController@index');
Route::get('/LoadRoomType','BookController@loadRoomType');
Route::get('/LoadRoomInfor','BookController@loadRoomInfor');
Route::get('/Book/ConfirmView','BookController@confirmView');
Route::get('/Book/ConfirmView/BookRoomOnline','BookController@bookRoomOnline');
Route::get('/Book/BaoKimConfirm','BookController@baoKimConfirm');
Route::get('/Success','BookController@saveBookingInfor');