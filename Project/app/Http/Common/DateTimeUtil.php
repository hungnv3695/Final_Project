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

    public static function ConvertDateToString($str){
        $str = (empty($str))?"":str_replace("/","",$str);
        return  (substr($str, 4, 4) .  substr($str, 2, 2).  substr($str, 0, 2));

    }
    public static function ConvertDateToString2($str){
        $str = (empty($str))?"":str_replace("/","",$str);
        return  (substr($str, 0, 4) .  substr($str, 4, 2).  substr($str, 6, 2));

    }
}
