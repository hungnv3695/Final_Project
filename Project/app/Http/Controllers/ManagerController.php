<?php

namespace App\Http\Controllers;

use App\Http\Common\Auth;
use App\Http\Common\Constants;
use App\Http\DAO\AuthDAO;
use Illuminate\Http\Request;
define("ErrorAccess","Access Deny");
class ManagerController extends Controller
{
    public function checkAuth(){
        if(!session()->has('USER_INFO')){
            return 0;
        }

        $authDao = new AuthDAO();

        $groupCode = session()->get('USER_INFO')[0]->group_cd;
        $screenID = Constants::MANEGER_SCREENID;


        $role = $authDao->getRole($groupCode,$screenID);

        // neu role flag = 0 hoac false thi nguoi dung khong co quyen truy cap
        if(!$role || $role == 0 ){
            return 1;

        }

        // duoc quyen truy cap
        return 2;
    }

    //
    public function View(){
       // $flag = $this->checkAuth();

        $flag = Auth::checkAuth(Constants::MANEGER_SCREENID);
        if ($flag == 0 ){

            return view('Layout.LoginForm')->with("ErrorAccess",ErrorAccess);
        } elseif ($flag == 1){

            return view('Layout.Index')->with("ErrorAccess",ErrorAccess);
        }else{
            return view('Layout.Manager');
        }

    }
}
