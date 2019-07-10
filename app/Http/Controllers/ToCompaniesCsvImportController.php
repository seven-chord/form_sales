<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//to_companiesの企業情報をインポートするファイルのコントローラー
class ToCompaniesCsvImportController extends Controller
{
       //csvインポート用ページ
       public function csvImportGet(Request $request)
       {
           return view('to_companies/csv_import');
   
       }



        //csvimportに必要と思われる
        protected $csvimport = null;
        //csvインポートページしたデータをDBにinsert
        public function csvImportPost(Request $request)
        {
            //to_companiesテーブルオブジェクトインスタンスを作成
            $to_companies = new To_company;


            // '情報が追加されました。';
            // '項目等に誤りがあります。';
        }



}
