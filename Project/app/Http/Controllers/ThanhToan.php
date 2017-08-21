<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/10/2017
 * Time: 1:20 PM
 */

namespace App\Http\Controllers;


use App\Http\Common\Constants;
use App\Http\Common\FileUtil;

class ThanhToan extends Controller
{
    public function view(){
        $fileName = 'Test.txt';
        $arr = array();
        $arr[Constants::GUEST_ID] = '01';
        $arr[Constants::GUEST_ID]='01';
        $arr[Constants::CHECK_IN]='20170808';
        $arr[Constants::CHECK_OUT]='20170808';
        $arr[Constants::ADULT]='1';
        $arr[Constants::CHILDREN]='1';
        $arr[Constants::NOTE]='gai xinh';
        $arr[Constants::ROOM_TYPE]='RS01';
        $arr[Constants::ROOM_QUANTITY]='1';
        $arr[Constants::NIGHT]='1';

        FileUtil::writeFile($fileName,$arr);

        FileUtil::readFile($fileName);
    }
}