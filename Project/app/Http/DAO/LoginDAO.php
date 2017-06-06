<?php

/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/2/2017
 * Time: 9:14 PM
 */

namespace App\Http\DAO;
use App\UserGroup;
use App\UserMaster;
use Illuminate\Support\Facades\DB;
define("TIME_FORMAT","m/d/Y");
class LoginDAO
{
    public function checkAcc($userName,$password){
        $result = UserMaster::where('user_name',$userName)
            ->where('login_pwd',$password)
            ->where('delete_flg',0)
            ->count();

        if ($result == 0){

           return false;
        } else{

            return   true;
        }
    }

    public function getUserInfo($userName,$password){
        $result = DB::table('tbl_user_master')
            ->join('tbl_user_group','tbl_user_master.user_id','=','tbl_user_group.user_id')
            ->where('tbl_user_master.user_name',$userName)
            ->where('tbl_user_master.login_pwd',$password)
            ->get(['tbl_user_master.user_id','tbl_user_master.user_name','tbl_user_group.group_cd']);

        if(sizeof($result) ==0 ){
            return false;
        }else{
            return $result;
        }
    }
}