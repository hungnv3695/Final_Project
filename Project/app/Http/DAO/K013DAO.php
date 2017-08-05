<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/3/2017
 * Time: 4:36 PM
 */

namespace App\Http\DAO;


use Illuminate\Support\Facades\DB;

class K013DAO
{
    public function getCheckInInfo($name, $identity = null){
        $today = date("Y/m/d");
        $query = "	WITH status AS(                                                                                                                                          ".
            "		WITH MyTable AS (                                                                                                                                    ".
            "			SELECT  ro.room_number , ro.status_id, mytb.date_in,mytb.date_out,mytb.check_out_flag,                                                           ".
            "				CASE                                                                                                                                         ".
            "					WHEN ro.status_id = 'RO04' THEN 3                                                                                                        ".
            "					WHEN ('".$today."' >  CAST(mytb.date_in AS date) AND CAST(mytb.date_out AS date) >= '".$today."' AND mytb.check_out_flag <> 1  ) THEN 2  ".
            "					WHEN ro.status_id = 'RO03' THEN 1                                                                                                        ".
            "					ELSE 0                                                                                                                                   ".
            "				END AS Status                                                                                                                                ".
            "		FROM tbl_room AS ro                                                                                                                                  ".
            "			LEFT OUTER JOIN(                                                                                                                                 ".
            "				SELECT rd.room_id, rd.date_in, rd.date_out, rd.check_out_flag FROM tbl_reservation_detail AS rd                                              ".
            "					INNER JOIN tbl_reservation AS r                                                                                                          ".
            "					ON rd.reservation_id = r.id ) AS mytb                                                                                                    ".
            "	ON ro.room_id = mytb.room_id                                                                                                                             ".
            "	GROUP BY ro.room_number,ro.status_id, mytb.date_in,mytb.date_out,mytb.check_out_flag                                                                     ".
            "	ORDER BY ro.room_number, mytb.date_in)                                                                                                                   ".
            "					                                                                                                                                         ".
            "	SELECT  room_number , MAX(status)                                                                                                                        ".
            "	FROM MyTable                                                                                                                                             ".
            "	GROUP BY room_number                                                                                                                                     ".
            "	ORDER BY room_number                                                                                                                                     ".
            "	)                                                                                                                                                        ".
            "	SELECT ro.room_id, r.id, g.name, g.identity_card, rs.customer_name, rs.customer_identity_card ,CAST(r.check_in AS date),CAST(r.check_out AS date) ,  ro.room_number ,     ".
            "	CASE                                                                                                                                                     ".
            "		when st.max = '3' then 'Đang sửa chữa'                                                                                                               ".
            "		when st.max = '2' then 'Đang sử dụng'                                                                                                                ".
            "		when st.max = '1' then 'Đang dọn dẹp'                                                                                                                ".
            "		else 'Phòng Trống'                                                                                                                                   ".
            "	END AS Status                                                                                                                                            ".
            "	FROM tbl_guest as g                                                                                                                                      ".
            "		inner join tbl_reservation as r                                                                                                                      ".
            "			on g.id = r.guest_id                                                                                                                             ".
            "		inner join tbl_reservation_detail as rs                                                                                                              ".
            "			on r.id = rs.reservation_id                                                                                                                      ".
            "		inner join tbl_room as ro                                                                                                                            ".
            "			on ro.room_id = rs.room_id                                                                                                                       ".
            "		inner join status as st                                                                                                                              ".
            "			on st.room_number = ro.room_number                                                                                                               ".
            "	WHERE (g.name ILIKE '%".$name."%' OR rs.customer_name ILIKE '%".$name."%')                                                                                           ".
            "	AND CAST(r.check_out AS date) >= '".$today."'                                                                                                            ";

        if($identity != null){
            $query .= "AND (g.identity_card ilike '%".$identity."%' OR rs.customer_identity_card ilike '%".$identity."%' )";
        }
        $query .=    "	order by g.name, rs.customer_name ";

        $result = DB::select($query);
        return $result;
    }
}