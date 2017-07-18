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

    public function ViewRoomType(Request $request){
        $roomTypeID = $request->roomTypeID;
        $k010Dao = new K010DAO();

        if ( strcmp($roomTypeID,'0') == 0 || $roomTypeID == null ){
            $roomtype = $k010Dao->getRoomType();
            return view('Manager.K010_2',compact('roomtype'));
        } else{

            $roomtype = $k010Dao->getRoomType();
            $roomTypeSelect = $k010Dao->getRoomTypeValue($roomTypeID);
            $accessory =  $k010Dao->getAccessoryDetail($roomTypeID);

            return view('Manager.K010_2',compact('roomtype','roomTypeSelect','accessory'));
        }


    }

    public function UpdateRoomTypeRequest(Request $request){
        $k010Dao = new K010DAO();

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
            Constants::QUANLITY_ACC => ($request->txtquanlityAcc == null) ? '0':$request->txtquanlityAcc,
            Constants::PRICE_ACC =>  ($request-> txtPriceAcc ==null) ? '0':$request-> txtPriceAcc
        );

        for($i=1; $i<$count; $i++){

            $str1 = Constants::NAME_ACC . $i;
            $str2 = Constants::PRICE_ACC .$i ;
            $str3 = Constants::QUANLITY_ACC . $i;

            $accessory += array($str1 => $request->$str1 );
            $accessory += array($str2 => ($request->$str2 ==null)?'0':$request->$str2 );
            $accessory += array($str3 => ($request->$str3 ==null)?'0':$request->$str3 );
        }

        $result = $k010Dao->updateRoomType($roomType,$accessory,$count);

        return redirect('/K010_2');
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

            $result = $k010Dao->addRoomType($roomType,$accessory,$count);

        }

        if ($result){
            return redirect('/K010_2');
        }else{
            back()->withInput();
        }
    }


}
