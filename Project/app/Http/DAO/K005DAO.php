<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:26 PM
 */

namespace App\Http\DAO;
use App\Http\Common\Constants;
use App\Models\Accessory;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

define('ROOM_STATUS','RO');

class K005DAO
{
    public function getRoom($searchStr = null){

        if ( $searchStr == null ){
            $result = DB::table('tbl_room_type')
                ->join('tbl_room', 'tbl_room_type.room_type_id', '=','tbl_room.room_type_id')
                ->join('tbl_status', 'tbl_room.status_id', '=','tbl_status.status_id')
                ->get([
                    'tbl_room.room_id',
                    'tbl_room.room_number',
                    'tbl_room_type.type_name' ,
                    'tbl_room.floor',
                    'tbl_room_type.price',
                    'tbl_room_type.description',
                    'tbl_status.status_name'
                ]);
        } else{
            $result = DB::table('tbl_room_type')
                ->join('tbl_room', 'tbl_room_type.room_type_id', '=','tbl_room.room_type_id')
                ->join('tbl_status', 'tbl_room.status_id', '=','tbl_status.status_id')
                ->where('tbl_room.room_number','like','%' . $searchStr . '%' )
                ->orWhere('tbl_room_type.type_name','like','%' . $searchStr . '%' )
                ->distinct()
                ->get([
                    'tbl_room.room_id',
                    'tbl_room.room_number',
                    'tbl_room_type.type_name' ,
                    'tbl_room.floor',
                    'tbl_room_type.price',
                    'tbl_room_type.description',
                    'tbl_status.status_name'
                ]);
        }


        return  $result->toArray();
    }


    public function getRoomDetail($roomID){
        $result = DB::table('tbl_room_type')
            ->join('tbl_room', 'tbl_room_type.room_type_id', '=','tbl_room.room_type_id')
            ->join('tbl_status', 'tbl_room.status_id', '=','tbl_status.status_id')
            ->where('tbl_room.room_id',$roomID)
                ->get([
                    'tbl_room.room_id',
                    'tbl_room.room_number',
                    'tbl_room_type.type_name' ,
                    'tbl_room.floor',
                    'tbl_room_type.price',
                    'tbl_room_type.description',
                    'tbl_status.status_name'
            ]);

        return  $result->toArray();
    }

    public function getAccessoryDetail($roomID){
        $result = Accessory::where(Constants::TBL_ROOM_ID,$roomID)
            ->orderBy( Constants::TBL_ACCESSORY_NAME)
            ->get([
                Constants::TBL_ACCESSORY_NAME,
                Constants::TBL_QUANLITY
            ]);

        return $result->toArray();
    }

    public function getStatus(){

        $result = Status::where(Constants::TBL_STATUS_TYPE,ROOM_STATUS)
            ->get([
                Constants::TBL_STATUS_ID,
                Constants::TBL_STATUS_NAME
            ]);

        return $result->toArray();
    }

    public function getRoomType(){
        $result = RoomType::get([
           Constants::TBL_ROOM_TYPE_ID,
           Constants::TBL_TYPE_NAME,
                Constants::TBL_DESCRIPTION,
        Constants::TBL_PRICE
        ]);

        return $result->toArray();
    }

    public function  UpdateRoom(Room $room,$accessory){

        $roomUpdate = Room::find($room->getRoomID());

        $roomUpdate->room_id = $room->getRoomID();
        $roomUpdate->room_type_id  = $room->getRoomTypeId();
        $roomUpdate->floor = $room->getFloor();
        $roomUpdate->status_id = $room->getStatusId();
        $roomUpdate->room_number = $room->getRoomNumber();

        $result = $roomUpdate->save();

        $result = $this->UpdateAccessory($accessory,$room->getRoomID());


        return $result;

    }

