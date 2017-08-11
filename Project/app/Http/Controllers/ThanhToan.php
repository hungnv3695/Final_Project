<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/10/2017
 * Time: 1:20 PM
 */

namespace App\Http\Controllers;


use App\Http\Common\Constants;

class ThanhToan extends Controller
{
    public function view(){
        return view('Common.ThanhToan');
    }
}