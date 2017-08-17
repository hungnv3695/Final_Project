<?php

/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/2/2017
 * Time: 9:14 PM
 */

namespace App\Http\DAO;
use App\Http\Common\Constants;
use App\Http\Common\StringUtil;
use App\Models\Guest;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\Models\RoomType;
use App\Models\Status;
use App\User;
use App\UserGroup;
use App\UserMaster;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Mockery\Exception;


class ReservationDAO{
    /**
     * @param $fname
     * @param $idCard
     * @param $status
     * @return mixed
     */
    public function selectReservation($fname, $idCard, $status){
        $t1 = 'UPPER(g.name) iLIKE \'%' . StringUtil::Trim($fname)  . '%\'';
        $t2 = 'UPPER(g.identity_card) iLIKE \'%' . StringUtil::Trim($idCard) . '%\'';
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
        $strSQL .='rd.reservation_id, rt.type_name,rt.room_type_id, COUNT(rt.room_type_id) "count", ';
        $strSQL .='sum (rt.price) "price", ';
        $strSQL .='string_agg(ro.room_number, \', \') "list_room" ';
        $strSQL .= 'from tbl_reservation_detail rd ';
        $strSQL .='JOIN tbl_room ro ON rd.room_id = ro.room_id ';
        $strSQL .='JOIN tbl_room_type rt ON ro.room_type_id = rt.room_type_id ';
        $strSQL .='WHERE rd.reservation_id = \'' . $res_id . '\'' ;
        $strSQL .=' GROUP BY rd.reservation_id, rt.type_name,rt.room_type_id  ';
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

        DB::beginTransaction();
        try{
            DB::select(DB::raw($strSQL));
            DB::commit();
            return 1;
        }catch (\Exception $e){
            DB::rollback();
            return 0;
        }

    }

    public function updateDataInOut($check_in,$check_out,$res_id){

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

        DB::beginTransaction();
        try{
            DB::select(DB::raw($strSQL));

            $strSQL  = 'UPDATE public.tbl_reservation_detail ';
            $strSQL .= 'SET date_in= \'' .$check_in. '\' , date_out= \'' . $check_out . '\' ,';
            $strSQL .= 'update_ymd = CURRENT_TIMESTAMP(0) ';
            $strSQL .= 'WHERE reservation_id = \'' . $res_id . '\' ';

            DB::select(DB::raw($strSQL));
            DB::Commit();
            return 1;
        }catch(\Exception $e){
            DB::rollback();
            return 0;
        }



    }



    public function updateSttProcessing(Reservation $res){
        $reservationUpdate = Reservation::find($res->getId());

        $reservationUpdate->editer = $res->getEditer();
        $reservationUpdate->status_id = $res->getStatusId();
        $reservationUpdate->update_ymd = Carbon::now();
        $reservationUpdate->saveOrFail();
        $result = $reservationUpdate->status_id;
        return $result;

    }
    public function selectRoomFree($res_id,$room_type_id,$check_in,$check_out){
        $strSQL = 'select ro.status_id, ro.room_id, ro.room_number, rt.room_type_id , rt.type_name from ';
        $strSQL .='tbl_room ro join tbl_room_type rt ';
        $strSQL .='ON ro.room_type_id = rt.room_type_id ';
        $strSQL .='where UPPER(rt.room_type_id) = \'' . strtoupper(trim($room_type_id)) . '\' AND ro.status_id <> \'RO04\' ';
        $strSQL .=' AND NOT ro.room_id IN (select rd.room_id from ';
        $strSQL .='tbl_reservation r join tbl_reservation_detail rd ON ';
        $strSQL .='r.id = rd.reservation_id where  r.id <> \'' . $res_id . '\'  AND r.status_id <> \'RS04\' AND ';
        $strSQL .= '((r.check_in BETWEEN \'' . $check_in . '\' AND \'' .$check_out. '\') ';
        $strSQL .='OR (r.check_out BETWEEN \'' .$check_in. '\' AND \'' .$check_out .'\')  OR (r.check_in < \''.$check_in.'\' AND r.check_out > \''.$check_out.'\') )) ';

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


        $strSQL =   'select ro.room_id, ro.room_number, rt.room_type_id , rt.type_name, rt.price from tbl_room ro ';
        $strSQL .=  'join tbl_room_type rt ON ro.room_type_id = rt.room_type_id where ro.status_id <> \'RO04\' ';
        $strSQL .=  'AND  ro.room_id NOT IN ( select rd.room_id from tbl_reservation_detail rd ';
        $strSQL .=  'left join tbl_reservation r on rd.reservation_id = r.id ';
        $strSQL .=  'where ((rd.date_in >= \''.$check_in.'\' AND rd.date_in <= \''.$check_out.'\') ';
        $strSQL .=  'OR (rd.date_out >= \''.$check_in.'\' AND rd.date_out <= \''.$check_out.'\') ';
        $strSQL .=  'OR (rd.date_in < \''.$check_in.'\' AND rd.date_out > \''.$check_out.'\')) ';
        $strSQL .=  'AND NOT (rd.check_in_flag = \'1\' AND rd.check_out_flag = \'1\')) ';
        $strSQL .=  'ORDER BY ro.room_number ASC';


        $result = DB::select(DB::raw($strSQL));

        return $result;
    }

