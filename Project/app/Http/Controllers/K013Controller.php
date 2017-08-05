<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/2/2017
 * Time: 11:16 PM
 */

namespace App\Http\Controllers;


use App\Http\Common\StringUtil;
use App\Http\DAO\K013DAO;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class K013Controller
{
    public function viewCheckIn(){
        return view('Reception.K013_1');
    }

    public function viewCheckOut(){
        return view('Reception.K013_2');
    }


    public function getSearchCheckInRequest(Request $request){
        $name = StringUtil::Trim($request->txtFullName) ;
        $identity = StringUtil::Trim($request->txtCMND) ;

        $k013DAO = new K013DAO();
        $checkInInfo = $k013DAO->getCheckInInfo($name,$identity);
        return view('Reception.K013_1',compact('checkInInfo','name','identity'));
    }

    public  function getSearchCheckOutRequest(Request $request){
        $room = StringUtil::Trim($request->txtRoomNo);
        $name = StringUtil::Trim($request->txtFullName);

        $k013DAO = new K013DAO();
        $checkOutInfo = $k013DAO->getCheckOutInfo($room,$name);

        return view('Reception.K013_2',compact('checkOutInfo','room','name'));
    }


}