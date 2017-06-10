<?php

/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/2/2017
 * Time: 9:14 PM
 */

namespace App\Http\DAO;
use App\Http\Common\Constants;
use App\User;
use App\UserGroup;
use App\UserMaster;
use Illuminate\Support\Facades\DB;

class LoginDAO
{

    /**
     * get User Login infomation
     * @param $userID
     * @return mixed
     */
    public function getLoginUserInfo($userID){
        $result = User::where(Constants::TBL_USER_ID,$userID)
                    -> get([Constants::TBL_USER_ID,
                            Constants::TBL_USER_NAME,
                            Constants::TBL_LOGIN_PWD,
                            Constants::TBL_ACC_LOCK_FLG,
                            Constants::TBL_DELETE_FLG]);

        return $result->toArray();
    }

    /**
     * Get User Permission
     * @param $userID
     * @return mixed
     */
    public function getUserPermission($userID){
        $result = DB::table('t_user_group')
            ->join('t_permission', 't_user_group.group_cd', '=','t_permission.group_cd')
            ->where('t_user_group.user_id',$userID)
            ->get(['t_permission.screen_id', 't_permission.use_flg']);

        return  $result->toArray();
    }

    /**
     * set Account to lock
     * @param $userID
     * @return bool
     */
    public function setAccLock($userID){
        $result = User::where(Constants::TBL_USER_ID,$userID)
                    ->update([Constants::TBL_ACC_LOCK_FLG=>1]);

        if ($result){
            return true;
        } else{
            return false;
        }
    }
}