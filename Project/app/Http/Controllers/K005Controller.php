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
        return view('Manager.K005_1');
    }

    public function getRoomRequest(){
        $k005DAO = new K005DAO();

        $room = json_encode($k005DAO->getRoom()) ;


        return response()->json($room);
    }

    public function getViewRoomDetailRequest($roomID){
        $k005DAO = new K005DAO();

        $roomDetail = $k005DAO->getRoomDetail($roomID);

        return view('Manager.K005_2',compact('roomDetail'));
    }


    public function UpdateRoomRequest(Request $request){


    }

    private function UpdateRoom(Room $room){

    }

}