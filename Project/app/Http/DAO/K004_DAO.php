<?php

/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/2/2017
 * Time: 9:14 PM
 */

namespace App\Http\DAO;
use App\Http\Common\Constants;
use App\User;
use App\UserGroup;
use App\UserMaster;
use Illuminate\Support\Facades\DB;

class K004_DAO{
    public function selectReservation($fname,$idCard,$status){
        $t1 = 'UPPER(g.name) LIKE \'%' . mb_strtoupper(trim($fname)) . '%\'';
        $t2 = 'UPPER(g.identity_card) LIKE \'%' . strtoupper(trim($idCard)) . '%\'';
        $t3 = 's.status_id = \'' . trim($status). '\'' ;
        $strSQL = 'SELECT ';
        $strSQL .=  'r.id, ';
        $strSQL .=  'r.number_of_room, ';
        $strSQL .=  'r.check_in, ';
        $strSQL .=  'r.check_out, ';
        $strSQL .=  'g.name,  ';
        $strSQL .=  'g.mail, ';
        $strSQL .=  'g.phone, ';
        $strSQL .=  'g.identity_card, ';
        $strSQL .=  'g.company, ';
        $strSQL .=  's.status_name ';


        $strSQL .= 'FROM tbl_guest g join tbl_reservation r ' ;
        $strSQL .= 'ON g.id = r.guest_id join tbl_status s ';
        $strSQL .= 'ON r.status_id = s.status_id join tbl_reservation_detail rd ';
        $strSQL .= 'ON r.id = rd.reservation_ID ';
        $strSQL .= 'WHERE s.status_type = \'RS\' ';

        $strSQL .= strcmp($fname, "") == 0 ? "" : 'AND '. $t1 . ' ';
        $strSQL .= strcmp($idCard, "") == 0 ? "" : 'AND '. $t2 . ' ';
        $strSQL .= strcmp($status, "") == 0 ? "" : 'AND '. $t3 . ' ';

        $strSQL .= ' GROUP BY g.id, r.id, g.name, s.status_name, s.status_id ORDER BY r.id DESC';
        
        //$sqlStr .= strcmp($lname,"") == 0 ? "":' AND ' . $t2;

        $result = DB::select(DB::raw($strSQL));

        return $result;
    }

    public function getStatus(){

        $strSQL= "Select * From tbl_status Where status_type = 'RS'";

        $result = DB::select(DB::raw($strSQL));

        return $result;
    }

    public function GetGuestData($res_id){
        $strSQL = 'SELECT ';
        $strSQL .= 'r.id, ';
        $strSQL .= 'r.check_in, ';
        $strSQL .= 'r.check_out, ';
        $strSQL .= 'r.number_of_room, ';
        $strSQL .= 'g.name, ';
        $strSQL .= 'g.phone, ';
        $strSQL .= 'g.mail, ';
        $strSQL .= 'g.identity_card, ';
        $strSQL .= 'g.company, ';
        $strSQL .= 'g.address, ';
        $strSQL .= 'g.company_phone, ';
        $strSQL .= 'g.country ';
        $strSQL .= 'FROM tbl_guest g left join tbl_reservation r ON g.id = r.guest_id ';
        $strSQL .= 'WHERE r.id = ' . $res_id;
        $result = DB::select(DB::raw($strSQL));

        return $result;
}
    public function GetReservationDetail($res_id){
        $strSQL = 'SELECT ';
	    $strSQL .= 'r.id, ';
        $strSQL .= 'ro.room_id, ';
        $strSQL .= 'ro.room_number, ';
        $strSQL .= 'rt.type_name, ';
        $strSQL .= 'rt.price ';

        $strSQL .='FROM  tbl_reservation r left join tbl_status s ';
        $strSQL .='ON r.status_id = s.status_id left join tbl_reservation_detail rd ';
        $strSQL .='ON r.id = rd.reservation_ID left join tbl_room ro ';
        $strSQL .='ON rd.room_id = ro.room_id left join tbl_room_type rt ';
        $strSQL .='ON ro.room_type_id = rt.room_type_id ';

        $strSQL .='WHERE r.id = ' . $res_id;
        //$sqlStr .= strcmp($lname,"") == 0 ? "":' AND ' . $t2;

        $result = DB::select(DB::raw($strSQL));

        return $result;
    }

    public function SelectRoomFree($type_name,$check_in,$check_out){
        $strSQL = 'select ro.room_number,rt.room_type_id ,rt.price from ';
        $strSQL .='tbl_room ro join tbl_room_type rt ';
        $strSQL .='ON ro.room_type_id = rt.room_type_id ';
        $strSQL .='where rt.type_name = \'' .$type_name. '\' AND NOT ro.room_id IN (select rd.room_id from ';
        $strSQL .='tbl_reservation r join tbl_reservation_detail rd ON ';
        $strSQL .='r.id = rd.reservation_id where  (r.check_in BETWEEN \''.$check_in.'\' AND \'' .$check_out. '\') ';
        $strSQL .='OR (r.check_out BETWEEN \'' .$check_in. '\' AND \'' .$check_out .'\')) ';
        dd($strSQL);
    }
}