<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/14/2017
 * Time: 9:47 PM
 */

namespace App\Http\DAO;


use App\Http\Common\Constants;
use App\Models\RoomType;

class K010DAO
{
    public function checkKey($roomTypeID){
        $result = RoomType::where(Constants::TBL_ROOM_TYPE_ID ,$roomTypeID)->count();

        if($result!=0){
            return false;
        }else{
            return true;
        }
    }


}