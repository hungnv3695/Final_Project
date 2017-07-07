<?php

/**
 * Created by PhpStorm.
 * User: Nguyen Viet Hung
 * Date: 7/6/2017
 * Time: 11:20 AM
 */
namespace App\Http\Common;
class DateTimeUtil{
    public static function ConvertStringToDate($str){
        return (empty($str)|| strlen($str)!==8) ? "":
            (substr($str, 6, 2) . "/" . substr($str, 4, 2). "/" . substr($str, 0, 4));
    }
}
