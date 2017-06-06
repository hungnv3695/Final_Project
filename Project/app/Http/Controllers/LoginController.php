<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Http\DAO\AccountDAO;

define("ErrorLoginMesg", "Your username or password aren't correct. Please try again...");
define("SuccessMegLogin", "Dang nhap thanh cong");

class LoginController extends Controller
{
    public function View(){
        return view('Layout.LoginForm');
    }

    public function CheckAcc($userName,$password){


        //$userName = $request->userName;
        //$password = $request->password;

        $accDAO = new AccountDAO();
        $resultCheck = $accDAO->checkAcc($userName,$password) ;

        if ( !$resultCheck ){
            return back()->withInput()->with("LoginMeg",ErrorLoginMesg);
        } else{

            //get User Infomation
            $userInfo =  $accDAO->getUserInfo($userName,$password);
            session(['USER_INFO' => $userInfo]);

            return view('Layout.Index');
        }

    }
}
