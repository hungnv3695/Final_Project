<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/19/2017
 * Time: 9:32 PM
 */

namespace App\Http\Controllers;


use App\Http\DAO\K003DAO;
use Illuminate\Http\Request;

class K003Controller extends Controller
{
    public function view(){
        return view('Reception.K003_1');
    }

    public function getRoomStatusRequest(Request $request){
        dd($request);
        $checkIn = $request->checkin;
        $checkOut = $request->checkout;

        $k003 = new K003DAO();
        $roomStatus = $k003->getRoomStatus($checkIn,$checkOut);

        return view('Reception.K003_1',compact('roomStatus'));

    }

}