    public function UpdateAccessory($accessory,$roomID){

        try {
           $result = Accessory::where(Constants::TBL_ROOM_ID,$roomID)
                ->where(Constants::TBL_ACCESSORY_NAME,Constants::ACCESSORY_BAN)
                ->update([
                    Constants::TBL_QUANLITY => array_get($accessory,Constants::ACCESSORY_BAN)
                ]);
           $result = Accessory::where(Constants::TBL_ROOM_ID,$roomID)
                ->where(Constants::TBL_ACCESSORY_NAME,Constants::ACCESSORY_DIEU_HOA)
                ->update([
                    Constants::TBL_QUANLITY => array_get($accessory,Constants::ACCESSORY_DIEU_HOA)
                ]);


            $result = Accessory::where(Constants::TBL_ROOM_ID,$roomID)
                ->where(Constants::TBL_ACCESSORY_NAME,Constants::ACCESSORY_GIUONG)
                ->update([
                    Constants::TBL_QUANLITY => array_get($accessory,Constants::ACCESSORY_GIUONG)
                ]);

            $result = Accessory::where(Constants::TBL_ROOM_ID,$roomID)
                ->where(Constants::TBL_ACCESSORY_NAME,Constants::ACCESSORY_QUAT)
                ->update([
                    Constants::TBL_QUANLITY => array_get($accessory,Constants::ACCESSORY_QUAT)
                ]);

            $result =  Accessory::where(Constants::TBL_ROOM_ID,$roomID)
                ->where(Constants::TBL_ACCESSORY_NAME,Constants::ACCESSORY_TIVI)
                ->update([
                    Constants::TBL_QUANLITY => array_get($accessory,Constants::ACCESSORY_TIVI)
                ]);

            $result = Accessory::where(Constants::TBL_ROOM_ID,$roomID)
                ->where(Constants::TBL_ACCESSORY_NAME,Constants::ACCESSORY_TU_LANH)
                ->update([
                    Constants::TBL_QUANLITY => array_get($accessory,Constants::ACCESSORY_TU_LANH)
                ]);
        } catch (Exception $e) {
            $result = false;
        }

        return $result;
    }

    public function addRoom(Room $room, $accessory){
        $roomAdd = new Room();

        $roomAdd->room_id = $room->getRoomID();
        $roomAdd->room_type_id  = $room->getRoomTypeId();
        $roomAdd->floor = $room->getFloor();
        $roomAdd->status_id = $room->getStatusId();
        $roomAdd->room_number = $room->getRoomNumber();

        $result = $roomAdd->save();

        if($result == false){
            return $result;
        }else{
            $result = $this->addAccessory($accessory,$room->getRoomID());
        }

        return $result;
    }

    public function addAccessory($accessory,$roomID){

        try{

            $accessoryAdd = new Accessory();

            $accessoryAdd->room_id = $roomID;
            $accessoryAdd->accessory_name = Constants::ACCESSORY_BAN;
            $accessoryAdd->quanlity = array_get($accessory,Constants::ACCESSORY_BAN);
            $result = $accessoryAdd->save();

            $accessoryAdd = new Accessory();

            $accessoryAdd->room_id = $roomID;
            $accessoryAdd->accessory_name = Constants::ACCESSORY_DIEU_HOA;
            $accessoryAdd->quanlity = array_get($accessory,Constants::ACCESSORY_DIEU_HOA);
            $result = $accessoryAdd->save();

            $accessoryAdd = new Accessory();

            $accessoryAdd->room_id = $roomID;
            $accessoryAdd->accessory_name = Constants::ACCESSORY_TU_LANH;
            $accessoryAdd->quanlity = array_get($accessory,Constants::ACCESSORY_TU_LANH);
            $result = $accessoryAdd->save();

            $accessoryAdd = new Accessory();

            $accessoryAdd->room_id = $roomID;
            $accessoryAdd->accessory_name = Constants::ACCESSORY_GIUONG;
            $accessoryAdd->quanlity = array_get($accessory,Constants::ACCESSORY_GIUONG);
            $result= $accessoryAdd->save();

            $accessoryAdd = new Accessory();

            $accessoryAdd->room_id = $roomID;
            $accessoryAdd->accessory_name = Constants::ACCESSORY_QUAT;
            $accessoryAdd->quanlity = array_get($accessory,Constants::ACCESSORY_QUAT);
            $result = $accessoryAdd->save();

            $accessoryAdd = new Accessory();
            
            $accessoryAdd->room_id = $roomID;
            $accessoryAdd->accessory_name = Constants::ACCESSORY_TIVI;
            $accessoryAdd->quanlity = array_get($accessory,Constants::ACCESSORY_TIVI);
            $result = $accessoryAdd->save();

        }catch (Exception $e){
            $result = false;
        }


        return $result;
    }

    public function checkRoomKey($roomID){
        $result = Room::where(Constants::TBL_ROOM_ID,$roomID)->count();

        if($result!=0){
            return false;
        }else{
            return true;
        }

    }

}