<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/21/2017
 * Time: 11:08 AM
 */

namespace App\Http\Common;


class FileUtil
{
    public static function readFile($fileName){
        $myfile = fopen($fileName, "r") or die("Unable to open file!");
        $info = fgets($myfile);
        fclose($myfile);

        return $info;
    }

    public static function writeFile($fileName,$txt){
        $myfile = fopen($fileName, "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    public static function deleteFile($fileName){
        if (!unlink($fileName))
        {
            return  1;
        }
        else
        {
            return 0;
        }
    }
}