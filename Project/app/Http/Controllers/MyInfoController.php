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
use App\Http\DAO\MyInfoDAO;
use App\Models\User;
use Illuminate\Http\Request;

define('SESSION_USER_INFO','USER_INFO');
define('CHANGE_PASS_MSG','ErrorMSG');

class MyInfoController extends Controller
{
    public function view(){

        if ( !session()->has(SESSION_USER_INFO) ){
           return redirect('/Login');
        }else{
            $user  = $this->getInfo();
            return view('Common.MyInfo',compact('user'));
        }
    }

    public function getInfo(){
        $myInfoDAO = new MyInfoDAO();
        $userID = session()->get(SESSION_USER_INFO)->user_id;

        $result = $myInfoDAO->getInfo($userID);
        return $result;
    }

    public function getUpdateRequest(Request $request){
        $user = new User();
        $myInfoDAO = new MyInfoDAO();

        $user->setUserID($request->txtAccountName);
        $user->setUserName($request->txtFullName);
        $user->setAddress($request->txtAddress);
        $user->setIdentityCard($request->txtIdCard);
        $user->setPhone($request->txtPhone);
        $user->setLocation($request->txtLocation);
        $user->setMail($request->txtEmail);

        $result = $myInfoDAO->updateInfo($user);

        if($result){
            return redirect('/MyInfo')->with( Constants::SUCCESS_MSG,Message::MSG0018);
        }

    }

    public function viewChangePasswordPage(){
        if ( !session()->has(SESSION_USER_INFO) ){
            return redirect('/Login');
        }else{
            $user = session()->get(SESSION_USER_INFO)->user_id;
            return view('Common.ChangePassword',compact('user'));
        }
    }

    public function changePasswordRequest(Request $request){
        $user =  $request->txtAccountName;
        $oldPass = $request->txtOldPwd;
        $newPass = $request->txtNewPwd;
        $confirm = $request->txtConfirmNewPwd;

        $myInfoDAO = new MyInfoDAO();


        if ($oldPass==$newPass){
            return back()->with(CHANGE_PASS_MSG, Message::MSG0034);
        }elseif($newPass !=$confirm ){
            return back()->with(CHANGE_PASS_MSG, Message::MSG0035);
        }

        $result = $myInfoDAO->checkPassword($user,$oldPass);

        if(!$result) {
            return back()->with(CHANGE_PASS_MSG, Message::MSG0015);
        }else{
            $result = $myInfoDAO->updatePassword($user,$newPass);
            if($result){
                return redirect('/MyInfo')->with( Constants::SUCCESS_MSG,Message::MSG0016);
            }else{
                return back()->with(CHANGE_PASS_MSG, Message::MSG0017);
            }
        }
    }
}