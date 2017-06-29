<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','LoginController@View');
Route::post('/','LoginController@getLoginRequest');

Route::get('/Login','LoginController@View');
Route::post('/Login','LoginController@getUserInfor');


Route::get('/K003','K003Controller@View');
Route::get('/K003/Id','K003Controller@getUserInfor');
//Route::post('/K003/Id','K003Controller@getUserInfor');
Route::post('/K003','K003Controller@postUserInfor');

Route::get('/index',function(){
    return view('index');
});
