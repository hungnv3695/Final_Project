<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/28/2017
 * Time: 12:30 PM
 */

namespace App\Http\Controllers;

use App\Http\Common\Constants;
use App\Http\Common\Message;
use App\Http\DAO\AccountDAO;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
define('DEFAULT_PASS','123456');
define('UNLOCK','0');
class AccountController extends Controller
{
    public function view(){
        return view('Manager.AccountList');
    }

    public function getViewAccountRequest(Request $request = null){
        $accoutnDAO = new AccountDAO();

        switch ($request){
            case isset($request->btnListall):
                $acc = $accoutnDAO->getAccount();
                return view('Manager.AccountList',compact('acc'));
                break;
            case isset($request->btnSearch) || isset($request->searchtxt):


                $searchStr = $request->searchtxt;
                $searchPos = $request->Position;
                $acc = $accoutnDAO->getAccount($searchStr,$searchPos);
                return view('Manager.AccountList',compact('acc','searchStr','searchPos'));
        }
    }

    public function viewDetail($userID){
        $accoutnDAO = new AccountDAO();
        $acc = $accoutnDAO->getAccountDetail($userID);

        return view('Manager.AccountDetail',compact('acc'));
    }

    public function getUpdateRequest(Request $request , $userID){
        $accoutnDAO = new AccountDAO();
        $result = false;
        $successMSG = "";
        $errorMSG ="";

        if ($request->bntSave){
            $pos = $request->Position;
            $status = $request->Status;

            $user = new User();
            $userGroup = new UserGroup();

            $user->setUserID($userID);
            $userGroup->setUserID($userID);
            $userGroup->setGroup($pos);
            $user->setDelete($status);

            $result = $accoutnDAO->updateUser($user,$userGroup);
            $successMSG = Message::MSG0027 ;
            $errorMSG = Message::MSG0029;


        } elseif($request->btnReset){
            $user = new User();
            $user->setUserID($userID);
            $user->setPassword(DEFAULT_PASS);
            $user->setLock(UNLOCK);

            $result = $accoutnDAO->resetPass($user);
            $successMSG = Message::MSG0028;
            $errorMSG = Message::MSG0030;

        }

        if($result){
            return redirect('/AccountList')->with(Constants::SUCCESS_MSG,$successMSG);
        }else{
            return back()->withInput()->with(Constants::ERROR_MSG,$errorMSG);
        }
    }

    public function viewAddPage(){
        return view('Manager.AddAccount');
    }

    public function addAccountRequest(Request $request){

        $user = new User();
        $userGroup = new UserGroup();

        $user->setUserID($request->txtUserName);
        $user->setUserName($request->txtFullName);
        $user->setDelete($request->Status);
        $userGroup->setUserID($request->txtUserName);
        $userGroup->setGroup($request->Position);

        $accoutnDAO = new AccountDAO();

        if($accoutnDAO->checkKey($request->txtUserName)){
            $result = $accoutnDAO->createAccount($user,$userGroup);

            if($result){
                return redirect('/AccountList')->with(Constants::SUCCESS_MSG,Message::MSG0032 );
            }else{
                return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0033);
            }
        }else{
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0031);
        }



    }

}