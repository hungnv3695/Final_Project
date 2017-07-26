<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/14/2017
 * Time: 9:47 PM
 */

namespace App\Http\DAO;


use App\Http\Common\Constants;
use App\Models\Accessory;
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

    public function checkName($roomTypeName,$roomTypeID){
        $result = RoomType::where(Constants::TBL_TYPE_NAME ,$roomTypeName)
            ->where(Constants::TBL_ROOM_TYPE_ID ,$roomTypeID)
            ->count();

        if($result == 0){
            $result = RoomType::where(Constants::TBL_TYPE_NAME ,$roomTypeName)->count();

            if($result!=0){
                return false;
            }else{
                return true;
            }

        } else{
            return true;
        }
    }

    public function addRoomType(RoomType $roomType,$accessory,$count){
       $roomTypeAdd = new RoomType();
       $roomTypeAdd->room_type_id = $roomType->getRoomTypeID();
       $roomTypeAdd->type_name = $roomType->getName();
       $roomTypeAdd->adult = $roomType->getAdult();
       $roomTypeAdd->children = $roomType->getChildren();
       $roomTypeAdd->description = $roomType->getDescription();
       $roomTypeAdd->price = $roomType->getPrice();


        $result = $roomTypeAdd->saveOrFail();

           //Them Accessory
        $result = $this->addAccessory($roomType->getRoomTypeID(),$accessory,$count);

        return $result;

    }

    public function updateRoomType(RoomType $roomType,$accessory,$count){
        $roomTypeUpdate = RoomType::find($roomType->getRoomTypeID());
        $roomTypeUpdate->room_type_id = $roomType->getRoomTypeID();
        $roomTypeUpdate->type_name = $roomType->getName();
        $roomTypeUpdate->adult = $roomType->getAdult();
        $roomTypeUpdate->children = $roomType->getChildren();
        $roomTypeUpdate->description = $roomType->getDescription();
        $roomTypeUpdate->price = $roomType->getPrice();

        $result = $roomTypeUpdate->saveOrFail();
        if($result == false){
            return false;
        }

        //Them Accessory
        $result = $this->updateAccessory($roomType->getRoomTypeID(),$accessory,$count);

        return $result;
    }

    public function  updateAccessory($roomTypeID , $accessory , $count){
           Accessory::where(Constants::TBL_ROOM_TYPE_ID,$roomTypeID)->delete();
           $result = $this->addAccessory($roomTypeID,$accessory,$count);
           return $result;
    }

    public function addAccessory($roomTypeID,$accessory,$count){


            $accessoryAdd = new Accessory();

            $accessoryAdd->room_type_id = $roomTypeID;
            $accessoryAdd->accessory_name =  array_get($accessory,Constants::NAME_ACC);
            $accessoryAdd->quanlity = array_get($accessory,Constants::QUANLITY_ACC);
            $accessoryAdd->price = array_get($accessory,Constants::PRICE_ACC);

            $result = $accessoryAdd->saveOrFail();

            for($i = 1 ; $i< $count ; $i++){

                $accessoryAdd = new Accessory();
                $accessoryAdd->room_type_id = $roomTypeID;
                $accessoryAdd->accessory_name =  array_get($accessory,Constants::NAME_ACC . $i);
                $accessoryAdd->quanlity = array_get($accessory,Constants::QUANLITY_ACC . $i );
                $accessoryAdd->price = array_get($accessory,Constants::PRICE_ACC . $i );

                $result =  $accessoryAdd->saveOrFail();

            }

        return $result;
    }

    public function getRoomType(){
        $result = RoomType::orderBy(Constants::TBL_TYPE_NAME)
            ->get([
                Constants::TBL_ROOM_TYPE_ID,
                Constants::TBL_TYPE_NAME
            ]);

        return $result->toArray();
    }


    public function getRoomTypeValue($roomTypeID){
        $result = RoomType::where(Constants::TBL_ROOM_TYPE_ID,$roomTypeID)
            ->get([
                Constants::TBL_ROOM_TYPE_ID,
                Constants::TBL_TYPE_NAME,
                Constants::TBL_DESCRIPTION,
                Constants::TBL_PRICE,
                Constants::TBL_ADULT,
                Constants::TBL_CHILDREN
            ]);

        return $result->toArray();
    }

    public function getAccessoryDetail($roomTypeID){
        $result = Accessory::where(Constants::TBL_ROOM_TYPE_ID,$roomTypeID)
            ->orderBy( Constants::TBL_ACCESSORY_NAME)
            ->get([
                Constants::TBL_ACCESSORY_NAME,
                Constants::TBL_QUANLITY,
                Constants::TBL_PRICE
            ]);

        return $result->toArray();
    }
}