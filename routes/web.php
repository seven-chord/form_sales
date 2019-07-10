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

use App\To_company;
use Illuminate\Http\Request;
use Carbon\Carbon;





Route::get('/', function () {
    return view('welcome');
});




//企業情報作成route
Route::get('/to_companies/create', function () {
    return view('to_companies/create');
});


//作成したいTo_companies除法をDBにinsertするコントローラー
Route::post('/to_companies', 'ToCompaniesController@insert');


//企業情報一覧表示
Route::get('/to_companies','ToCompaniesController@index');




Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
