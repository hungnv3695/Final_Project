<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/6/2017
 * Time: 9:50 AM
 */

namespace App\Http\Common;
use App\Http\DAO\AuthDAO;

class Auth
{
    public static function checkAuth($screenID){
        if(!session()->has('USER_INFO')){
            return 0;
        }

        $authDao = new AuthDAO();

        $groupCode = session()->get('USER_INFO')[0]->group_cd;
        $role = $authDao->getRole($groupCode,$screenID);

        // neu role flag = 0 hoac false thi nguoi dung khong co quyen truy cap
        if(!$role || $role == 0 ){
            return 1;

        }

        // duoc quyen truy cap
        return 2;
    }
}