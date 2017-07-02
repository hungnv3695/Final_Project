<?php
namespace App\Http\Controllers;
use App\Http\DAO\K003_DAO;
use App\Models\Reservation_Model;
use Illuminate\Http\Request;
use App\User;
use Symfony\Component\HttpFoundation\Response;

class K003Controller extends Controller{
    public function View(){

        return view('Reception.xxx');
    }

    public function getReservationStatus(){
        $K003_DAO = new K003_DAO();
        $status = $K003_DAO->getStatus();
        //$status = json_encode($status);

        return response()->json($status);
    }

    public function getReservation(Request $request){

        $fname = $request->fname;
        $idCard = $request->idCard;
        $status = $request->status;
        //dd($idCard);
        $K003_DAO = new K003_DAO();
        $resList = $K003_DAO->selectReservation($fname,$idCard,$status);
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
}