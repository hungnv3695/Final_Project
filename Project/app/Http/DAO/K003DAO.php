<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/19/2017
 * Time: 10:26 PM
 */

namespace App\Http\DAO;


use Illuminate\Support\Facades\DB;

class K003DAO
{
    public function getRoomStatus($checkIn,$checkOut){
        $strSQL = " WITH MyTable AS (SELECT  ro.room_number , ro.status_id, mytb.check_in,mytb.check_out, " .
 	" CASE ".
 	" WHEN ro.status_id = 'RO03' THEN 3 ".
    " WHEN ('".$checkIn ."' <=  CAST(mytb.check_in AS date) AND CAST(mytb.check_in AS date) <= '".$checkOut."' ) ".
    "	OR '".$checkIn."' <=  CAST(mytb.check_out AS date) AND CAST(mytb.check_out AS date) <= '".$checkOut."' ".
    "	THEN 2 " .
    " WHEN ro.status_id = 'RO04' THEN 1".
    " ELSE 0".
    " END AS Status " .
    " FROM tbl_room AS ro".
 	" LEFT OUTER JOIN(".
    " SELECT rd.room_id, r.check_in, r.check_out FROM tbl_reservation_detail AS rd ".
    " INNER JOIN tbl_reservation AS r " .
    	"ON rd.reservation_id = r.id ) AS mytb  ".
        "ON ro.room_id = mytb.room_id".
    " GROUP BY ro.room_number,ro.status_id, mytb.check_in,mytb.check_out".
    " ORDER BY ro.room_number, mytb.check_in)".
    " SELECT  room_number , MAX(status)  ".
    " FROM MyTable ".
    " GROUP BY room_number".
    " ORDER BY room_number";

    $result = DB::select($strSQL);
    return $result;
    }

    public function getStatusToDay($today){
        $strSQL = "  WITH MyTable AS (SELECT  ro.room_number , ro.status_id, mytb.check_in,mytb.check_out, " .
                " CASE " .
 	            " WHEN ro.status_id = 'RO03' THEN 3 ".
                " WHEN ('".$today."' >=  CAST(mytb.check_in AS date) AND CAST(mytb.check_out AS date) >= '".$today."' ) ".
    	        " THEN 2 ".
                " WHEN ro.status_id = 'RO04' THEN 1 ".
                " ELSE 0 ".
                " END AS Status ".
                " FROM tbl_room AS ro " .
 	            " LEFT OUTER JOIN( " .
                " SELECT rd.room_id, r.check_in, r.check_out FROM tbl_reservation_detail AS rd ".
                " INNER JOIN tbl_reservation AS r " .
    	        " ON rd.reservation_id = r.id ) AS mytb " .
                " ON ro.room_id = mytb.room_id ".
                " GROUP BY ro.room_number,ro.status_id, mytb.check_in,mytb.check_out ".
                " ORDER BY ro.room_number, mytb.check_in) ".
                " SELECT  room_number , MAX(status) ".
                " FROM MyTable ".
                " GROUP BY room_number ".
                " ORDER BY room_number ";

        $result = DB::select($strSQL);
        return $result;
    }

    public function getRoomTypeFree($check_in,$check_out){

        $strSQL =   'select rt.room_type_id, rt.type_name, rt.price, count(rt.type_name) "Count", string_agg(ro.room_number,\' \') "list_room", string_agg(ro.room_id,\' \') "list_room_id" from tbl_room ro ';
       $strSQL .= 'join tbl_room_type rt on ro.room_type_id = rt.room_type_id ';
       $strSQL .= 'where ro.status_id <> \'RO04\' AND ';
       $strSQL .= 'ro.room_id NOT IN ( select rd.room_id from tbl_reservation_detail rd left join tbl_reservation r on rd.reservation_id = r.id where ';
       $strSQL .= '(r.check_in BETWEEN \'' . $check_in . '\' AND \'' . $check_out . '\') OR (r.check_out BETWEEN \'' . $check_in . '\' AND \'' . $check_out . '\')) ';
       $strSQL .= 'GROUP BY rt.room_type_id, rt.type_name, rt.price';

        $result = DB::select($strSQL);
        return $result;

    }

}