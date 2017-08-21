<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/21/2017
 * Time: 11:08 AM
 */

namespace App\Http\Common;


use Faker\Provider\File;
use Illuminate\Support\Facades\Storage;



class FileUtil
{
    public static function readFile($fileName){
        $contents =  $contents = Storage::disk('local')->get('BookInfo/'.$fileName);

        $arr = array();
        $pieces = explode("\n", $contents);

        foreach ($pieces as $data){
            $value = explode(":",$data);
            $arr[$value[0]] = $value[1];
        }
        
        return $arr;
    }

    public static function writeFile($fileName,$array){
        $txt = Constants::GUEST_ID . ': ' . array_get($array,Constants::GUEST_ID) . "\n";
        $txt .= Constants::CHECK_IN . ': ' . array_get($array,Constants::CHECK_IN). "\n";
        $txt .= Constants::CHECK_OUT . ': ' . array_get($array,Constants::CHECK_OUT). "\n";
        $txt .= Constants::ADULT . ':' . array_get($array,Constants::ADULT). "\n";
        $txt .= Constants::CHILDREN . ': ' . array_get($array,Constants::CHILDREN). "\n";
        $txt .= Constants::NOTE . ': ' . array_get($array,Constants::NOTE). "\n";
        $txt .= Constants::ROOM_TYPE . ': ' . array_get($array,Constants::ROOM_TYPE). "\n";
        $txt .= Constants::ROOM_QUANTITY . ': ' . array_get($array,Constants::ROOM_QUANTITY) . "\n" ;
        $txt .= Constants::NIGHT . ': ' . array_get($array,Constants::NIGHT);

        Storage::disk('local')->put('BookInfo/'.$fileName, $txt);
    }

    public static function deleteFile($fileName){
        Storage::delete('BookInfo/'.$fileName);
    }
}