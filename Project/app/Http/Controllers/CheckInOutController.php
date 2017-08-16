<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/19/2017
 * Time: 9:32 PM
 */

namespace App\Http\Controllers;


use App\Http\Common\DateTimeUtil;
use App\Http\Common\StringUtil;
use App\Http\DAO\CheckInOutDAO;
use App\Models\Guest;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckInOutController extends Controller
{
    public function viewCheckInList(){
        return view('Reception.CheckinList');
    }

    public function viewCheckOut(){
        return view('Reception.CheckoutList');
    }


    public function getSearchCheckInRequest(Request $request){
        $name = StringUtil::Trim($request->txtFullName) ;
        $identity = StringUtil::Trim($request->txtCMND) ;

        $checkIn = new CheckInOutDAO();
        $checkInInfo = $checkIn->getCheckInInfo($name,$identity);
        return view('Reception.CheckinList',compact('checkInInfo','name','identity'));
    }

    public  function getSearchCheckOutRequest(Request $request){
        $room = StringUtil::Trim($request->txtRoomNo);
        $name = StringUtil::Trim($request->txtFullName);

        $checkOut = new CheckInOutDAO();
        $checkOutInfo = $checkOut->getCheckOutInfo($room,$name);

        return view('Reception.CheckoutList',compact('checkOutInfo','room','name'));
    }


    public function view(){

        $k003 = new CheckInOutDAO();
        $roomStatus = $k003->getStatusToDay(date("Y/m/d"));

        return view('Reception.K003_1',compact('roomStatus'));
    }

    public function getRoomStatusRequest(Request $request){
        $checkIn = $request->checkin;
        $checkOut = $request->checkout;

        $k003 = new CheckInOutDAO();
        $roomStatus = $k003->getRoomStatus($checkIn,$checkOut);

        return view('Reception.K003_1',compact('roomStatus'));

    }

    #region K003_2
    public function viewCheckIn(){

            return view('Reception.Checkin');


    }

    public function searchRoomTypeFree(Request $request){
        $check_in = DateTimeUtil::ConvertDateToString2($request->check_in);
        $check_out = DateTimeUtil::ConvertDateToString2($request->check_out);
        //dd($check_in,$check_out);
        $CheckInOutDAO = new CheckInOutDAO();
        $result = $CheckInOutDAO->getRoomTypeFree($check_in,$check_out);

        return response($result);
    }

    public function checkIn(Request $request){
        $res_status = $request->res_status;
        $room_status = $request->room_status;
        $room_id = $request->cboRoomNo;
        $res_id = $request->res_id;
        $total_price = $request->total_price;

        if($res_id != ""){//Check in cho reservation

            //Reservation_detail Model
            $res_detail = new ReservationDetail();
            $res_detail->setCreateYmd(Carbon::now());
            $res_detail->setRoomId($room_id);
            $res_detail->setCustomerName($request->txtFullname2);
            $res_detail->setCustomerIC($request->txtIdcard2);
            $res_detail->setCustomerPhone($request->txtPhone2);
            $res_detail->setCustomerEmail($request->txtEmail2);
            $res_detail->setUpdateYmd(Carbon::now());
            $res_detail->setDateIn(DateTimeUtil::ConvertDateToString2($request->txtCheckin));
            $res_detail->setDateOut(DateTimeUtil::ConvertDateToString2($request->txtCheckout));
            $res_detail->setNote($request->note2);
            $res_detail->setCheckInFlag(1);

            //Room Model
            $room = new Room();

            $room->setStatusID($room_status);
            $room->setRoomID($room_id);

            $CheckInOutDAO = new CheckInOutDAO();

            $result = $CheckInOutDAO->checkInReservation( $room, $res_detail, $res_id, $room_id);

            if($result==1){
                return response(1);
            }else if ($result==0){
                return response(0);
            }

        }
        else{ //Check in mới

            //Guest Model
            $guest = new Guest();
            $guest->setName(trim($request->txtFullname1));
            $guest->setPhone(trim($request->txtPhone1));
            $guest->setMail(trim($request->txtEmail1));
            $guest->setIdentityCard(trim($request->txtIdcard1));

            //Reservation Model
            $reservation = new Reservation();
            $reservation->setCheckIn(DateTimeUtil::ConvertDateToString2($request->txtCheckin));
            $reservation->setCheckOut(DateTimeUtil::ConvertDateToString2($request->txtCheckout));
            $reservation->setStatusId($res_status);
            $reservation->setNumberOfAdult($request->numofpeople);
            $reservation->setNumberOfChildren(0);
            $reservation->setEditer('');
            $reservation->setNumberOfRoom(1);
            $reservation->setCreateYmd(Carbon::now());
            $reservation->setNote($request->txtNote);
            $reservation->setEditer($request->session()->get('USER_INFO')->user_id);

            //Reservation_detail Model
            $res_detail = new ReservationDetail();
            $res_detail->setCreateYmd(Carbon::now());
            $res_detail->setRoomId($room_id);
            $res_detail->setDateIn(DateTimeUtil::ConvertDateToString2($request->txtCheckin));
            $res_detail->setDateOut(DateTimeUtil::ConvertDateToString2($request->txtCheckout));
            $res_detail->setCustomerName($request->txtFullname2);
            $res_detail->setCustomerIC($request->txtIdcard2);
            $res_detail->setCustomerPhone($request->txtPhone2);
            $res_detail->setCustomerEmail($request->txtEmail2);
            $res_detail->setNote($request->txtNote2);
            $res_detail->setCheckInFlag(1);
            //dd($res_detail);
            //Room Model
            $room = new Room();
            $room->setStatusID($room_status);
            $room->setRoomID($room_id);

            //Invoice Model
            $invoice = new Invoice();
            $invoice->setCreateYmd(Carbon::now());
            $invoice->setCreaterName($request->session()->get('USER_INFO')->user_id);

            //Invoice Detail Model
            $invoiceDetail = new InvoiceDetail();
            $invoiceDetail->setItemId($room_id);
            $invoiceDetail->setItemType('Room');
            $invoiceDetail->setQuantity(1);
            $invoiceDetail->setPrice((int)$total_price);
            $invoiceDetail->setAmountTotal((int)$total_price + ((int)$total_price * 10 / 100));
            $invoiceDetail->setRoomId($room_id);
            $invoiceDetail->setPaymentFlag(0);
            $invoiceDetail->setCreateYmd(Carbon::now());
            $invoiceDetail->setCreaterName($request->session()->get('USER_INFO')->user_id);


            $CheckInOutDAO = new CheckInOutDAO();
            $result = $CheckInOutDAO->createNewCheckin($guest,  $reservation,  $room,  $res_detail, $invoice,$invoiceDetail);
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
            return response('Reception.Checkin');
        }
        else if($res_id != ""){
            $room_id = $request->room_id;
            $CheckInOutDAO = new CheckInOutDAO();
            $result = $CheckInOutDAO->selectResDetailInfor($res_id, $room_id);
            $result[0]->check_in = DateTimeUtil::ConvertStringToDate($result[0]->check_in);
            $result[0]->check_out = DateTimeUtil::ConvertStringToDate($result[0]->check_out);
            return response($result);
        }



    }

    public function saveInforCustomer(Request $request){

        $res_detail = new ReservationDetail();

        $res_detail->setCustomerName($request->fullname2);
        $res_detail->setCustomerPhone($request->phone2);
        $res_detail->setCustomerIC($request->idCard2);
        $res_detail->setCustomerEmail($request->email2);

        $res_detail->setNote($request->note2);

        $res_detail->setReservationId($request->res_id) ;
        $res_detail->setRoomId($request->room_id);
        $res_detail->setUpdateYmd(Carbon::now());



        $CheckInOutDAO = new CheckInOutDAO();
        $result = $CheckInOutDAO->updateCustomerInfor($res_detail);

        if($result==1){
            return response(1);
        }else if ($result==0){
            return response(0);
        }

    }

    #endregion

    public function checkOut_View(){

        return view('Reception.Checkout');

    }

    public function loadResDetail(Request $request){
        $resDetail_id = $request->resDetail_id;

        $CheckInOutDAO = new CheckInOutDAO();
        $result = $CheckInOutDAO->selectResDetail($resDetail_id);
        $result[0]->date_in = DateTimeUtil::ConvertStringToDate($result[0]->date_in);
        $result[0]->date_out = Carbon::now()->format('d/m/Y');
       // dd($result[0]->total_price);
        return response($result);
    }

    public function saveCheckOut(Request $request){
        $room_id = $request->room_id;
        $resDetail_id = $request->resDetail_id;
        $res_id = $request->res_id;
        $user_id = $request->session()->get('USER_INFO')->user_id;
        $CheckInOutDAO = new CheckInOutDAO();
        $result = $CheckInOutDAO->saveCheckoutInfor($room_id,$res_id,$resDetail_id, $user_id);

        return response($result);
    }

    public function loadService(Request $request){
        $invoice_id = $request->invoice_id;
        $room_id = $request->room_id;

        $CheckInOutDAO = new CheckInOutDAO();
        $result = $CheckInOutDAO->getService($invoice_id,$room_id);
        return response($result);
    }
}