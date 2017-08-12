<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/27/2017
 * Time: 3:03 PM
 */

namespace App\Http\Controllers;

define('GROUP_MANAGER' , 'G01');
define('GROUP_RECEPTIONIST' , 'G02');
define('GROUP_ACCOUNTANT' , 'G03');
define('SESSION_USER_INFO','USER_INFO');

class K002Controller extends Controller
{
    public function view(){
        $groupcd = session()->get(SESSION_USER_INFO)->group_cd;

        if( strcmp($groupcd, GROUP_MANAGER  ) == 0 ){
            return view('Manager.K002_1');
        } elseif( strcmp( $groupcd, GROUP_RECEPTIONIST) == 0 ) {
            return view('Reception.K002_1');
        }elseif (strcmp( $groupcd, GROUP_ACCOUNTANT) == 0){
            return view('Accountant.Accountant');
        }
        else{
            return redirect('/K001');
        }
    }
}