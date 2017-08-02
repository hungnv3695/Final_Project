<?php

namespace App\Http\Controllers;

use App\Http\Common\Constants;
use App\Http\Common\Message;
use App\Http\DAO\K001DAO;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookInfo;

define('SESSION_NUMBER_LOGIN', 'NUMBER_LOGIN');
define('SESSION_USER_INFO','USER_INFO');
define('LOGIN_ERROR_MSG','LoginErroMsg');
define('GROUP_MANAGER' , 'G01');
define('GROUP_RECEPTIONIST' , 'G02');

/**
 * Class K001Controller
 * @package App\Http\Controllers
 */
class K001Controller extends Controller
{
    /**
     * show Login Form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(){

        return view('Common.K001_1');
    }

    public function logOut(){
        session()->flush();
        return redirect('/K001');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getLoginRequest(Request $request){
        $userLogin = new User();

        $userLogin->setUserID($request->userID) ;
        $userLogin->setPassword($request->password);

        $result = $this->CheckAcc($userLogin);

        switch ($result){
            case 1:
                return back()->withInput()->with(LOGIN_ERROR_MSG,Message::MSG0001);
                break;
            case 2:
                return back()->withInput()->with(LOGIN_ERROR_MSG,Message::MSG0002);
                break;
            case 3:
                return back()->withInput()->with(LOGIN_ERROR_MSG,Message::MSG0003);
                break;
            case 4:
                return back()->withInput()->with(LOGIN_ERROR_MSG,Message::MSG0004);
                break;
            case 5:
                //２．４．　Sau khi thực hiện các xử lý check phía trên, nếu không có error xảy ra:
                //・Sử dụng common function lấy ra toàn bộ các màn hình mà user có thể sử dụng được và
                // quyền cao nhất của user với màn hình đấy.
                //Data lấy được lưu trong login user info.
                $loginDAO = new K001DAO();
                $userInfo = $loginDAO->getUserInfo($userLogin->getUserID());

                session()->forget(SESSION_NUMBER_LOGIN);
                session()->put(SESSION_USER_INFO,$userInfo[0]);

                //if( strcmp($userInfo[0]->group_cd, GROUP_MANAGER  ) == 0 ){
                 //   return view('Manager.K002_1');
                //} elseif( strcmp( $userInfo[0]->group_cd, GROUP_RECEPTIONIST) == 0 ) {
               //     return view('Reception.K002_1');
                //}

                //send Email
                Mail::to('sondcse03564@fpt.edu.vn')->send(new BookInfo());

                /*
                $data = ['HoTen'=>'SonDC'];

                Mail::send('Email.BookInfo',$data,function ($msg){

                    $msg->from('sondcnd@gmail.com','SonDC');
                    $msg->to('sondcse03564@fpt.edu.vn')->subject('Day la mail cua SonDC');
                });
                */

                return redirect('/K002');

                break;
        }
    }

    /**
     * check UserID and Password is correct
     * @param User $userLogin
     * @return int
     */
    public function CheckAcc(User $userLogin){

        //２．Thực hiện chứng thực login với user ID và password đã được đăng ký vào bảng user.
        $loginDAO = new K001DAO();

        $userLoginInfo = $loginDAO->getLoginUserInfo($userLogin->getUserID());

        //２．２．Xử lý check
		//Thực hiện các check sau khi lấy xử lý ở trên.
		//・	Màn hình login．User No.　≠　User ID	　≠　User master．　User ID
		//	➡	Hiển thị message lỗi và set focus vào Màn hình login．User No.
        if (sizeof($userLoginInfo) == 0){
            return 1;
        }


        //User master．Account lock flag	＝”1”
        //➡	Hiển thị message lỗi và set focus vào Màn hình login．User No.
        if(array_get($userLoginInfo[0],Constants::TBL_ACC_LOCK_FLG) == 1){
            return 2;
        }

        //User master．delete_flg	＝　			”1”
        //➡	Hiển thị message thông báovà set focus vào Màn hình login．User No.
        if(array_get($userLoginInfo[0],Constants::TBL_DELETE_FLG) == 1){
            return 3;
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

            if($numberLogin > 3){

                $loginDAO->setAccLock($userLogin->getUserID());
            } else{

                //Set NUMBER_LOGIN increment
                $numberLogin = $numberLogin + 1  ;
                session()->forget(SESSION_NUMBER_LOGIN);
                session()->put(SESSION_NUMBER_LOGIN,$numberLogin);

            }

            return 4;
        }

        return 5;
    }
}
