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
use App\Http\DAO\RoomDAO;
use App\Models\Accessory;
use App\Models\Room;
use Illuminate\Http\Request;

/**
 * Class K005Controller
 * @package App\Http\Controllers
 */
class RoomController extends Controller
{
    /**
     * View Room List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewRoom(){
        return view('Manager.RoomList');
    }

    /**
     * View Add Room Page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function viewAddRoom(Request $request){
        $roomTypeID = $request->roomTypeID;

        $roomDAO = new RoomDAO();

        $roomtype = $roomDAO->getRoomType();

        if (strcmp($roomTypeID,'0') == 0 ){
            $roomTypeID = array_get($roomtype[0],Constants::TBL_ROOM_TYPE_ID);
        }

        $roomTypeSelect = $roomDAO->getRoomTypeValue($roomTypeID);
        $status = $roomDAO->getStatus();
        $accessory =  $roomDAO->getAccessoryDetail($roomTypeID);

            return view('Manager.AddRoom',compact('roomtype','status','roomTypeSelect','accessory')) ;

    }

    /**
     * Get room request from RoomList Page or Router
     * @param Request|null $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRoomRequest(Request $request = null){

        $roomDAO = new RoomDAO();

        switch ($request){

            //Neu goi tu Router thi Return All Room
            case null:
                $room = $roomDAO->getRoom();
                return $room;
                break;

            //Neu nguoi dung click vao listall thi return ra All Room
            case isset($request->btnListall):
                $room = $roomDAO->getRoom();

                return view('Manager.RoomList',compact('room'));
                break;

            // Neu nguoi dung chon search button hoac
            //search floor thi se return ra room tuong ung
            case isset($request->btnSearch) || isset($request->searchfloor):
                $searchStr = $request->searchtxt;
                $searchFloor = $request->searchfloor;

                $room = $roomDAO->getRoom($searchStr,$searchFloor);

                return view('Manager.RoomList',compact('room','searchStr','searchFloor'));
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

        $roomDAO = new RoomDAO();

            $roomDetail = $roomDAO->getRoomDetail($roomID);
            $roomTypeSelect = $roomDAO->getRoomTypeValue($roomTypeID);
            $accessory =  $roomDAO->getAccessoryDetail($roomTypeID);
            $roomtype = $roomDAO->getRoomType();
            $status = $roomDAO->getStatus();

            return view('Manager.RoomDetail',compact('roomDetail', 'accessory','roomtype','status','roomTypeSelect'));
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


        $roomDAO = new RoomDAO();

        $checkName = $roomDAO->checkRoomNumber($request->txtRoomNo,$roomID);

        if(!$checkName){
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0036);
        }else{
            $result = $roomDAO->updateRoom($room);

            if($result == true){
                return redirect('/RoomList')->with(Constants::SUCCESS_MSG,Message::MSG0018);

            }else{
                return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0023);
            }
        }

    }


    /**
     * get Add room Request
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function addRoomRequest(Request $request){


        $roomDAO = new RoomDAO();

        $checkKey= $roomDAO->checkRoomKey($request->txtRoomID);
        $checkName = $roomDAO->checkRoomNumber($request->txtRoomNo,$request->txtRoomID);
        if($checkKey == false){
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0026);
        }elseif (!$checkName){
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0036);
        } else{

            $room = new Room();
            $room->setRoomID($request->txtRoomID);
            $room->setRoomTypeId($request->txtroomType);
            $room->setFloor($request->floortxt);
            $room->setStatusId($request->txtStatus);
            $room->setRoomNumber($request->txtRoomNo);


            $result =  $roomDAO->addRoom($room);

            if($result == true){
                return redirect('/RoomList')->with(Constants::SUCCESS_MSG,Message::MSG0025);
            }else{
                return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0024);
            }

        }

    }
}