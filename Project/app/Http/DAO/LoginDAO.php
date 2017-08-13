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
    public function getUserInfo($userID){
        $result = DB::table('tbl_user')
            ->join('tbl_user_group', 'tbl_user.user_id', '=','tbl_user_group.user_id')
            ->where('tbl_user.user_id',$userID)
            ->get(['tbl_user.user_id', 'tbl_user.user_name' , 'tbl_user_group.group_cd']);
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