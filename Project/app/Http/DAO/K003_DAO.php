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

class K003_DAO{
    public function selectReservation($fname,$idCard,$status){

        $t1 = 'UPPER(g.fullname) LIKE \'%' . strtoupper(trim($fname)) . '%\'';
        $t2 = 'UPPER(g.identity_card) LIKE \'%' . strtoupper(trim($idCard)) . '%\'';
        $t3 = 'rs.id = ' . trim($status) ;
        $strSQL = 'SELECT ';
        $strSQL .=  'g.id as "guest_id", ';
        $strSQL .=  'r.id as "res_id", ';
        $strSQL .=  'g.fullname "fullname", ';
        $strSQL .=  'COUNT(r.id) "quantity", ';
        $strSQL .=  'r.checkin, ';
        $strSQL .=  'r.checkout, ';
        $strSQL .=  'g.email, ';
        $strSQL .=  'g.phone, ';
        $strSQL .=  'g.identity_card, ';
        $strSQL .=  'rs.status as "status", ';
        $strSQL .=  'rs.id as "status_id" ';

        $strSQL .= 'FROM tbl_guest g JOIN tbl_reservation r ON g.id = r.guest_id ';
        $strSQL .= 'JOIN reservation_status rs ON rs.id = r.status ';
        $strSQL .= 'JOIN tbl_reservation_detail rd ON r.id = rd.res_id ';
        $strSQL .= 'WHERE NOT r.id = \'0\' ';

        $strSQL .= strcmp($fname, "") == 0 ? "" : 'AND '. $t1 . ' ';
        $strSQL .= strcmp($idCard, "") == 0 ? "" : 'AND '. $t2 . ' ';
        $strSQL .= strcmp($status, "") == 0 ? "" : 'AND '. $t3 . ' ';

        $strSQL .= ' GROUP BY g.id, r.id, g.fullname, rs.status, rs.id';
        
        //$sqlStr .= strcmp($lname,"") == 0 ? "":' AND ' . $t2;

        $result = DB::select(DB::raw($strSQL));

        return $result;
    }

    public function getStatus(){

        $strSQL= "Select * From reservation_status";
        $result = DB::select(DB::raw($strSQL));
        return $result;
    }
}