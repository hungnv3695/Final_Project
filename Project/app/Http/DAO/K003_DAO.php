<?php

/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 6/2/2017
 * Time: 9:14 PM
 */

namespace App\Http\DAO;
use App\Http\Common\Constants;
use App\User;
use App\UserGroup;
use App\UserMaster;
use Illuminate\Support\Facades\DB;

class K003_DAO{
    public function getGuest($fname,$lname){

        $t1 = 'UPPER(first_name) LIKE \'%' . strtoupper(trim($fname)) . '%\'';

        $t2 = 'UPPER(last_name) LIKE \'%' . strtoupper(trim($lname)) . '%\'';

        //$result = DB::table('tbl_guest')->get(['id','first_name','last_name','phone','country']);
        $sqlStr = 'SELECT id, first_name, last_name, email, phone, country ';
        $sqlStr .=  'FROM public.tbl_guest ';
        $sqlStr .= (strcmp($fname, "") == 0 && strcmp($lname,"") == 0) ? "":"where ";
        $sqlStr .= strcmp($fname,"") == 0 ? "": $t1;
        $sqlStr .= (strcmp($fname, "") == 0 && strcmp($lname,"") !== 0) ? $t2: "";
        $sqlStr .= (strcmp($fname, "") !== 0 && strcmp($lname,"") !== 0) ? ' AND ' . $t2: "";
        //$sqlStr .= strcmp($lname,"") == 0 ? "":' AND ' . $t2;
        $result = DB::select(DB::raw($sqlStr));

        return $result;
    }
}