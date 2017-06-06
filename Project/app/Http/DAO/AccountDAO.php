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
class AccountDAO
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

    public function insertUserMaster($userInfo){
        // Insert Into User Master
        $userMaster = new UserMaster();

        $userMaster->user_id = array_get($userInfo,"userID");
        $userMaster->user_name = array_get($userInfo,"userName");
        $userMaster->login_pwd = array_get($userInfo,"password");
        $userMaster->phone = array_get($userInfo,"phone");
        $userMaster->email = array_get($userInfo,"email");
        $userMaster->address = array_get($userInfo,"address");
        $userMaster->pwd_regs_ymd = date(TIME_FORMAT);
        $userMaster->register_ymd = date(TIME_FORMAT);
        $userMaster->register_code = session()->get("USER_INFO")[0]->user_id;
        $userMaster->register_name = session()->get("USER_INFO")[0]->user_name;
        $userMaster->edit_ymd = date(TIME_FORMAT);
        $userMaster->editor_cd = session()->get("USER_INFO")[0]->user_id;;
        $userMaster->editor_name = session()->get("USER_INFO")[0]->user_name;

        $result = $userMaster->saveOrFail();

        return $result;
    }

    public function insertUserGroup($userInfo){
        $userGroup = new UserGroup();

        $userGroup->user_id = array_get($userInfo,"userID") ;
        $userGroup->group_cd = array_get($userInfo,"group") ;
        $userGroup->register_ymd = date(TIME_FORMAT);
        $userGroup->register_code = session()->get("USER_INFO")[0]->user_id;
        $userGroup->register_name = session()->get("USER_INFO")[0]->user_name;
        $userGroup->edit_ymd = date(TIME_FORMAT);
        $userGroup->editor_cd = session()->get("USER_INFO")[0]->user_id;;
        $userGroup->editor_name = session()->get("USER_INFO")[0]->user_name;

        $result = $userGroup->saveOrFail();
        return $result;
    }

    public function insertNewAccout($userInfo){
       $result = $this->insertUserMaster($userInfo);

       if(!$result){
           return false;
       }

       $result = $this->insertUserGroup($userInfo);
        if(!$result){
            return false;
        }
        return true;

    }
}