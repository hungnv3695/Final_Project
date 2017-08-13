<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/29/2017
 * Time: 10:25 AM
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function view(){
        return view('Guest.Home');
    }
}