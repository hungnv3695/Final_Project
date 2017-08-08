<?php

namespace App\Http\Controllers;

use App\Http\Common\DateTimeUtil;
use App\Http\DAO\BookOnlineDAO;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        return view('Guest.Book.pages.booking');
    }


    public function loadRoomType(Request $request){
        $check_in = DateTimeUtil::ConvertDateToString2($request->check_in);
        $check_out = DateTimeUtil::ConvertDateToString2($request->check_out);
        //dd($check_in,$check_in);
        $BookOnlineDAO = new BookOnlineDAO();
        $result = $BookOnlineDAO->getRoomTypeFree($check_in,$check_out);
        return response($result);
    }

    public function loadRoomInfor(){
        $BookOnlineDAO = new BookOnlineDAO();
        $result = $BookOnlineDAO->getRoomTypeInfor();
        return $result;
    }

    public function confirmView() {
        return view('Guest.Confirm');
    }

    public function bookRoomOnline(Request $request){
        $room_type = explode(',', $request->room_type);
        $room_quantity = explode(',', $request->room_quantity);
        $room_price_total = $request->room_price_total;

        $countRoom  = $request->countRoom;
        $check_in = DateTimeUtil::ConvertDateToString2($request->check_in);
        $check_out = DateTimeUtil::ConvertDateToString2($request->check_out);


        //$listRoom = $bookOnlineDAO->getRoomToBook($check_in, $check_out, $type_name, $countRoom);

        $res = new Reservation();
        $res->setCheckIn($check_in);
        $res->setCheckOut($check_out);
        $res->setNumberOfAdult($request->adult);
        $res->setNumberOfChildren($request->children);
        $res->setEditer('Hung');
        $res->setNote($request->notetxt);
        $res->setCreateYmd(Carbon::now());
        $res->setStatusId('RS01');
        $res->setNumberOfRoom($countRoom);

        $guest = new Guest();
        $guest->setName($request->txtFullname);
        $guest->setIdentityCard($request->txtIdcard);
        $guest->setPhone($request->txtPhone);
        $guest->setAddress($request->txtAddress);
        $guest->setMail($request->txtEmail);
        $guest->setCountry($request->Country);

        $resDetail = new ReservationDetail();
        $resDetail->setDateIn($check_in);
        $resDetail->setDateOut($check_out);
        $resDetail->setCheckInFlag(0);
        $resDetail->setCheckOutFlag(0);
        $resDetail->setCreateYmd(Carbon::now());

        $bookOnlineDAO = new BookOnlineDAO();
        $result = $bookOnlineDAO->createBook($res,$resDetail, $guest, $room_type, $room_quantity,$check_in,$check_out);

        return response($result);

    }
}
