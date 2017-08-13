<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/14/2017
 * Time: 1:23 PM
 */

namespace App\Http\Controllers;

use App\Http\Common\Constants;
use App\Http\Common\Message;

use App\Http\DAO\RoomTypeDAO;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function viewAddRoomType(){
        return view('Manager.AddRoomType');
    }

    public function viewRoomType(Request $request){
        $roomTypeID = $request->roomTypeID;
        $roomTypeDAO = new RoomTypeDAO();

        if ( strcmp($roomTypeID,'0') == 0 || $roomTypeID == null ){
            $roomtype = $roomTypeDAO->getRoomType();
            return view('Manager.RoomType',compact('roomtype'));
        } else{

            $roomtype = $roomTypeDAO->getRoomType();

            $roomTypeSelect = $roomTypeDAO->getRoomTypeValue($roomTypeID);
            $accessory =  $roomTypeDAO->getAccessoryDetail($roomTypeID);

            return view('Manager.RoomType',compact('roomtype','roomTypeSelect','accessory'));
        }
    }

    public function updateRoomTypeRequest(Request $request){
        $roomTypeDAO = new RoomTypeDAO();

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
            Constants::QUANTITY_ACC => ($request->txtquantityAcc == null) ? '0':$request->txtquantityAcc,
            Constants::PRICE_ACC =>  ($request-> txtPriceAcc ==null) ? '0':$request-> txtPriceAcc
        );

        for($i=1; $i<$count; $i++){

            $str1 = Constants::NAME_ACC . $i;
            $str2 = Constants::PRICE_ACC .$i ;
            $str3 = Constants::QUANTITY_ACC . $i;

            $accessory += array($str1 => $request->$str1 );
            $accessory += array($str2 => ($request->$str2 ==null)?'0':$request->$str2 );
            $accessory += array($str3 => ($request->$str3 ==null)?'0':$request->$str3 );
        }

        //Neu ten ton tai thi hien thi la message loi
        if(!$roomTypeDAO->checkName($request->txtFullname,$request->txtRoomTypeID)){
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0019);
        }

        $result = $roomTypeDAO->updateRoomType($roomType,$accessory,$count);
        if($result){
            return redirect('/RoomtypeList')->with( Constants::SUCCESS_MSG,Message::MSG0020);
        }else{
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0017);
        }

    }

    public function addRoomTypeRequest(Request $request){

        $roomTypeDAO = new RoomTypeDAO();

        if(!$roomTypeDAO->checkKey($request->txtRoomTypeID)){
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0021);
        }else if(!$roomTypeDAO->checkName($request->txtFullname,$request->txtRoomTypeID)){
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0019);
        } else{

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
                Constants::QUANTITY_ACC => $request->txtquantityAcc,
                Constants::PRICE_ACC => $request-> txtPriceAcc
            );

            for($i=1; $i<$count; $i++){

                $str1 = Constants::NAME_ACC . $i;
                $str2 = Constants::PRICE_ACC .$i ;
                $str3 = Constants::QUANTITY_ACC . $i;
                $accessory += array($str1 => $request->$str1 );
                $accessory += array($str2 => $request->$str2 );
                $accessory += array($str3 => $request->$str3 );
            }

            $result = $roomTypeDAO->addRoomType($roomType,$accessory,$count);

        }

        if ($result){
            return redirect('/RoomtypeList')->with( Constants::SUCCESS_MSG,Message::MSG0022);
        }else{
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0023);
        }
    }
}
