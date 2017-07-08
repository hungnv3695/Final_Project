<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:26 PM
 */

namespace App\Http\DAO;
use Illuminate\Support\Facades\DB;

class K005DAO
{
    public function getRoom($roomID){
        if ($roomID == null){
            $result = DB::table('tbl_room_type')
                ->join('tbl_room', 'tbl_room_type.room_typeid', '=','tbl_room.room_typeid')
                ->get(['tbl_room.room_id',
                    'tbl_room_type.type_name' ,
                    'tbl_room.floor',
                    'tbl_room_type.price',
                    'tbl_room_type.description',
                    'tbl_room.status'
                ]);
        } else{
            $result = DB::table('tbl_room_type')
                ->join('tbl_room', 'tbl_room_type.room_typeid', '=','tbl_room.room_typeid')
                ->where('tbl_room.room_id',$roomID)
                ->get(['tbl_room.room_id',
                    'tbl_room_type.type_name' ,
                    'tbl_room.floor',
                    'tbl_room_type.price',
                    'tbl_room_type.description',
                    'tbl_room.status'
                ]);
        }

        return  $result->toArray();
    }
}