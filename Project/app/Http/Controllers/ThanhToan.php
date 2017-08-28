<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/10/2017
 * Time: 1:20 PM
 */

namespace App\Http\Controllers;


use App\Http\Common\Constants;
use App\Http\Common\FileUtil;
use App\Models\Guest;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookInfo;
class ThanhToan extends Controller
{
    public function view(){
        //send Email

        $bookInfo = array();

        //$bookInfo[Constants::RESERVATION_ID] = 'RS01';
        $bookInfo[Constants::GUEST_NAME] = 'Đặng Công Sơn';
        $bookInfo[Constants::CMND] = '1679372973';
        $bookInfo[Constants::CHECK_IN] = '2017-08-25';
        $bookInfo[Constants::CHECK_OUT] = '2017-09-01';
        $bookInfo[Constants::NUMBER_NIGHT] =  '4';
        $bookInfo[Constants::ADULT] = '4';
        $bookInfo[Constants::CHILDREN] = '2';
        $bookInfo[Constants::NOTE] = '';

        // tao thong tin detail
        $detailRoomType = array();


        $roomType[Constants::STT] = '1';
        $roomType[Constants::ROOM_TYPE_NAME] = "Double";
        $roomType[Constants::QUANTITY] = '2';
        $roomType[Constants::PRICE] = '500.000';
        array_push($detailRoomType,$roomType);

        $roomType[Constants::STT] = '2';
        $roomType[Constants::ROOM_TYPE_NAME] = "Single";
        $roomType[Constants::QUANTITY] = '1';
        $roomType[Constants::PRICE] = '100.000';
        array_push($detailRoomType,$roomType);

        $detailRoomType['Total'] = '1.200.000'; // tinh toan tong so tien phai nop. bao gom VAT

        //dd($detailRoomType);
        Mail::to('sondcse03564@fpt.edu.vn')->send(new BookInfo($bookInfo,$detailRoomType));



    }
}