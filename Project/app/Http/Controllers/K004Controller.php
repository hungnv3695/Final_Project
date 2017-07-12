<?php
namespace App\Http\Controllers;
use App\Http\DAO\K004_DAO;
use App\Models\Reservation_Model;
use Illuminate\Database\Eloquent\Collection;
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
        //dd(json_encode($status));
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
       // $resModel = new Reservation_Model();
        //dd($resList);
        $count=count($resList);
            for($i =0; $i<$count; $i++){
                $resList[$i]->check_in= DateTimeUtil::ConvertStringToDate($resList[$i]->check_in);
                $resList[$i]->check_out= DateTimeUtil::ConvertStringToDate($resList[$i]->check_out);
            }
        $result = json_encode($resList);
        //dd($resModel->getId());
        if($result==[]){
            $result="";
            return response()->json($result);
        }
//


        //$collection = new Collection();
        //dd($resList);

//            foreach ( $resList as $key => $value )
//            {
//                $resModel->setId((string)$value->id);
//                $resModel->setGuestName((string)$value->name);
//                $resModel->setQuantity((string)$value->number_of_room);
//                $resModel->setCheckIn((string)$value->check_in);
//                $resModel->setCheckOut((string)$value->check_out);
//                $resModel->setEmail((string)$value->mail);
//                $resModel->setPhone((string)$value->phone);
//                $resModel->setIdentityCard((string)$value->identity_card);
//                $resModel->setStatus((string)$value->status_name);
//                $resModel->setCompany((string)$value->company);
//
//
//
//                $resArr=array($resModel);
//                //dd($resArr);
//                dd(key($resArr[0]));
//                //array_push($result,$resModel);
//
//            }

        return response($result);

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
                'country' => "",
                'room_id1' => "",
                'room_id2' => "",
                'room_id3' => "",
                'room_id4' => ""
            ]);
        }
        $res_id = $request->res_id;
        $K004_DAO = new K004_DAO();
        $guest = $K004_DAO->GetGuestData($res_id);
        $room = $K004_DAO->GetReservationDetail($res_id);
        $result = array_merge($guest,$room);
       //dd($result);
        if (count($result)==2){
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
                'country' => $result[0]-> country,
                'room1txt' => $result[1]->room_number,
                'double1txt' => $result[1]->type_name,
                'price1txt' => $result[1]->price,
                'room_id1' => $result[1]->room_id,
                'room_id2' => "",
                'room_id3' => "",
                'room_id4' => "",
                'room2txt' => "",
                'double2txt' =>"",
                'price2txt' => "",
                'room3txt' => "",
                'double3txt' =>"",
                'price3txt' => "",
                'room4txt' => "",
                'double4txt' =>"",
                'price4txt' => ""
            ]);
        }
        else if(count($result)==3){
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
                'country' => $result[0]-> country,
                'room1txt' => $result[1]->room_number,
                'double1txt' => $result[1]->type_name,
                'price1txt' => $result[1]->price,
                'room2txt' => $result[2]->room_number,
                'double2txt' => $result[2]->type_name,
                'price2txt' => $result[2]->price,
                'room_id1' => $result[1]->room_id,
                'room_id2' => $result[2]->room_id,
                'room_id3' => "",
                'room_id4' => "",
                'room3txt' => "",
                'double3txt' =>"",
                'price3txt' => "",
                'room4txt' => "",
                'double4txt' =>"",
                'price4txt' => ""
            ]);
        }
        else if(count($result)==4){
            //dd('111');
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
                'country' => $result[0]-> country,
                'room1txt' => $result[1]->room_number,
                'double1txt' => $result[1]->type_name,
                'price1txt' => $result[1]->price,
                'room2txt' =>   $result[2]->room_number,
                'double2txt' => $result[2]->type_name,
                'price2txt' =>  $result[2]->price,
                'room3txt' =>  $result[3]->room_number,
                'double3txt' =>$result[3]->type_name,
                'price3txt' => $result[3]->price,
                'room_id1' => $result[1]->room_id,
                'room_id2' => $result[2]->room_id,
                'room_id3' => $result[3]->room_id,
                'room_id4' => "",
                'room4txt' => "",
                'double4txt' =>"",
                'price4txt' => ""
            ]);
        }
        else if(count($result)==5){
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
                'country' => $result[0]-> country,
                'room1txt' => $result[1]->room_number,
                'double1txt' => $result[1]->type_name,
                'price1txt' => $result[1]->price,
                'room2txt' =>   $result[2]->room_number,
                'double2txt' => $result[2]->type_name,
                'price2txt' =>  $result[2]->price,
                'room3txt' =>  $result[3]->room_number,
                'double3txt' =>$result[3]->type_name,
                'price3txt' => $result[3]->price,
                'room_id1' => $result[1]->room_id,
                'room_id2' => $result[2]->room_id,
                'room_id3' => $result[3]->room_id,
                'room_id4' => $result[4]->room_id,
                'room4txt' => $result[4]->room_number,
                'double4txt' =>$result[4]->type_name,
                'price4txt' => $result[4]->price
            ]);
        }


    }

    public function GetRoomFree(Request $request){
        //dd('d');
        $type_name = $request->type_name;
        $check_in= DateTimeUtil::ConvertDateToString($request->check_in);
        $check_out=DateTimeUtil::ConvertDateToString($request->check_out);
        $K004_DAO = new K004_DAO();
        $roomFree = $K004_DAO->SelectRoomFree($type_name,$check_in,$check_out);
        return response()->json($roomFree);
    }


}