<?php

namespace App\Http\Controllers;

use App\Http\Common\DateTimeUtil;
use App\Http\Common\Constants;
use  App\Http\Common\SendEmail;
use App\Http\DAO\BookOnlineDAO;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index() {
        return view('Guest.Book.pages.booking');
    }


    public function loadRoomType(Request $request){
        $check_in = DateTimeUtil::ConvertDateToString2($request->check_in);
        $check_out = DateTimeUtil::ConvertDateToString2($request->check_out);
        //dd($check_in,$check_in);
        $BookOnlineDAO = new BookOnlineDAO();
        $result = $BookOnlineDAO->getRoomTypeFree($check_in,$check_out);
        return response($result);
    }

    public function loadRoomInfor(){
        $BookOnlineDAO = new BookOnlineDAO();
        $result = $BookOnlineDAO->getRoomTypeInfor();
        return $result;
    }

    public function confirmView() {
        return view('Guest.Confirm');
    }

    public function bookRoomOnline(Request $request){
        $room_type = explode(',', $request->room_type);
        $room_quantity = explode(',', $request->room_quantity);
        $total = $request->total;
        $nights = $request->nights;

        $countRoom  = $request->countRoom;
        $check_in = DateTimeUtil::ConvertDateToString2($request->check_in);
        $check_out = DateTimeUtil::ConvertDateToString2($request->check_out);

//        $dateNow = Carbon::now()->format('Ymd');
//        $fileName = "20170821" + "_" + "1";
//        //Bao Kim Start
//        $order_id = "2";
//        $business = "sondcnd@gmail.com";
//        $total_amount = 5000;//(int)$request->roomPrice;
//        $tax_fee = $total_amount * 10 / 100;
//        $shipping_fee = 0;
//        $order_description = "Thanh toán hóa đơn đặt phòng";
//        $url_success = "https://www.anhduonghotel.herokuapp.com/Success/"+$fileName;//?check_in=".$check_in . "&check_out=" . $check_out;
//        $url_cancel = "https://www.anhduonghotel.herokuapp.com";
//        $url_detail = "";
//        $baokim = new BaoKimPayment();
//        $result = $baokim->createRequestUrl($order_id, $business, $total_amount,
//            $shipping_fee, $tax_fee, $order_description,
//            $url_success, $url_cancel, $url_detail);
//        //Bao Kim End
//        dd($result);

        //$listRoom = $bookOnlineDAO->getRoomToBook($check_in, $check_out, $type_name, $countRoom);


        //Comment start
        $res = new Reservation();
        $res->setCheckIn($check_in);
        $res->setCheckOut($check_out);
        $res->setNumberOfAdult($request->adult);
        $res->setNumberOfChildren($request->children);
        $res->setEditer('GUEST');
        $res->setNote($request->notetxt);
        $res->setCreateYmd(Carbon::now());
        $res->setStatusId('RS01');
        $res->setNumberOfRoom($countRoom);

        $guest = new Guest();
        $guest->setName($request->txtFullname);
        $guest->setIdentityCard($request->txtIdcard);
        $guest->setPhone($request->txtPhone);
        $guest->setAddress($request->txtAddress);
        $guest->setMail($request->txtEmail);
        $guest->setCountry($request->Country);
        $guest->setCreateYmd(Carbon::now());

        $resDetail = new ReservationDetail();
        $resDetail->setDateIn($check_in);
        $resDetail->setDateOut($check_out);
        $resDetail->setCheckInFlag(0);
        $resDetail->setCheckOutFlag(0);
        $resDetail->setCreateYmd(Carbon::now());

        $invoice = new Invoice();
        $invoice->setCreateYmd(Carbon::now());
        $invoice->setCreaterName('GUEST');

        $invoiceDetail = new InvoiceDetail();


        $invoiceDetail->setItemType('Room');
        $invoiceDetail->setQuantity(1);
        $invoiceDetail->setCreateYmd(Carbon::now());
        $invoiceDetail->setCreaterName('Guest');
        $invoiceDetail->setPaymentFlag(1);

        $bookOnlineDAO = new BookOnlineDAO();
        $result = $bookOnlineDAO->createBook($res,$resDetail, $guest,$invoice,$invoiceDetail, $room_type, $room_quantity,$check_in,$check_out,$nights);

        $room_price = explode(',', $request->roomPrice);

        $infor = array();
        $infor[Constants::GUEST_NAME] = $request->txtFullname;
        $infor[Constants::CMND] = $request->txtIdcard;
        $infor[Constants::CHECK_IN] = $request->check_in;
        $infor[Constants::CHECK_OUT] = $request->check_out;
        $infor[Constants::NUMBER_NIGHT] = $request->nights;
        $infor[Constants::ADULT] = $request->adult;
        $infor[Constants::CHILDREN] = $request->children;
        $infor[Constants::NOTE] = $request->notetxt;

        $email = $request->txtEmail;

//        SendEmail::sendEmail($infor,$room_type,$room_quantity,$room_price,$email);

        return response($result);
        //Comment End

    }
}
