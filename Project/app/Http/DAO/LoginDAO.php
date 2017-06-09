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
                            Constants::TBL_ACC_LOCK_FLG]);

        return $result;
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

    /**
     * Get User Permission
     * @param $userID
     * @return mixed
     */
    public function getUserInfo($userID){
        $result = DB::table(Constants::USER_GROUP)
                ->join(Constants::PERMISSION,
                    Constants::USER_GROUP . '.' . Constants::TBL_GROUP_CD, '=',
                    Constants::PERMISSION . ' . ' .Constants::TBL_GROUP_CD )
                ->where(Constants::USER_GROUP . '.' . Constants::TBL_USER_ID ,$userID)
                ->get([Constants::PERMISSION . ' . ' .Constants::TBL_SCREEN_ID,
                    Constants::PERMISSION . ' . ' .Constants::TBL_USE_FLG]);

        return  $result;
    }
}