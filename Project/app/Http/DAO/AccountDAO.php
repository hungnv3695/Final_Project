<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/28/2017
 * Time: 12:38 PM
 */

namespace App\Http\DAO;


use App\Http\Common\Constants;
use App\Http\Common\StringUtil;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\Facades\DB;
class AccountDAO
{
    public function getAccount($searchStr = null,$searchPos = null){
        $searchStr =  StringUtil::Trim($searchStr);

        $query = DB::table('tbl_user')
            ->join('tbl_user_group', 'tbl_user.user_id', '=','tbl_user_group.user_id');


        // search by search string
        if ($searchStr !=  null){
            $query->where(function ($query) use ($searchStr){
                return $query->where('tbl_user.user_id','ILIKE','%' . $searchStr . '%' )
                    ->orwhere('tbl_user.user_name','ILIKE','%' . $searchStr . '%' );
            } );
        }

        //dd($searchPos);
        //search by floor
        if ($searchPos != null && $searchPos!= '0'){
            //$query->where('tbl_room.floor',$searchFloor );
            $query->where(function ($query) use ($searchPos){
                return $query->where('tbl_user_group.group_cd',$searchPos );
            } );
        }

        $query->distinct()
            ->orderBy( Constants::TBL_USER_NAME)
            ->orderBy( Constants::TBL_USER_ID);

        $result = $query->get([
            'tbl_user.user_id',
            'tbl_user.user_name',
            'tbl_user_group.group_cd',
            'tbl_user.acc_lock_flg',
            'tbl_user.delete_flg'
        ]);

        return  $result->toArray();

    }

    public function getAccountDetail($userID){
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
                'tbl_user.identity_card_location',
                'tbl_user.address',
                'tbl_user.identity_card',
                'tbl_user.delete_flg'
            ]);

        return  $result->toArray();
    }

    public function updateUser(User $user , UserGroup $userGroup){
        $userUpdate = User::find($user->getUserID());

        $userUpdate->delete_flg = $user->getDelete();
        $result = $userUpdate->saveOrFail();

        if($result){
            $userGroupUpdate = UserGroup::where(Constants::TBL_USER_ID, '=', $userGroup->getUserID())->firstOrFail();
            $userGroupUpdate->group_cd = $userGroup->getGroup();
            $result= $userGroupUpdate->saveOrFail();
        }
        return $result ;
    }

    public function resetPass(User $user){
        $userUpdate = User::find($user->getUserID());

        $userUpdate->acc_lock_flg = $user->getLock();
        $userUpdate->login_pwd = $user->getPassword();

        $result= $userUpdate->saveOrFail();

        return $result;
    }

    public function createAccount(User $user , UserGroup $userGroup){
        $userAdd = new User();
        $userAdd->user_id = $user->getUserID();
        $userAdd->user_name = $user->getUserName();
        $userAdd->acc_lock_flg = '0';
        $userAdd->delete_flg = $user->getDelete();
        $userAdd->login_pwd = DEFAULT_PASS;

        $result  = $userAdd->saveOrFail();


        if($result){
            $userGroupAdd = new UserGroup();
            $userGroupAdd->user_id = $userGroup->getUserID();
            $userGroupAdd->group_cd = $userGroup->getGroup();
            $result  = $userGroupAdd->saveOrFail();
        }

        return $result;

    }

    public function checkKey($userID){
        $result = User::where(Constants::TBL_USER_ID,$userID)->count();

        if($result!=0){
            return false;
        }else{
            return true;
        }
    }
}