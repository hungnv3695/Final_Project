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
    /**
     * View Room List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewRoom(){
        return view('Manager.K005_1');
    }

    /**
     * View Add Room Page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function viewAddRoom(Request $request){
        $roomTypeID = $request->roomTypeID;

        $k005DAO = new K005DAO();

        $roomtype = $k005DAO->getRoomType();

        if (strcmp($roomTypeID,'0') == 0 ){
            $roomTypeID = array_get($roomtype[0],Constants::TBL_ROOM_TYPE_ID);
        }

        $roomTypeSelect = $k005DAO->getRoomTypeValue($roomTypeID);
        $status = $k005DAO->getStatus();
        $accessory =  $k005DAO->getAccessoryDetail($roomTypeID);

            return view('Manager.K005_3',compact('roomtype','status','roomTypeSelect','accessory')) ;

    }

    /**
     * Get room request from RoomList Page or Router
     * @param Request|null $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRoomRequest(Request $request = null){

        $k005DAO = new K005DAO();
        //dd($request);

        switch ($request){

            //Neu goi tu Router thi Return All Room
            case null:
                $room = $k005DAO->getRoom();
                return $room;
                break;

            //Neu nguoi dung click vao listall thi return ra All Room
            case isset($request->listallBnt):
                $room = $k005DAO->getRoom();

                return view('Manager.K005_1',compact('room'));
                break;

            // Neu nguoi dung chon search button hoac
            //search floor thi se return ra room tuong ung
            case isset($request->searchBnt) || isset($request->searchfloor):
                $searchStr = $request->searchtxt;
                $searchFloor = $request->searchfloor;

                $room = $k005DAO->getRoom($searchStr,$searchFloor);

                return view('Manager.K005_1',compact('room','searchStr','searchFloor'));
                break;
        }
    }

    /**
     * View Room Detail
     * @param Request $request
     * @param $roomID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getViewRoomDetailRequest(Request $request, $roomID){
            $roomTypeID = $request->roomTypeID;

            $k005DAO = new K005DAO();

            $roomDetail = $k005DAO->getRoomDetail($roomID);
            $roomTypeSelect = $k005DAO->getRoomTypeValue($roomTypeID);
            $accessory =  $k005DAO->getAccessoryDetail($roomTypeID);
            $roomtype = $k005DAO->getRoomType();
            $status = $k005DAO->getStatus();

            return view('Manager.K005_2',compact('roomDetail', 'accessory','roomtype','status','roomTypeSelect'));
    }

    /**
     *  get Request Update Room
     * @param Request $request
     * @param $roomID
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function updateRoomRequest(Request $request,$roomID){

        $room = new Room();
        $room->setRoomID($roomID);
        $room->setRoomTypeId($request->txtroomType);
        $room->setFloor($request->floortxt);
        $room->setStatusId($request->txtStatus);
        $room->setRoomNumber($request->txtRoomNo);
        $room->setNote($request->txtNote);

        $result =  $this->updateRoom($room);

        if($result == true){
            $room = $this->getRoomRequest();
            return view('Manager.K005_1',compact('room'));
        }else{
            return Message::MSG0004;
        }

    }

    /**
     * Update room
     * @param Room $room
     * @param $accessory
     * @return bool
     */
    private function updateRoom(Room $room ){
        $k005DAO = new K005DAO();

        $result = $k005DAO->updateRoom($room);

        return $result;
    }

    /**
     * get Add room Request
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function addRoomRequest(Request $request){


        $k005DAO = new K005DAO();

        $checkKey= $k005DAO->checkRoomKey($request->txtRoomID);

        if($checkKey == false){
            return back()->withInput();
        } else{

            $room = new Room();
            $room->setRoomID($request->txtRoomID);
            $room->setRoomTypeId($request->txtroomType);
            $room->setFloor($request->floortxt);
            $room->setStatusId($request->txtStatus);
            $room->setRoomNumber($request->txtRoomNo);


            $result =  $this->addRoom($room);

            if($result == true){
                $room = $this->getRoomRequest();
                return view('Manager.K005_1',compact('room'));
            }else{
                return Message::MSG0004;
            }

        }

    }

    /**
     * Add room
     * @param $room
     * @param $accessory
     * @return bool
     */
    private function addRoom($room){
        $k005DAO = new K005DAO();

        $result = $k005DAO->addRoom($room);

        return $result;
    }


}