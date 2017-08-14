<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/12/2017
 * Time: 2:19 PM
 */

namespace App\Http\Controllers;


use App\Http\Common\Constants;
use App\Http\Common\Message;
use App\Http\Common\StringUtil;
use App\Http\DAO\AccountantDAO;
use App\Models\Accountant;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function view(){
        return view('Accountant.PaymentList');
    }

    public function viewUpdate(Request $request){
        $name = $request->name;
        $date = $request->date;
        $total = $request->total;

        return view('Accountant.UpdatePayment',compact('name','date','total'));
    }

    public function getAccountantList(Request $request){
        $date = $request->date;
        $accountantDAO = new AccountantDAO();

        $accountantList = $accountantDAO->getAccountantList($date);
        $statusList = array();
        foreach ($accountantList as $data){
           $status = $accountantDAO->getStatus(str_replace("-","",$data->update_ymd),$data->updater_nm);
           if(sizeof($status) == 0) {

               array_push($statusList,0);
           }else{

               array_push($statusList,1);
           }
        }
        return view('Accountant.PaymentList',compact('accountantList','statusList'));
    }

    public function getUpdateRequest(Request $request){
        $acc = new Accountant();
        $accountantDAO = new AccountantDAO();

        if(strcmp( StringUtil::RemoveSpecialChar($request->txtMoney) , StringUtil::RemoveSpecialChar($request->txtMoneyReceived) ) != 0){
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0038);
        }

        $acc->setName($request->txtPayer);
        $acc->setDate($request->txtDate);
        $acc->setTotal(StringUtil::RemoveSpecialChar($request->txtMoney) );
        $acc->setReceiveTotal(StringUtil::RemoveSpecialChar($request->txtMoneyReceived));
        $result  = $accountantDAO->insertPayment($acc);


        if ($result){
           return  redirect('/AccountantList')->with(Constants::SUCCESS_MSG,Message::MSG0037);
        }else{
            return back()->withInput()->with(Constants::ERROR_MSG,Message::MSG0017);
        }



    }
}