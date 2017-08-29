<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Viet Hung
 * Date: 8/28/2017
 * Time: 3:42 PM
 */

namespace App\Http\Common;

use App\Http\Common\Constants;
use App\Http\Common\FileUtil;
use App\Models\Guest;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookInfo;

class SendEmail
{
    public static function sendEmail(array $infor, array $room_type, array $quantity, array $price, $email){
        $bookInfo = array();

        //$bookInfo[Constants::RESERVATION_ID] = 'RS01';
        $bookInfo[Constants::GUEST_NAME] = $infor[Constants::GUEST_NAME];
        $bookInfo[Constants::CMND] = $infor[Constants::CMND];
        $bookInfo[Constants::CHECK_IN] = $infor[Constants::CHECK_IN];
        $bookInfo[Constants::CHECK_OUT] = $infor[Constants::CHECK_OUT];
        $bookInfo[Constants::NUMBER_NIGHT] =  $infor[Constants::NUMBER_NIGHT];
        $bookInfo[Constants::ADULT] = $infor[Constants::ADULT];
        $bookInfo[Constants::CHILDREN] = $infor[Constants::CHILDREN];
        $bookInfo[Constants::NOTE] = $infor[Constants::NOTE];

        // tao thong tin detail
        $detailRoomType = array();
        $sum = 0;
        for($i = 0; $i < count($room_type); $i++){
            $roomType[Constants::STT] = $i+1;
            $roomType[Constants::ROOM_TYPE_NAME] = $room_type[$i];
            $roomType[Constants::QUANTITY] = $quantity[$i];
            $roomType[Constants::PRICE] = number_format((int)$price[$i] * (int)$infor[Constants::NUMBER_NIGHT], null, null, '.') ;
            array_push($detailRoomType,$roomType);
            $sum = $sum + (int)$price[$i];
        }
        $VAT = ($sum * (int)$infor[Constants::NUMBER_NIGHT]) * 10 / 100;
        $detailRoomType['Total'] = number_format($sum * (int)$infor[Constants::NUMBER_NIGHT], null, null, '.') ; // tinh toan tong so tien phai nop. bao gom VAT
        $detailRoomType['VAT'] = number_format($VAT, null, null, '.');
        $detailRoomType['TotalAmount'] = number_format((int)$sum * (int)$infor[Constants::NUMBER_NIGHT] + (int)$VAT , null, null, '.') ;

        //dd($detailRoomType);
        Mail::to($email)->send(new BookInfo($bookInfo,$detailRoomType));
    }
    //send Email


}