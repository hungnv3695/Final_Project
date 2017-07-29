<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/28/2017
 * Time: 12:30 PM
 */

namespace App\Http\Controllers;

use App\Http\Common\Constants;
use App\Http\DAO\K011DAO;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
define('DEFAULT_PASS','123456');
define('UNLOCK','0');
class K011Controller extends Controller
{
    public function view(){
        return view('Manager.K011_1');
    }

    public function getViewAccountRequest(Request $request = null){
        $k011 = new K011DAO();

        switch ($request){
            case isset($request->btnListall):
                $acc = $k011->getAccount();
                return view('Manager.K011_1',compact('acc'));
                break;
            case isset($request->btnSearch) || isset($request->searchtxt):


                $searchStr = $request->searchtxt;
                $searchPos = $request->Position;
                $acc = $k011->getAccount($searchStr,$searchPos);
                return view('Manager.K011_1',compact('acc','searchStr','searchPos'));
        }
    }

    public function viewDetail($userID){
        $k011DAO = new K011DAO();
        $acc = $k011DAO->getAccountDetail($userID);

        return view('Manager.K011_2',compact('acc'));
    }

    public function getUpdateRequest(Request $request , $userID){
        $k011DAO = new K011DAO();
        $result = false;

        if ($request->bntSave){
            $pos = $request->Position;
            $status = $request->Status;

            $user = new User();
            $userGroup = new UserGroup();

            $user->setUserID($userID);
            $userGroup->setUserID($userID);
            $userGroup->setGroup($pos);
            $user->setDelete($status);

            $result = $k011DAO->updateUser($user,$userGroup);


        } elseif($request->btnReset){
            $user = new User();
            $user->setUserID($userID);
            $user->setPassword(DEFAULT_PASS);
            $user->setLock(UNLOCK);

            $result = $k011DAO->resetPass($user);

        }

        if($result){
            $acc = $k011DAO->getAccount();
            return view('Manager.K011_1',compact('acc'));
        }else{
            return 'sasa';
        }
    }

    public function viewAddPage(){
        return view('Manager.K011_3');
    }

    public function addAccountRequest(Request $request){

        $user = new User();
        $userGroup = new UserGroup();

        $user->setUserID($request->txtUserName);
        $user->setUserName($request->txtFullName);
        $userGroup->setUserID($request->txtUserName);
        $userGroup->setGroup($request->Position);

        $k011DAO = new K011DAO();

        if($k011DAO->checkKey($request->txtUserName)){
            $result = $k011DAO->createAccount($user,$userGroup);

            if($result){
                $acc = $k011DAO->getAccount();
                return view('Manager.K011_1',compact('acc'));
            }else{
                return 'sasa';
            }
        }else{
            return back()->withInput();
        }



    }

}