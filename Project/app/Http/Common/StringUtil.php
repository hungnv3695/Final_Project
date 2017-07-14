<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/12/2017
 * Time: 8:32 PM
 */

namespace App\Http\Common;


class StringUtil
{
    public static function Trim($string){
        if($string== null){
            return null;
        }else{
            $str = trim($string);

            $str =  preg_replace('/\s\s+/', ' ', $str);

            return $str;
        }

    }
}