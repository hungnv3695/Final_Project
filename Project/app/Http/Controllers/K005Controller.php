<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:19 PM
 */

namespace App\Http\Controllers;
use App\Http\DAO\K005DAO;
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

        return view('Manager.K005_2',compact('roomDetail'));
    }


    public function UpdateRoomRequest(Request $request){


    }

    private function UpdateRoom(Room $room){

    }

}