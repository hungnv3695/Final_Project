<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:26 PM
 */

namespace App\Http\DAO;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

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
            ->where('tbl_room.room_number',$roomID)
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

    public function  UpdateRoom(Room $room){


    }
}