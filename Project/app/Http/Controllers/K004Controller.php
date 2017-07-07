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

    public function getReservationDetail(Request $request){
        $res_id = $request->res_id;
        $K004_DAO = new K004_DAO();
        $resList = $K004_DAO->getReservationDetail($res_id);
        //dd($resList);



        return view("Reception.K004-2")->with([
            'name' => $resList[0]->fullname,
            'email' => $resList[0]->email,
            'phone' => $resList[0]->phone,
            'checkin' => DateTimeUtil::ConvertStringToDate($resList[0]->checkin),
            'checkout' => DateTimeUtil::ConvertStringToDate($resList[0]->checkout),
            'idCard' => $resList[0]->identity_card,
            'address' => $resList[0]->address,
            'company' => $resList[0]->company
        ]);

    }
}