    public function createReservation(Guest $guest, Reservation $res,ReservationDetail $resdetail,
                                      InvoiceDetail $invoiceDetail,Invoice $invoice, $roomList,$priceList,$nights){
        $guestInsert = new Guest();
        $resInsert = new Reservation();
        $invoiceInsert = new Invoice();


        $guestInsert->name = $guest->getName();
        $guestInsert->identity_card = $guest->getIdentityCard();
        $guestInsert->phone = $guest->getPhone();
        $guestInsert->mail = $guest->getMail();
        $guestInsert->address = $guest->getAddress();
        $guestInsert->company = $guest->getCompany();
        $guestInsert->create_ymd = Carbon::now();



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
            $resInsert->create_ymd = Carbon::now();
            $resInsert->editer = $res->getEditer();

            $resInsert->save();

            $resdetail->setReservationId($resInsert->id);
            $resdetail->setCreateYmd(Carbon::now());
            $resdetail->setDateIn($resInsert->check_in);
            $resdetail->setDateOut($resInsert->check_out);
            //dd($resdetail->getRoomId());

            foreach ($roomList as $value){

                $resDetailInsert = new ReservationDetail();
                $resDetailInsert->create_ymd = $resdetail->getCreateYmd();
                $resDetailInsert->room_id = trim($value);
                $resDetailInsert->reservation_id = $resdetail->getReservationId();
                $resDetailInsert->date_in = $resdetail->getDateIn();
                $resDetailInsert->date_out = $resdetail->getDateOut();
                $resDetailInsert->check_in_flag = 0;
                $resDetailInsert->check_out_flag = 0;
                //dd($resDetailInsert->create_ymd,$resDetailInsert->room_id,$resDetailInsert->reservation_id);

                $resDetailInsert->save();
            }


            $invoiceInsert->reservation_id = $resInsert->id;
            $invoiceInsert->guest_id = $guestInsert->id;
            $invoiceInsert->creater_nm = $invoice->getCreaterName();
            $invoiceInsert->create_ymd = $invoice->getCreateYmd();

            $invoiceInsert->save();

            for ($i = 0; $i < count($roomList); $i++){
                $invoiceDetailInsert = new InvoiceDetail();

                $invoiceDetailInsert->invoice_id = $invoiceInsert->id;
                $invoiceDetailInsert->item_id = $roomList[$i];
                $invoiceDetailInsert->item_type = $invoiceDetail->getItemType();
                $invoiceDetailInsert->quantity = $invoiceDetail->getQuantity();
                $invoiceDetailInsert->price = (int)$priceList[$i] * (int)$nights;
                $invoiceDetailInsert->amount_total = ((int)$priceList[$i] * (int)$nights) + ((int)$priceList[$i] * (int)$nights * 10 / 100 );
                $invoiceDetailInsert->create_ymd = $invoiceDetail->getCreateYmd();
                $invoiceDetailInsert->payment_flag = $invoiceDetail->getPaymentFlag();
                $invoiceDetailInsert->room_id = $roomList[$i];
                $invoiceDetailInsert->creater_nm = $invoiceDetail->getCreaterName();

                $invoiceDetailInsert->save();
            }



            DB::commit();
            return 1;

        }catch(\Exception $e){
            DB::rollback();
            return 0;
        }


    }
}