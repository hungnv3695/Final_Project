<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Viet Hung
 * Date: 8/5/2017
 * Time: 5:02 PM
 */
namespace App\Http\DAO;
use App\Http\Common\Constants;
use App\User;
use App\UserGroup;
use App\Models\RoomType;
use App\UserMaster;
use Illuminate\Support\Facades\DB;
class BookOnlineDAO {
    public function getRoomTypeFree($check_in, $check_out){

        $strSQL =   'select rt.room_type_id, rt.type_name, rt.price, count(rt.type_name) "Count", string_agg(ro.room_number,\' \') "list_room", string_agg(ro.room_id,\' \') "list_room_id" from tbl_room ro ';
        $strSQL .= 'join tbl_room_type rt on ro.room_type_id = rt.room_type_id ';
        $strSQL .= 'where ro.status_id <> \'RO04\' AND ';
        $strSQL .= 'ro.room_id NOT IN ( select rd.room_id from tbl_reservation_detail rd left join tbl_reservation r on rd.reservation_id = r.id where ';
        $strSQL .= '((rd.date_in >= \''.$check_in.'\' AND rd.date_in <= \''.$check_out.'\') OR (rd.date_out >= \''.$check_in.'\' AND rd.date_out <= \''.$check_out.'\') ';
        $strSQL .= 'OR (rd.date_in < \'' .$check_in. '\' AND rd.date_out > \'' .$check_out. '\')) AND NOT (rd.check_in_flag = \'1\' AND rd.check_out_flag = \'1\')) ';
        $strSQL .= 'GROUP BY rt.room_type_id, rt.type_name, rt.price';

        $result = DB::select($strSQL);
        return $result;
    }

    public function getRoomTypeInfor(){
        $result = RoomType::get([
            Constants::TBL_ROOM_TYPE_ID,
            Constants::TBL_TYPE_NAME,
            Constants::TBL_ADULT,
            Constants::TBL_CHILDREN,
            Constants::TBL_DESCRIPTION,
            Constants::TBL_IMAGE_URL,
            Constants::TBL_PRICE
        ]);
        return $result->toArray();
    }
}