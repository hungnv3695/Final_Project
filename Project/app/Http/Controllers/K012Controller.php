<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/29/2017
 * Time: 3:26 PM
 */

namespace App\Http\Controllers;


use App\Http\Common\Constants;
use App\Http\Common\Message;
use App\Http\DAO\K012DAO;
use App\Models\User;
use Illuminate\Http\Request;

define('SESSION_USER_INFO','USER_INFO');
define('CHANGE_PASS_MSG','ChangePassMSG');
class K012Controller
{
    public function view(){

        if ( !session()->has(SESSION_USER_INFO) ){
           return redirect('/K001');
        }else{
            $user  = $this->getInfo();
            return view('Common.K012',compact('user'));
        }
    }

    public function getInfo(){
        $k012DAO = new K012DAO();
        $userID = session()->get(SESSION_USER_INFO)->user_id;

        $result = $k012DAO->getInfo($userID);
        return $result;
    }

    public function getUpdateRequest(Request $request){
        $user = new User();
        $k012DAO = new K012DAO();

        $user->setUserID($request->txtAccountName);
        $user->setUserName($request->txtFullName);
        $user->setAddress($request->txtAddress);
        $user->setIdentityCard($request->txtIdCard);
        $user->setPhone($request->txtPhone);
        $user->setTaxCode($request->txtTax);
        $user->setMail($request->txtEmail);

        $result = $k012DAO->updateInfo($user);

        if($result){
            return redirect('/K012')->with( Constants::SUCCESS_MSG,Message::MSG0018);
        }

    }

    public function viewChangePasswordPage(){
        if ( !session()->has(SESSION_USER_INFO) ){
            return redirect('/K001');
        }else{
            $user = session()->get(SESSION_USER_INFO)->user_id;
            return view('Common.K012_1',compact('user'));
        }
    }

    public function changePasswordRequest(Request $request){
        $user =  $request->txtAccountName;
        $oldPass = $request->txtOldPwd;
        $newPass = $request->txtNewPwd;

        $k012DAO = new K012DAO();
        $result = $k012DAO->checkPassword($user,$oldPass);

        if(!$result) {
            return back()->with(CHANGE_PASS_MSG, Message::MSG0015);
        }else{
            $result = $k012DAO->updatePassword($user,$newPass);
            if($result){
                return redirect('/K012')->with( Constants::SUCCESS_MSG,Message::MSG0016);
            }else{
                return back()->with(CHANGE_PASS_MSG, Message::MSG0017);
            }
        }
    }
}