<?php
namespace App\Http\Controllers;
use App\Http\DAO\K004_DAO;
use App\Models\Reservation_Model;
use Illuminate\Http\Request;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Common\DateTimeUtil;

class K004Controller extends Controller{
    public function K004_1_View(){

        return view('Reception.xxx');
    }

    public function K004_2_View(){

        return view('Reception.K004-2');
    }
    public function getReservationStatus(){
        $K004_DAO = new K004_DAO();
        $status = $K004_DAO->getStatus();
        if($status==[]){
            $status = "";
            return response()->json($status);
        }
        //$status = json_encode($status);

        return response()->json($status);
    }

    public function getReservation(Request $request){

        $fname = $request->fname;
        $idCard = $request->idCard;
        $status = $request->status;
        //dd($idCard);
        $K004_DAO = new K004_DAO();
        $resList = $K004_DAO->selectReservation($fname,$idCard,$status);
        //$resModel = new Reservation_Model();
        $result = json_encode($resList);
        //dd($resModel->getId());
        if($result==[]){
            $result="";
            return response()->json($result);
        }
//
//        foreach ( $resList as $key => $value )
//        {
//            $resModel->setId((string)$value->res_id);
//            $resModel->getGuestId((string)$value->guest_id);
//            $resModel->getGuestName((string)$value->name);
//            $resModel->getQuantity((string)$value->quantity);
//            $resModel->getCheckIn((string)$value->checkin);
//            $resModel->getCheckOut((string)$value->checkout);
//            $resModel->getEmail((string)$value->email);
//            $resModel->getPhone((string)$value->phone);
//            $resModel->getIdentityCard((string)$value->identity_card);
//            $resModel->getStatus((string)$value->status);
//        }
//        $Result = "";
//        array_push($Result, $resModel);
//        dd($Result);

        return response()->json($result);

    }

    public function GetGuest(Request $request){
        if($request->res_id ==""){
            return view("Reception.K004-2")->with([
                'id' => "",
                'check_in' => "",
                'check_out' => "",
                'number_of_room'=>"",
                'name' => "",
                'phone' => "",
                'email' => "",
                'idCard' => "",
                'company' => "",
                'address' => "",
                'company_phone'=>"" ,
                'country' => ""
            ]);
        }
        $res_id = $request->res_id;
        $K004_DAO = new K004_DAO();
        $guest = $K004_DAO->GetGuestData($res_id);
        $room = $K004_DAO->GetReservationDetail($res_id);
        $result = array_merge($guest,$room);
        dd($result);

        if ($result == []){
            return view("Reception.K004-2")->with([
                'id' => "1",
                'check_in' => "20170205",
                'check_out' => "20170205",
                'number_of_room'=>"4",
                'name' => "Nguyen Viet Hung",
                'phone' => "1212121212",
                'email' => "hng@gmail",
                'idCard' => "1212121",
                'company' => "fpt",
                'address' => "to hieu",
                'company_phone'=>"32323232" ,
                'country' => "Viet Nam"
            ]);
        }
        else{
            return view("Reception.K004-2")->with([
                'id' => $result[0]->id,
                'check_in' => DateTimeUtil::ConvertStringToDate($result[0]->check_in),
                'check_out' => DateTimeUtil::ConvertStringToDate($result[0]->check_out),
                'number_of_room' => $result[0]-> number_of_room,
                'name' => $result[0]->name,
                'phone' => $result[0]->phone,
                'email' => $result[0]->mail,
                'idCard' => $result[0]->identity_card,
                'company' => $result[0]->company,
                'address' => $result[0]->address,
                'company_phone' => $result[0]-> company_phone,
                'country' => $result[0]-> country
            ]);
        }

    }

        public function GetRoomFree(){

    }

    public function GetReservationDetail(Request $request){
        $res_id = $request->res_id;
        $K004_DAO = new K004_DAO();
        $result = $K004_DAO->GetReservationDetail($res_id);
        //dd($resList);
        return \response($result);

    }
}