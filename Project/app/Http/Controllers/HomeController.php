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
    public function viewRoom(){
        return view('Guest.Room');
    }
    public function viewCuisine(){
        return view('Guest.Cuisine');
    }
    public function viewService(){
        return view('Guest.Services');
    }
    public function viewGallery(){
        return view('Guest.Gallary');
    }


}