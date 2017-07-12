<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:19 PM
 */

namespace App\Http\Controllers;
use App\Http\Common\Constants;
use App\Http\Common\Message;
use App\Http\DAO\K005DAO;
use App\Models\Accessory;
use App\Models\Room;
use Illuminate\Http\Request;

/**
 * Class K005Controller
 * @package App\Http\Controllers
 */
class K005Controller extends Controller
{
    public function ViewRoom(){

        $room = $this->getRoomRequest();

        return view('Manager.K005_1',compact('room'));
    }

    public function GetRoomRequest(Request $request = null){

        $k005DAO = new K005DAO();

        switch ($request){

            case null:
                $room = $k005DAO->getRoom();
                return $room;
                break;

            case isset($request->searchBnt) :
                $searchStr = $request->searchtxt;
                $room = $k005DAO->getRoom($searchStr);

                return view('Manager.K005_1',compact('room','searchStr'));
                break;

            case isset($request->listallBnt):
                $room = $k005DAO->getRoom();

                return view('Manager.K005_1',compact('room'));
                break;
        }


    }

    public function GetViewRoomDetailRequest($roomID){
        $k005DAO = new K005DAO();

        $roomDetail = $k005DAO->getRoomDetail($roomID);
        $accessory =  $k005DAO->getAccessoryDetail($roomID);
        $roomtype = $k005DAO->getRoomType();
        $status = $k005DAO->getStatus();

        return view('Manager.K005_2',compact('roomDetail', 'accessory','roomtype','status'));
    }


    public function UpdateRoomRequest(Request $request,$roomID){

        $room = new Room();
        $room->setRoomID($roomID);
        $room->setRoomTypeId($request->roomtype);
        $room->setFloor($request->floortxt);
        $room->setStatusId($request->status);
        $room->setRoomNumber($request->roomtxt);

        $accessory = array(
            Constants::ACCESSORY_BAN=>$request->table,
            Constants::ACCESSORY_DIEU_HOA => $request->aircondition,
            Constants::ACCESSORY_GIUONG => $request->bed,
            Constants::ACCESSORY_QUAT => $request->fan,
            Constants::ACCESSORY_TIVI => $request->tivi,
            Constants::ACCESSORY_TU_LANH => $request->friger
        );

        $result =  $this->UpdateRoom($room,$accessory);

        if($result == true){
            return redirect('/K005_1');
        }else{
            return Message::MSG0004;
        }

    }

    private function UpdateRoom(Room $room , $accessory ){
        $k005DAO = new K005DAO();

        $result = $k005DAO->UpdateRoom($room,$accessory);

        return $result;
    }

}