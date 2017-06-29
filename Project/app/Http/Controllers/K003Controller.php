<?php
namespace App\Http\Controllers;
use App\Http\DAO\K003_DAO;
use App\Http\DAO\LoginDAO;
use Illuminate\Http\Request;
use App\User;
use Symfony\Component\HttpFoundation\Response;

class K003Controller extends Controller{
    public function View(){

        return view('Reception.xxx');
    }

    public function getUserInfor(Request $request){

        $fname = $request->fname;
        $lname = $request->lname;
        $K003_DAO = new K003_DAO();
        $guest = $K003_DAO->getGuest($fname,$lname);
        $guest = json_encode($guest);

        //dd($guest);
        return response()->json($guest);

    }
}