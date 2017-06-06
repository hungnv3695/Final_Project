<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/2/2017
 * Time: 10:21 PM
 */

namespace App\Http\DAO;


use App\Role;

class AuthDAO
{
    public function getRole($groupCode, $screenID){
        $roleFlg = Role::where('group_cd',$groupCode)
            ->where('screen_id',$screenID)
            ->get(['role_flg']);

        if (sizeof($roleFlg) == 0){
            return false;
        } else{
            return $roleFlg[0]->role_flg;
        }


    }
}