<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/2/2017
 * Time: 11:16 PM
 */

namespace App\Http\Controllers;


use App\Http\DAO\K013DAO;
use Illuminate\Http\Request;


class K013Controller
{
    public function viewCheckIn(){
        return view('Reception.K013_1');
    }

    public function getSearchRequest(Request $request){
        $name = $request->txtFullName;
        $identity = $request->txtCMND;

        $k013DAO = new K013DAO();
        $checkInInfo = $k013DAO->getCheckInInfo($name,$identity);
        return view('Reception.K013_1',compact('checkInInfo','name','identity'));
    }


}