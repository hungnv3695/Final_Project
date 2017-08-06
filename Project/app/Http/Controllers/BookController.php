<?php

namespace App\Http\Controllers;

use App\Http\Common\DateTimeUtil;
use App\Http\DAO\BookOnlineDAO;
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
}
