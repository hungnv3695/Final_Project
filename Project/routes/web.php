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

Route::get('/','K008Controller@View');

Route::get('/K001','K001Controller@View');
Route::post('/K001','K001Controller@getLoginRequest');


Route::get('/K004_1','K004Controller@K004_1_View');
Route::get('/K004_1/searchReservation','K004Controller@getReservation');
Route::get('/K004_1/GetStatus','K004Controller@getReservationStatus');
Route::post('/K004','K004Controller@postUserInfor');

Route::get('/K004_1/K004_2/View','K004Controller@K004_2_View');
Route::get('/K004_1/K004_2','K004Controller@GetReservationDetail');

Route::get('/Menu','K002Controller@K002_1_View');
