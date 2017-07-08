<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:19 PM
 */

namespace App\Http\Controllers;
use App\Http\DAO\K005DAO;

/**
 * Class K005Controller
 * @package App\Http\Controllers
 */
class K005Controller extends Controller
{

    public function View(){
        $room = $this->getRoomRequest();
        return view('Manager.K005_1',compact('room'));
    }

    public function PreviewForUpdate($id){
        $roomDetail = $this->getRoomRequest($id);
        return view('Manager.K005_2',compact('roomDetail'));
    }

    private function getRoomRequest($roomID = null){
        $k005DAO = new K005DAO();

        $result = $k005DAO->getRoom($roomID);

        return $result;
    }


}