<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Http\DAO\LoginDAO;

define("ErrorLoginMesg", "Your username or password aren't correct. Please try again...");
define("SuccessMegLogin", "Dang nhap thanh cong");

class LoginController extends Controller
{
    public function View(){
        return view('Layout.LoginForm');
    }

    public function CheckAcc($userName,$password){

        $loginDAO = new LoginDAO();
        $resultCheck = $loginDAO->checkAcc($userName,$password) ;

        // If result = false then turn back to login form
        if ( !$resultCheck ){
            return back()->withInput()->with("LoginMeg",ErrorLoginMesg);
        } else{

            //get User Infomation
            $userInfo =  $loginDAO->getUserInfo($userName,$password);
            session(['USER_INFO' => $userInfo]);

            return view('Layout.Index');
        }

    }
}
