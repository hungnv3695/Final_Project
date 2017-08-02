<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/19/2017
 * Time: 9:32 PM
 */

namespace App\Http\Controllers;


use App\Http\Common\DateTimeUtil;
use App\Http\DAO\K003DAO;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class K003Controller extends Controller
{
    public function view(){

        $k003 = new K003DAO();
        $roomStatus = $k003->getStatusToDay(date("Y/m/d"));

        return view('Reception.K003_1',compact('roomStatus'));
    }

    public function getRoomStatusRequest(Request $request){
        $checkIn = $request->checkin;
        $checkOut = $request->checkout;

        $k003 = new K003DAO();
        $roomStatus = $k003->getRoomStatus($checkIn,$checkOut);

        return view('Reception.K003_1',compact('roomStatus'));

    }

    public function k003_2_View(){

            return view('Reception.K003_2');


    }

    public function searchRoomTypeFree(Request $request){
        $check_in = DateTimeUtil::ConvertDateToString($request->check_in);
        $check_out = DateTimeUtil::ConvertDateToString($request->check_out);

        $K003DAO = new K003DAO();
        $result = $K003DAO->getRoomTypeFree($check_in,$check_out);

        return response($result);
    }

    public function checkIn(Request $request){
        $res_status = $request->res_status;
        $room_status = $request->room_status;
        $room_id = $request->cboRoomNo;
        $res_id = $request->res_id;
        if($res_id != ""){

            //Reservation_detail Model
            $res_detail = new ReservationDetail();
            $res_detail->setCreateYmd(Carbon::now());
            $res_detail->setRoomId($room_id);
            $res_detail->setCustomerName($request->txtFullname2);
            $res_detail->setCustomerIC($request->txtIdcard2);
            $res_detail->setCustomerPhone($request->txtPhone2);
            $res_detail->setCustomerEmail($request->txtEmail2);
            $res_detail->setUpdateYmd(Carbon::now());
            $res_detail->setDateIn(DateTimeUtil::ConvertDateToString($request->txtCheckin));
            $res_detail->setDateOut(DateTimeUtil::ConvertDateToString($request->txtCheckout));

            //Room Model
            $room = new Room();

            $room->setStatusID($room_status);
            $room->setRoomID($room_id);

            $K003DAO = new K003DAO();

            $result = $K003DAO->checkInReservation( $room, $res_detail, $res_id, $room_id);

            if($result==1){
                return response(1);
            }else if ($result==0){
                return response(0);
            }

        }
        else{

            //Guest Model
            $guest = new Guest();
            $guest->setName(trim($request->txtFullname1));
            $guest->setPhone(trim($request->txtPhone1));
            $guest->setMail(trim($request->txtEmail1));
            $guest->setIdentityCard(trim($request->txtIdcard1));

            //Reservation Model
            $reservation = new Reservation();
            $reservation->setCheckIn(DateTimeUtil::ConvertDateToString($request->txtCheckin));
            $reservation->setCheckOut(DateTimeUtil::ConvertDateToString($request->txtCheckout));
            $reservation->setStatusId($res_status);
            $reservation->setNumberOfAdult($request->numofpeople);
            $reservation->setNumberOfChildren(0);
            $reservation->setEditer('');
            $reservation->setNumberOfRoom(1);
            $reservation->setCreateYmd(Carbon::now());
            $reservation->setNote($request->txtNote);

            //Reservation_detail Model
            $res_detail = new ReservationDetail();
            $res_detail->setCreateYmd(Carbon::now());
            $res_detail->setRoomId($room_id);
            $res_detail->setDateIn(DateTimeUtil::ConvertDateToString($request->txtCheckin));
            $res_detail->setDateOut(DateTimeUtil::ConvertDateToString($request->txtCheckout));

            //Room Model
            $room = new Room();

            $room->setStatusID($room_status);
            $room->setRoomID($room_id);


            $K003DAO = new K003DAO();
            $result = $K003DAO->createNewCheckin($guest,  $reservation,  $room,  $res_detail);
            if($result==1){
                return response(1);
            }else if ($result==0){
                return response(0);
            }
        }



    }

    public function checkIsReservation(Request $request){
        $res_id = $request->res_id;

        if($res_id==""){
            return response('Reception.K003_2');
        }
        else if($res_id != ""){
            $room_id = $request->room_id;
            $K003DAO = new K003DAO();
            $result = $K003DAO->selectResDetailInfor($res_id, $room_id);
            $result[0]->check_in = DateTimeUtil::ConvertStringToDate($result[0]->check_in);
            $result[0]->check_out = DateTimeUtil::ConvertStringToDate($result[0]->check_out);
            return response($result);
        }



    }

}