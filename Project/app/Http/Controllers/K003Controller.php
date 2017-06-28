<?php
namespace App\Http\Controllers;
use App\Http\DAO\LoginDAO;
use Illuminate\Http\Request;
use App\User;
use Symfony\Component\HttpFoundation\Response;

class K003Controller extends Controller{
    public function View(){

        return view('Reception.xxx');
    }

    public function getUserInfor(){
        $loginDAO = new loginDAO();
        $guest = $loginDAO->getGuest();
        $guest = json_encode($guest);


        //dd($guest);
        return response()->json($guest);

    }
}