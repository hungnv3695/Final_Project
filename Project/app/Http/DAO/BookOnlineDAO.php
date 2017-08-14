<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Viet Hung
 * Date: 8/5/2017
 * Time: 5:02 PM
 */
namespace App\Http\DAO;
use App\Http\Common\Constants;
use App\Models\Guest;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\User;
use App\UserGroup;
use App\Models\RoomType;
use App\UserMaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

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

    public function getRoomToBook($check_in, $check_out, $type_name){
        $strSQL =   'select ro.room_id, rt.price ';
        $strSQL .=  'from tbl_room ro join tbl_room_type rt ON ro.room_type_id = rt.room_type_id ';
        $strSQL .=  'where ro.status_id <> \'RO04\' AND rt.type_name = \''.$type_name.'\' AND  ro.room_id ';
        $strSQL .=  'NOT IN ( select rd.room_id from tbl_reservation_detail rd ';
        $strSQL .=  'left join tbl_reservation r on rd.reservation_id = r.id ';
        $strSQL .=  'where ((rd.date_in >= \''.$check_in.'\' AND rd.date_in <= \''.$check_out.'\')';
        $strSQL .=  '    OR (rd.date_out >= \''.$check_in.'\' AND rd.date_out <= \''.$check_out.'\')';
        $strSQL .=  '    OR (rd.date_in < \''.$check_in.'\' AND rd.date_out > \''.$check_out.'\'))';
        $strSQL .=  'AND NOT (rd.check_in_flag = \'1\' AND rd.check_out_flag = \'1\')) ';
        $strSQL .=  'ORDER BY ro.room_number ASC limit 1' ;

        $result = DB::select($strSQL);
        return $result;
    }



    public function createBook(Reservation $res,ReservationDetail $res_detail, Guest $guest, Invoice $invoice, InvoiceDetail $invoiceDetail,
                               $room_type, $room_quantity,$check_in,$check_out,$nights){

        $roomList = [];

        $guestInsert = new Guest();
        $resInsert = new Reservation();



        $guestInsert->name = $guest->getName();
        $guestInsert->identity_card = $guest->getIdentityCard();
        $guestInsert->phone = $guest->getPhone();
        $guestInsert->mail = $guest->getMail();
        $guestInsert->address = $guest->getAddress();
        //$guestInsert->company = $guest->getCompany();
        $guestInsert->create_ymd = $guest->getCreateYmd();

        DB::beginTransaction();

        try{

            $guestInsert->save();

            $resInsert->check_in = $res->getCheckIn();
            $resInsert->check_out = $res->getCheckOut();
            $resInsert->number_of_adult = $res->getNumberOfAdult();
            $resInsert->number_of_children = $res->getNumberOfChildren();
            $resInsert->number_of_room = $res->getNumberOfRoom();
            $resInsert->guest_id = $guestInsert->id;

            $resInsert->status_id = $res->getStatusId();
            $resInsert->note = $res->getNote();
            $resInsert->create_ymd = $res->getCreateYmd();


            $resInsert->editer = $res->getEditer();

            $resInsert->save();



            $invoiceInsert = new Invoice();
            $invoiceInsert->reservation_id = $resInsert->id;
            $invoiceInsert->guest_id = $guestInsert->id;
            $invoiceInsert->creater_nm = $invoice->getCreaterName();
            $invoiceInsert->create_ymd = $invoice->getCreateYmd();

            $invoiceInsert->save();


            $res_detail->setReservationId($resInsert->id);
            for ($i = 0; $i < count($room_type); $i++){
                for($j = 0; $j < $room_quantity[$i]; $j++){

                    $roomInfor = $this->getRoomToBook($check_in, $check_out, $room_type[$i]);
                    $res_detail->setRoomId($roomInfor[0]->room_id);

                    $resDetailInsert = new ReservationDetail();
                    $resDetailInsert->create_ymd = $res_detail->getCreateYmd();
                    $resDetailInsert->room_id = $res_detail->getRoomId();
                    $resDetailInsert->reservation_id = $res_detail->getReservationId();
                    $resDetailInsert->date_in = $res_detail->getDateIn();
                    $resDetailInsert->date_out = $res_detail->getDateOut();
                    $resDetailInsert->check_in_flag = $res_detail->getCheckInFlag();
                    $resDetailInsert->check_out_flag = $res_detail->getCheckOutFlag();

                    $resDetailInsert->save();

                    $invoiceDetailInsert = new InvoiceDetail();

                    $invoiceDetailInsert->invoice_id = $invoiceInsert->id;
                    $invoiceDetailInsert->item_id = $roomInfor[0]->room_id;
                    $invoiceDetailInsert->room_id = $roomInfor[0]->room_id;
                    $invoiceDetailInsert->item_type = $invoiceDetail->getItemType();
                    $invoiceDetailInsert->quantity = $invoiceDetail->getQuantity();
                    $invoiceDetailInsert->price = (int)($roomInfor[0]->price) * (int)$nights;
                    $invoiceDetailInsert->amount_total = (($roomInfor[0]->price) * $nights) + (($roomInfor[0]->price) * $nights * 10 / 100);
                    $invoiceDetailInsert->payment_flag = $invoiceDetail->getPaymentFlag();
                    $invoiceDetailInsert->create_ymd = $invoiceDetail->getCreateYmd();
                    $invoiceDetailInsert->creater_nm = $invoiceDetail->getCreaterName();

                    $invoiceDetailInsert->save();

                }
            }




            DB::commit();
            return 1;
        }catch(\Exception $e){
            dd($e);
            DB::rollback();
            return 0;
        }

    }
}