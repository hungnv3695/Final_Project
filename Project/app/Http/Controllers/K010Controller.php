<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/14/2017
 * Time: 1:23 PM
 */

namespace App\Http\Controllers;


use App\Http\Common\Constants;
use App\Http\DAO\K010DAO;
use App\Models\RoomType;
use Illuminate\Http\Request;

class K010Controller extends Controller
{
    public function ViewAddRoomType(){
        return view('Manager.K010_1');
    }

    public function AddRoomTypeRequest(Request $request){

        $k010Dao = new K010DAO();
        if(!$k010Dao->checkKey($request->txtRoomTypeID)){
            return back()->withInput();
        }else{

            $roomType = new RoomType();
            $roomType->setRoomTypeID($request->txtRoomTypeID);
            $roomType->setAdult($request->txtAdult);
            $roomType->setPrice($request->txtPrice);
            $roomType->setChildren($request->txtChildren);
            $roomType->setDescription($request->descriptiontxt);
            $roomType->setName($request->txtFullname);

            $count = $request->count;
            $accessory = array(
                Constants::NAME_ACC => $request->txtNameAcc,
                Constants::QUANLITY_ACC => $request->txtquanlityAcc,
                Constants::PRICE_ACC => $request-> txtPriceAcc
            );

            for($i=1; $i<$count; $i++){

                $str1 = Constants::NAME_ACC . $i;
                $str2 = Constants::PRICE_ACC .$i ;
                $str3 = Constants::QUANLITY_ACC . $i;

                $accessory += array($str1 => $request->$str1 );
                $accessory += array($str2 => $request->$str2 );
                $accessory += array($str3 => $request->$str3 );

            }


        }

    }
}
