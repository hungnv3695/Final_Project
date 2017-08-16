<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/19/2017
 * Time: 10:26 PM
 */

namespace App\Http\DAO;


use App\Models\Guest;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Mockery\Exception;

class CheckInOutDAO
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
            "	AND CAST(r.check_out AS date) >= '".$today."'                                                                                                            " .
            " AND rs.check_in_flag = '0' " ;

        if($identity != null){
            $query .= "AND (g.identity_card ilike '%".$identity."%' OR rs.customer_identity_card ilike '%".$identity."%' )";
        }
        $query .=    "	order by CAST(r.check_in AS date), g.name, rs.customer_name ";

        $result = DB::select($query);
        return $result;
    }

    public function getCheckOutInfo($room, $name = null){
        $today = date("Y/m/d");
        $query = " select iv.id as invoice_id, rs.id,rs.reservation_id, ro.room_number , rs.customer_name, customer_identity_card , CAST(rs.date_in as date) , Cast( rs.date_out as date), ".
            "	CASE                                                                                                                     ".
            "		When rs.check_out_flag = 1 Then 'Đã trả phòng'                                                                       ".
            "		ELSE 'Đang sử dụng'                                                                                                  ".
            "	END AS Status                                                                                                            ".
            "	from tbl_reservation r                                                                                                   ".
            "		inner join tbl_reservation_detail rs                                                                                 ".
            "			on r.id = rs.reservation_id                                                                                      ".
            "		inner join tbl_room ro                                                                                               ".
            "			on ro.room_id = rs.room_id                                                                                       ".
            "       inner join tbl_invoice iv                                                                                            ".
            "           on r.id = iv.reservation_id                                                                                      ".
            "	where (CAST(rs.date_in as Date) <= '".$today."' AND '".$today."' <=  CAST(rs.date_out as Date) )                         ".
            "	AND rs.check_in_flag = '1' AND rs.check_out_flag <> '1' AND                                                                                           ";

        if($room!=null){
            $query .= " ro.room_number = '".$room."' " ;
        }else{
            $query .= " rs.customer_name ilike '%".$name."%' " ;
        }

        $query .=   "order by rs.reservation_id      ";


        $result = DB::select($query);
        return $result;
    }

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
       $strSQL .= 'where ro.status_id = \'RO01\' AND ';
       $strSQL .= 'ro.room_id NOT IN ( select rd.room_id from tbl_reservation_detail rd left join tbl_reservation r on rd.reservation_id = r.id where ';
       $strSQL .= '((rd.date_in >= \''.$check_in.'\' AND rd.date_in <= \''.$check_out.'\') OR (rd.date_out >= \''.$check_in.'\' AND rd.date_out <= \''.$check_out.'\') ';
       $strSQL .= 'OR (rd.date_in < \'' .$check_in. '\' AND rd.date_out > \'' .$check_out. '\')) AND NOT (rd.check_in_flag = \'1\' AND rd.check_out_flag = \'1\')) ';
       $strSQL .= 'GROUP BY rt.room_type_id, rt.type_name, rt.price';

        $result = DB::select($strSQL);
        return $result;

    }

    /**
     * @param Guest $guest
     * @param Reservation $res
     * @param Room $room
     * @param ReservationDetail $res_detail
     * @return int
     */
    public function createNewCheckin(Guest $guest, Reservation $res, Room $room, ReservationDetail $res_detail,
                                     Invoice $invoice, InvoiceDetail $invoiceDetail){


        $resInsert = new Reservation();
        $guestInsert = new Guest();
        $roomUpdate = new Room();
        $resDetailInsert = new ReservationDetail();
        $invoiceInsert = new Invoice();
        $invoiceDetailInsert = new InvoiceDetail();


        DB::beginTransaction();
        try{



            $guestInsert->name = $guest->getName();
            $guestInsert->identity_card = $guest->getIdentityCard();
            $guestInsert->phone = $guest->getPhone();
            $guestInsert->mail = $guest->getMail();
            $guestInsert->create_ymd = Carbon::now();
            //Insert new Guest to Database

            $guestInsert->save();

            $resInsert->check_in = $res->getCheckIn();
            $resInsert->check_out = $res->getCheckOut();
            $resInsert->number_of_adult = $res->getNumberOfAdult();
            $resInsert->number_of_room = $res->getNumberOfRoom();
            $resInsert->status_id = $res->getStatusId();
            $resInsert->create_ymd = $res->getCreateYmd();
            $resInsert->number_of_children = $res->getNumberOfChildren();
            $resInsert->editer = $res->getEditer();
            $resInsert->note = $res->getNote();
            $resInsert->guest_id = $guestInsert->id;

            //insert new reservation
            $resInsert->save();

            $res_detail->setReservationId($resInsert->id);
            $resDetailInsert->reservation_id = $res_detail->getReservationId();
            $resDetailInsert->room_id = $res_detail->getRoomId();
            $resDetailInsert->create_ymd = $res_detail->getCreateYmd();
            $resDetailInsert->date_in = $res_detail->getDateIn();
            $resDetailInsert->date_out = $res_detail->getDateOut();
            $resDetailInsert->customer_name = $res_detail->getCustomerName();
            $resDetailInsert->customer_identity_card = $res_detail->getCustomerIC();
            $resDetailInsert->customer_phone = $res_detail->getCustomerPhone();
            $resDetailInsert->customer_email = $res_detail->getCustomerPhone();
            $resDetailInsert->check_in_flag = $res_detail->getCheckInFlag();
            $resDetailInsert->note = $res_detail->getNote();



            //Insert reservation detail
            $resDetailInsert->save();

            $roomUpdate = Room::find($room->getRoomID());
            $roomUpdate->status_id = $room->getStatusID();

            $roomUpdate->save();


            $invoiceInsert->reservation_id = $resInsert->id;
            $invoiceInsert->guest_id = $guestInsert->id;
            $invoiceInsert->creater_nm = $invoice->getCreaterName();
            $invoiceInsert->create_ymd = $invoice->getCreateYmd();

            $invoiceInsert->save();


            $invoiceDetailInsert->invoice_id = $invoiceInsert->id;
            $invoiceDetailInsert->item_id = $invoiceDetail->getItemId();
            $invoiceDetailInsert->item_type = $invoiceDetail->getItemType();
            $invoiceDetailInsert->quantity = $invoiceDetail->getQuantity();
            $invoiceDetailInsert->price = $invoiceDetail->getPrice();
            $invoiceDetailInsert->amount_total = $invoiceDetail->getAmountTotal();
            $invoiceDetailInsert->room_id = $invoiceDetail->getRoomId();
            $invoiceDetailInsert->payment_flag = $invoiceDetail->getPaymentFlag();
            $invoiceDetailInsert->create_ymd = $invoiceDetail->getCreateYmd();
            $invoiceDetailInsert->creater_nm = $invoiceDetail->getCreaterName();

            $invoiceDetailInsert->save();


            DB::commit();
            return 1;

        }catch(\Exception $e){
            DB::Rollback();
            dd($e);
            return 0;
        }

    }
    public  function checkInReservation( Room $room, ReservationDetail $res_detail, $res_id, $room_id){

        $resDetailInsert = new ReservationDetail();
        $res = new Reservation();

        DB::beginTransaction();
        try{

            $resDetailInsert::where('reservation_id', '=' ,$res_id )->where('room_id', '=' , $room_id)
                ->update([
                    'customer_name' => $res_detail->getCustomerName(),

                    'customer_identity_card' => $res_detail->getCustomerIC(),

                    'customer_phone' => $res_detail->getCustomerPhone(),

                    'customer_email' => $res_detail->getCustomerEmail(),

                    'note' => $res_detail->getNote(),

                    'update_ymd' => $res_detail->getUpdateYmd(),

                    'date_in' => $res_detail->getDateIn(),

                    'date_out' => $res_detail->getDateOut(),

                    'check_in_flag' => $res_detail->getCheckInFlag()
                ]);


            $roomUpdate = Room::find($room->getRoomID());
            $roomUpdate->status_id = $room->getStatusID();
            $roomUpdate->save();

            $res::where('id','=',$res_id)
                ->update([
                    'status_id' => 'RS05'
                ]);



            DB::commit();
            return 1;
        }catch(\Exception $e){
            DB::Rollback();
            return 0;
        }
    }
    public function selectResDetailInfor($res_id, $room_id){

        $strSQL = 'select g.name, g.identity_card, g.phone, g.mail ,r.check_in, r.check_out, r.note ,ro.room_id, ro.room_number, rt.type_name, rt.room_type_id, rt.price, r.number_of_adult, ' ;
        $strSQL .= 'rd.customer_name, rd.customer_identity_card, rd.customer_phone, rd.customer_email, rd.note "note2" ';
        $strSQL .= 'from tbl_reservation_detail rd ';
        $strSQL .= 'left join tbl_reservation r on rd.reservation_id = r.id ';
        $strSQL .= 'left join tbl_guest g on r.guest_id = g.id ';
        $strSQL .= 'left join tbl_room ro on rd.room_id = ro.room_id ';
        $strSQL .= 'left join tbl_room_type rt on ro.room_type_id = rt.room_type_id ';
        $strSQL .= 'where rd.reservation_id = \''. $res_id . '\' and rd.room_id = \''. $room_id . '\' ';

        $result = DB::select(DB::raw($strSQL));
        return $result;
    }

    public function updateCustomerInfor(ReservationDetail $res_detail){
        $resDetailInsert = new ReservationDetail();
        $res_id = $res_detail->getReservationId();
        $room_id = $res_detail->getRoomId();
        DB::beginTransaction();

        try{

            $resDetailInsert::where('reservation_id', '=' ,$res_id )->where('room_id', '=' , $room_id)
                ->update([
                    'customer_name' => $res_detail->getCustomerName(),

                    'customer_identity_card' => $res_detail->getCustomerIC(),

                    'customer_phone' => $res_detail->getCustomerPhone(),

                    'customer_email' => $res_detail->getCustomerEmail(),

                    'note' => $res_detail->getNote(),

                    'update_ymd' => $res_detail->getUpdateYmd(),

                ]);

            DB::commit();
            return 1;
        }catch(\Exception $e){
            DB::Rollback();
            return 0;
        }

    }

    public function selectResDetail($resDetail_id){
        $strSQL = 'select ';
        $strSQL .='rd.id, ';
        $strSQL .='rd.date_in, ';
        $strSQL .='rd.date_out, ';
        $strSQL .='rd.customer_name, ';
        $strSQL .='rd.customer_identity_card, ';
        $strSQL .='rd.customer_phone, ';
        $strSQL .='rd.customer_email, ';
        $strSQL .='rd.note "resDetail_note", ';
        $strSQL .='r.id, ';
        $strSQL .='r.note "res_note", ';
        $strSQL .='g.name, ';
        $strSQL .='g.phone, ';
        $strSQL .='g.mail, ';
        $strSQL .='g.identity_card, ';
        $strSQL .='ro.room_number, ';
        $strSQL .='ro.room_id, ';
        $strSQL .='rt.type_name, ';
        $strSQL .='rt.room_type_id, ';
        $strSQL .='id.amount_total "total_res" ';

        $strSQL .='from tbl_reservation_detail rd ';
        $strSQL .='left join tbl_reservation r on rd.reservation_id = r.id ';
        $strSQL .='left join tbl_guest g on r.guest_id = g.id ';
        $strSQL .='left join tbl_room ro on rd.room_id = ro.room_id ';
        $strSQL .='left join tbl_invoice i on r.id = i.reservation_id ';
        $strSQL .='left join tbl_invoice_detail id on i.id = id.invoice_id ';
        $strSQL .='left join tbl_room_type rt on ro.room_type_id = rt.room_type_id ';
        $strSQL .='where rd.id = \'' .$resDetail_id .'\'  ';
        $strSQL .='and id.item_id = rd.room_id';
        //dd($strSQL);
        $result = DB::select(DB::raw($strSQL));
        return $result;
    }

    public function saveCheckoutInfor($room_id, $res_id, $resDetail_id, $user_id){
        DB::beginTransaction();

        try{
            $result = DB::table('tbl_room')
                ->where('room_id', $room_id)
                ->update([
                    'status_id' => 'RO01'
                ]);


            DB::table('tbl_reservation_detail')
                ->where('id', $resDetail_id)
                ->update([
                    'check_in_flag' => 1,
                    'check_out_flag' => 1
                ]);

            DB::table('tbl_invoice_detail')
                ->where('reservation_id', $res_id)
                ->update([
                    'payment_flag' => 1,
                    'updater_nm' => $user_id
                ]);

            DB::commit();
            return 1;
        }catch(\Exception $e){
            DB::rollback();
            return 0;
        }

    }

    function getService($invoice_id, $room_id){
        $result = DB::table('tbl_invoice_detail')
            ->join('tbl_room','tbl_invoice_detail.room_id','=','tbl_room.room_id')
            ->where('tbl_invoice_detail.invoice_id','=',$invoice_id)->where('tbl_invoice_detail.room_id','=',$room_id)->get([
                'tbl_room.room_number',
                'tbl_invoice_detail.item_id',
                'tbl_invoice_detail.quantity',
                'tbl_invoice_detail.price',
                'tbl_invoice_detail.payment_flag'
        ]);
        return  $result->toArray();
    }


}