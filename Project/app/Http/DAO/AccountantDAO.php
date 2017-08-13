<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/12/2017
 * Time: 2:20 PM
 */

namespace App\Http\DAO;


use App\Http\Common\Constants;
use App\Models\Accountant;
use Illuminate\Support\Facades\DB;

class AccountantDAO
{
    public function getAccountantList($date){
        $query =   " select updater_nm , COUNT(id) , CAST(update_ymd as date) , SUM(amount_total) " .
            "        from tbl_invoice " .
        "            where CAST(update_ymd as date) = '".$date."' " .
        "            and payment_flag = 1 ".
        "            and updater_nm is not null ".
        "            Group by updater_nm,update_ymd " .
        "            order by updater_nm " ;

        $result = DB::select($query);
        return $result;
    }

    public function getStatus($date,$payment_nm){
        $result = Accountant::where(Constants::TBL_PAYMENT_DATE,$date)
            ->where(Constants::TBL_PAYMENT_NAME,$payment_nm)
            ->get([
                Constants::TBL_PAYMENT_STATUS
            ]);
        return $result;
    }

    public function insertPayment(Accountant $acc){


        $accInsert = new Accountant();
        $accInsert->payment_nm = $acc->getName();
        $accInsert->payment_ymd = str_replace("-","",$acc->getDate());
        $accInsert->total = $acc->getTotal();
        $accInsert->receiver_nm = session()->get(SESSION_USER_INFO)->user_name;
        $accInsert->create_ymd = date("Y/m/d");
        $accInsert->receiver_total = $acc->getReceiveTotal();

        $result = $accInsert->saveOrFail();



        if($result){
            return true;
        }else{
            return false;
        }
    }
}