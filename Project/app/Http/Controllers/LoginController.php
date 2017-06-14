<?php

namespace App\Http\Controllers;

use App\Http\Common\Constants;
use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Http\DAO\LoginDAO;

define('SESSION_NUMBER_LOGIN', 'NUMBER_LOGIN');
define('SESSION_USER_INFO_AUTH','USER_INFO_AUTH');
define('SESSION_USER_INFO','USER_INFO');


class LoginController extends Controller
{
    public function View(){
        return view('login');
    }

    public function getLoginRequest(Request $request){
        $userLogin = new User();

        $userLogin->setUserID($request->userID) ;
        $userLogin->setPassword($request->password);

        $result = $this->CheckAcc($userLogin);

        return $result;
    }
    
    public function CheckAcc(User $userLogin){

        //２．Thực hiện chứng thực login với user ID và password đã được đăng ký vào bảng user.
        $loginDAO = new LoginDAO();

        $userLoginInfo = $loginDAO->getLoginUserInfo($userLogin->getUserID());

        //２．２．Xử lý check
		//Thực hiện các check sau khi lấy xử lý ở trên.
		//・	Màn hình login．User No.　≠　User ID	　≠　User master．　User ID
		//	➡	Hiển thị message lỗi và set focus vào Màn hình login．User No.
        if (sizeof($userLoginInfo) == 0){
            return Constants::MSG0001;
        }


        //User master．Account lock flag	＝”1”
        //➡	Hiển thị message lỗi và set focus vào Màn hình login．User No.
        if(array_get($userLoginInfo[0],Constants::TBL_ACC_LOCK_FLG) == 1){
            return Constants::MSG0002;
        }

        //User master．delete_flg	＝　			”1”
        //➡	Hiển thị message thông báovà set focus vào Màn hình login．User No.
        if(array_get($userLoginInfo[0],Constants::TBL_DELETE_FLG) == 1){
            return Constants::MSG0002;
        }

        //Login screen．Login password ≠ ser master．Login password
        if (strcmp($userLogin->getPassword(),array_get($userLoginInfo[0],Constants::TBL_LOGIN_PWD)) <> 0){
            //➡	Trường hợp login thất bại 3 lần liên tiếp thì set ”１” cho User master．Account lock flag,																														Message ID：MSG0004
            //hiển thị message lỗi và set focus vào Màn hình login．User N

            //Get number of login
            $numberLogin = session()->get(SESSION_NUMBER_LOGIN);

            if ($numberLogin == null){
                $numberLogin =1;
            }

            if($numberLogin >= 3){

                $loginDAO->setAccLock($userLogin->getUserID());
            } else{

                //Set NUMBER_LOGIN increment
                $numberLogin = $numberLogin + 1  ;
                session()->forget(SESSION_NUMBER_LOGIN);
                session()->put(SESSION_NUMBER_LOGIN,$numberLogin);

            }

            return Constants::MSG0004;
        }


        //２．４．　Sau khi thực hiện các xử lý check phía trên, nếu không có error xảy ra:
		//・Sử dụng common function lấy ra toàn bộ các màn hình mà user có thể sử dụng được và
        // quyền cao nhất của user với màn hình đấy.
        //Data lấy được lưu trong login user info.
        $userInfo = $loginDAO->getUserPermission(array_get($userLoginInfo[0],Constants::TBL_USER_ID));
        session()->forget(SESSION_NUMBER_LOGIN);
        session(SESSION_USER_INFO_AUTH,$userInfo);
        session(SESSION_USER_INFO,$userLoginInfo);
    }
}
