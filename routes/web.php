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



//テスト用企業情報作成route
Route::get('/to_companies/insert', 'ToCompaniesController@insertGet');


//作成したいTo_companies除法をDBにinsertするコントローラー
Route::post('/to_companies/insert', 'ToCompaniesController@insertPost');


//企業情報一覧表示
Route::get('/to_companies','ToCompaniesController@index');


//csvインポート画面
Route::get('/to_companies/csv_import','ToCompaniesCsvImportController@csvImportGet');

Route::post('/to_companies/csv_import','ToCompaniesCsvImportController@csvImportPost');

//送信完了->次の企業へajax処理
Route::post('/home/send_date_update','SendDateUpdateController@sendDateUpdate');

//送信不可->次の企業へajax処理
Route::post('/home/send_impossible','SendImpossibleController@sendImpossible');


//送信完了->次の企業へajax処理
Route::post('/home/send_date_update','SendDateUpdateController@sendDateUpdate');



Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
Route::get('/home', 'HomeController@index')->name('home');
