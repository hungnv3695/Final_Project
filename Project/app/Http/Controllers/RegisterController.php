<?php

namespace App\Http\Controllers;

use App\Http\DAO\AccountDAO;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function View(){
        return view('Layout.Register');
    }

    public function Register(Request $request){
        $userRegister = array(
            "userID"  => $request->userid,
            "userName" => $request->username,
            "password" => $request->password,
            "phone" => $request->phone,
            "email" => $request->email,
            "address" => $request->address,
            "group" => $request->group
         );

        $accountDAO = new AccountDAO();
        $result = $accountDAO->insertNewAccout($userRegister);

        if ($result){
            return "Insert thanh  cong";
        } else{
            return "Insert that bai";
        }

    }

}
