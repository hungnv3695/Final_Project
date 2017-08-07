<?php

namespace App\Http\Controllers;

use App\Http\Common\DateTimeUtil;
use App\Http\DAO\BookOnlineDAO;
use App\Models\Reservation;
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
        $res = new Reservation();
        $res->setNumberOfAdult($request->adult);
        $res->setNumberOfChildren($request->children);
    }
}
