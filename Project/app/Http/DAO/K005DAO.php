<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:26 PM
 */

namespace App\Http\DAO;


class K005DAO
{
    public function getRoom(){
        $result = DB::table('tbl_room_type')
            ->join('tbl_room', 'tbl_room_type.room_typeID', '=','tbl_room.room_typeID')
            ->get(['tbl_room.room_id',
                'tbl_room_type.type_name' ,
                'tbl_room.floor',
                'tbl_room_type.price',
                'tbl_room_type.description',
                'tbl_room.status'
            ]);
        
        return  $result->toArray();
    }
}