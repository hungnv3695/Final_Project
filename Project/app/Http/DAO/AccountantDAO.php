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
        $query = " SELECT invoice_detail.updater_nm, count (invoice_detail.updater_nm), CAST(invoice_detail.update_ymd as date) ,SUM(invoice_detail.price) " .
                " FROM tbl_invoice invoice  ".
                " INNER JOIN tbl_invoice_detail invoice_detail ".
                " ON invoice.id = invoice_detail.invoice_id ".
                " WHERE CAST(invoice_detail.update_ymd as date) = '".$date."' ".
                "         AND invoice_detail.payment_flag = 1 ".
                "         AND invoice_detail.updater_nm IS NOT null  ".
                " GROUP BY invoice_detail.updater_nm, invoice_detail.update_ymd ".
                " ORDER BY invoice_detail.updater_nm ";



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