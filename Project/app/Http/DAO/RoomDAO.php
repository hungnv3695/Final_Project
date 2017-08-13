<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:26 PM
 */

namespace App\Http\DAO;
use App\Http\Common\Constants;
use App\Http\Common\StringUtil;
use App\Models\Accessory;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

define('ROOM_STATUS','RO');

class RoomDAO
{
    public function getRoom($searchStr = null,$searchFloor = null){
        $searchStr =  StringUtil::Trim($searchStr);

        $query = DB::table('tbl_room_type')
            ->join('tbl_room', 'tbl_room_type.room_type_id', '=','tbl_room.room_type_id')
            ->join('tbl_status', 'tbl_room.status_id', '=','tbl_status.status_id');

        // search by search string
        if ($searchStr !=  null){
            $query->where(function ($query) use ($searchStr){
                return $query->where('tbl_room.room_number','like','%' . $searchStr . '%' )
                    ->orwhere('tbl_room_type.type_name','ILIKE','%' . $searchStr . '%' );
            } );
        }

        //search by floor
        if ($searchFloor != null && $searchFloor!= 0){
            //$query->where('tbl_room.floor',$searchFloor );
            $query->where(function ($query) use ($searchFloor){
                return $query->where('tbl_room.floor',$searchFloor );
            } );
        }

        $query->distinct()
            ->orderBy( Constants::TBL_FLOOR)
            ->orderBy( Constants::TBL_ROOM_NUMBER);

        //dd($query);

        $result = $query->get([
            'tbl_room_type.room_type_id',
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

    public function getRoomDetail($roomID){
        $result = DB::table('tbl_room_type')
            ->join('tbl_room', 'tbl_room_type.room_type_id', '=','tbl_room.room_type_id')
            ->join('tbl_status', 'tbl_room.status_id', '=','tbl_status.status_id')
            ->where('tbl_room.room_id',$roomID)
                ->get([
                    'tbl_room.room_id',
                    'tbl_room.room_number',
                    'tbl_room_type.type_name',
                    'tbl_room.floor',
                    'tbl_room.note',
                    'tbl_room_type.price',
                    'tbl_room_type.description',
                    'tbl_status.status_name',
                    'tbl_status.status_id'
            ]);

        return  $result->toArray();
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
                Constants::TBL_QUANTITY,
                Constants::TBL_PRICE
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

    public function  updateRoom(Room $room){

        $roomUpdate = Room::find($room->getRoomID());

        $roomUpdate->room_id = $room->getRoomID();
        $roomUpdate->room_type_id  = $room->getRoomTypeId();
        $roomUpdate->floor = $room->getFloor();
        $roomUpdate->status_id = $room->getStatusId();
        $roomUpdate->room_number = $room->getRoomNumber();
        $roomUpdate->note = $room->getNote();

        $result = $roomUpdate->saveOrFail();

        return $result;
    }

    public function addRoom(Room $room){
        $roomAdd = new Room();

        $roomAdd->room_id = $room->getRoomID();
        $roomAdd->room_type_id  = $room->getRoomTypeId();
        $roomAdd->floor = $room->getFloor();
        $roomAdd->status_id = $room->getStatusId();
        $roomAdd->room_number = $room->getRoomNumber();

        $result = $roomAdd->saveOrFail();

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

    public function checkRoomNumber($roomNo, $roomID){
        $result = Room::where(Constants::TBL_ROOM_NUMBER,$roomNo)
            ->where(Constants::TBL_ROOM_ID,$roomID)
            ->count();

        if($result!=0){
            return true;
        }else{
            $result = Room::where(Constants::TBL_ROOM_NUMBER,$roomNo)->count();

            if($result!=0){
                return false;
            }else{
                return true;
            }
        }


    }

}