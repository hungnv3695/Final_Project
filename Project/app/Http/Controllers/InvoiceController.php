<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Viet Hung
 * Date: 8/18/2017
 * Time: 11:47 AM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class InvoiceController extends Controller{
    public function viewInvoice(Request $request){
        $service = explode(',', $request->service);
        $quantity = explode(',', $request->quantity);
        $price = explode(',', $request->price);

        return view("Reception.Invoice");
    }
}