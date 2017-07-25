<?php

/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/2/2017
 * Time: 9:14 PM
 */

namespace App\Http\DAO;
use App\Http\Common\Constants;
use App\Models\RoomType;
use App\Models\Status;
use App\User;
use App\UserGroup;
use App\UserMaster;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;


class K004_DAO{
    /**
     * @param $fname
     * @param $idCard
     * @param $status
     * @return mixed
     */
    public function selectReservation($fname, $idCard, $status){
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

//        $strSQL= "Select * From tbl_status Where status_type = 'RS'";
//
//        $result = DB::select(DB::raw($strSQL));
//
//        return $result;

        $result = Status::where(Constants::TBL_STATUS_TYPE,'=','RS')->get([
            Constants::TBL_STATUS_ID,
            Constants::TBL_STATUS_NAME,
            Constants::TBL_STATUS_ID
        ]);

        return $result->toArray();
    }

    public function getGuestData($res_id){
        $strSQL = 'SELECT ';
        $strSQL .= 'r.id, ';
        $strSQL .= 'r.check_in, ';
        $strSQL .= 'r.check_out, ';
        $strSQL .= 'r.number_of_room, ';
        $strSQL .= 'r.number_of_adult, ';
        $strSQL .= 'rs.status_name, ';
        $strSQL .= 'rs.status_id, ';
        $strSQL .= 'g.id "guest_id", ';
        $strSQL .= 'g.name, ';
        $strSQL .= 'g.phone, ';
        $strSQL .= 'g.mail, ';
        $strSQL .= 'g.identity_card, ';
        $strSQL .= 'g.company, ';
        $strSQL .= 'g.address, ';
        $strSQL .= 'g.company_phone, ';
        $strSQL .= 'g.country ';

        $strSQL .= 'FROM tbl_guest g left join tbl_reservation r ON g.id = r.guest_id ';
        $strSQL .= 'join tbl_status rs on r.status_id = rs.status_id ';
        $strSQL .= 'WHERE r.id = ' . $res_id;
        $result = DB::select(DB::raw($strSQL));

        return $result;
    }

    public function loadRoomType($res_id){
        $strSQL = 'SELECT ';
        $strSQL .='rd.reservation_id, rt.type_name, COUNT(rt.room_type_id) "count", ';
        $strSQL .='sum (rt.price) "price", ';
        $strSQL .='string_agg(ro.room_number, \', \') "list_room" ';
        $strSQL .= 'from tbl_reservation_detail rd ';
        $strSQL .='JOIN tbl_room ro ON rd.room_id = ro.room_id ';
        $strSQL .='JOIN tbl_room_type rt ON ro.room_type_id = rt.room_type_id ';
        $strSQL .='WHERE rd.reservation_id = \'' . $res_id . '\'' ;
        $strSQL .=' GROUP BY rd.reservation_id, rt.type_name  ';
        //dd($strSQL);
        $result = DB::select(DB::raw($strSQL));
        return $result;
    }

    public function loadRoomNumber($res_id){
        $strSQL = 'select ';
        $strSQL .='ro.room_number from tbl_reservation_detail rd ';
        $strSQL .='join tbl_room ro on rd.room_id = ro.room_id ';
        $strSQL .='join tbl_room_type rt on ro.room_type_id = rt.room_type_id ';
        $strSQL .='where rd.reservation_id = \'' . $res_id . '\'' ;
        $result = DB::select(DB::raw($strSQL));
        return $result;
    }
    public function getReservationDetail($res_id){
        $strSQL = 'SELECT ';
	    $strSQL .= 'r.id, ';
        $strSQL .= 'ro.room_id, ';
        $strSQL .= 'ro.room_number, ';
        $strSQL .= 'rt.type_name, ';
        $strSQL .= 'rt.price, ';
        $strSQL .= 's.status_name ';

        $strSQL .='FROM  tbl_reservation r left join tbl_status s ';
        $strSQL .='ON r.status_id = s.status_id left join tbl_reservation_detail rd ';
        $strSQL .='ON r.id = rd.reservation_ID left join tbl_room ro ';
        $strSQL .='ON rd.room_id = ro.room_id left join tbl_room_type rt ';
        $strSQL .= 'ON ro.room_type_id = rt.room_type_id ';

        $strSQL .='WHERE r.id = ' . $res_id;
        //$sqlStr .= strcmp($lname,"") == 0 ? "":' AND ' . $t2;

        $result = DB::select(DB::raw($strSQL));

        return $result;
    }

