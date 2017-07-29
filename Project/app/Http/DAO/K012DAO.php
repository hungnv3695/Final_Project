<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/29/2017
 * Time: 3:29 PM
 */

namespace App\Http\DAO;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class K012DAO
{
    public function getInfo($userID){
        $result = DB::table('tbl_user')
            ->join('tbl_user_group', 'tbl_user.user_id', '=','tbl_user_group.user_id')
            ->where('tbl_user.user_id',$userID)
            ->get([
                'tbl_user.user_id',
                'tbl_user.user_name',
                'tbl_user_group.group_cd',
                'tbl_user.acc_lock_flg',
                'tbl_user.phone',
                'tbl_user.mail',
                'tbl_user.tax_code',
                'tbl_user.address',
                'tbl_user.identity_card',
                'tbl_user.delete_flg',
                'tbl_user.register_ymd'
            ]);

        return  $result->toArray();
        return true;
    }


    public function updateInfo(User $user){
        $userUpdate = User::find($user->getUserID());

        $userUpdate->user_name  = $user->getUserName() ;
        $userUpdate->phone = $user->getPhone() ;
        $userUpdate->mail = $user->getMail() ;
        $userUpdate->identity_card = $user->getIdentityCard() ;
        $userUpdate->tax_code = $user->getTaxCode()  ;
        $userUpdate->address = $user->getAddress() ;

        $result = $userUpdate->saveOrFail();

        return $result;
    }
}