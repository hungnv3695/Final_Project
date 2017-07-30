<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/29/2017
 * Time: 3:26 PM
 */

namespace App\Http\Controllers;


use App\Http\DAO\K012DAO;
use App\Models\User;
use Illuminate\Http\Request;

define('SESSION_USER_INFO','USER_INFO');
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
            return redirect('/K012');
        }

    }
}