    public function updateGuest($guest_id,$fullname,$address,$idcard,$country,$phonetxt,$company,$email){
        $strSQL  = 'UPDATE public.tbl_guest ';
	    $strSQL .= 'SET name= \'' . $fullname . '\', ';
        $strSQL .= 'phone= \'' . $phonetxt . '\', ';
        $strSQL .= 'mail= \'' . $email .'\', ';
        $strSQL .= 'identity_card= \''. $idcard . '\', ';
        $strSQL .= 'company= \'' . $company . '\', ';
        $strSQL .= 'address= \'' . $address .'\', ';
        $strSQL .= 'country= \'' . $country .'\' ';
	    $strSQL .= 'WHERE id = \'' . $guest_id . '\'';

        DB::select(DB::raw($strSQL));
    }

    public function updateReservation($res_id,$check_in,$check_out,$numpeople,$noroom,$status){
        $strSQL  = 'UPDATE public.tbl_reservation ';
        $strSQL .= 'SET status_id= \'' .$status . '\', ';
        $strSQL .='check_in= \'' .$check_in. '\', ';
        $strSQL .='check_out= \'' . $check_out . '\', ';
        $strSQL .='number_of_room= \'' . $noroom .'\', ';
        $strSQL .='number_of_adult= \'' .$numpeople . '\', ';
        $strSQL .='update_ymd = CURRENT_TIMESTAMP(0) ';
        $strSQL .= 'WHERE id = \'' . $res_id . '\'' ;

        DB::select(DB::raw($strSQL));
        return 1;
    }

    public function selectRoomFree($res_id,$type_name,$check_in,$check_out){
        $strSQL = 'select ro.room_id, ro.room_number, rt.room_type_id , rt.type_name from ';
        $strSQL .='tbl_room ro join tbl_room_type rt ';
        $strSQL .='ON ro.room_type_id = rt.room_type_id ';
        $strSQL .='where UPPER(rt.type_name) = \'' . strtoupper(trim($type_name)) . '\'';
        $strSQL .=' AND NOT ro.room_id IN (select rd.room_id from ';
        $strSQL .='tbl_reservation r join tbl_reservation_detail rd ON ';
        $strSQL .='r.id = rd.reservation_id where  r.id <> \'' . $res_id . '\' AND ';
        $strSQL .= '((r.check_in BETWEEN \'' . $check_in . '\' AND \'' .$check_out. '\') ';
        $strSQL .='OR (r.check_out BETWEEN \'' .$check_in. '\' AND \'' .$check_out .'\'))) ';

        $result = DB::select(DB::raw($strSQL));

        return $result;

    }

    public function  selectRoomOfReservation($res_id){
        $strSQL= 'select room_id, id from tbl_reservation_detail where reservation_id = '  . $res_id;
        $result = DB::select(DB::raw($strSQL));
        return $result;
    }

    public function updateRoomNumber($detail_id, $room_id, $count){
        $a = 0;
        for ($i = 0; $i < $count; $i++) {
            $strSQL = 'UPDATE public.tbl_reservation_detail ';
            $strSQL .= 'SET room_id=\'' . $room_id[$i] . '\' ';
            $strSQL .= 'WHERE id = \''. $detail_id[$i] .'\'';
            $result = DB::select(DB::raw($strSQL));
            $a += 1;
        }

        return $a;
    }

    //K004_4
    public function getRoomType(){
        $result = RoomType::get([
            Constants::TBL_ROOM_TYPE_ID,
            Constants::TBL_TYPE_NAME,
        ]);
        return $result->toArray();
    }

    public function getRoomFree($check_in,$check_out){
        $strSQL = 'select ro.room_id, ro.room_number, rt.room_type_id , rt.type_name from ';
        $strSQL .='tbl_room ro join tbl_room_type rt ';
        $strSQL .='ON ro.room_type_id = rt.room_type_id ';
        $strSQL .='where ro.room_type_id <> \'RO04\' AND ';
        $strSQL .=' NOT ro.room_id IN (select rd.room_id from ';
        $strSQL .='tbl_reservation r join tbl_reservation_detail rd ON ';
        $strSQL .='r.id = rd.reservation_id where  ';
        $strSQL .= '((r.check_in BETWEEN \'' . $check_in . '\' AND \'' .$check_out. '\') ';
        $strSQL .='OR (r.check_out BETWEEN \'' .$check_in. '\' AND \'' .$check_out .'\'))) ';
        $strSQL .='ORDER BY ro.room_number ASC';

        $result = DB::select(DB::raw($strSQL));

        return $result;
    }
}