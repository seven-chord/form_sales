<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\To_company;
use Validator;
use Carbon\Carbon;


class ToCompaniesController extends Controller
{
    //テスト用to_companies情報insertのController
    public function insertPost(Request $request)
    {
        $now = Carbon::now();
        $to_companies = new To_company;
        $to_companies->company_name = $request->company_name;
        $to_companies->address_1 = $request->address_1;
        $to_companies->address_2 = $request->address_2;
        $to_companies->telephone_1 = $request->telephone_1;
        $to_companies->telephone_2 = $request->telephone_2;
        $to_companies->telephone_3 = $request->telephone_3;
        $to_companies->categories = $request->categories;
        $to_companies->contact_url = 'https://techacademy.jp/magazine/1988';
        $to_companies->possible_send_flag = 1;
        $to_companies->send_date = $now;
        $to_companies->save(); //「/」ルートにリダイレクト
        return redirect('/to_companies/insert');
    }

 

    //企業一覧表示（index)のコントローラー
    public function index(Request $request)
    {
      $pagenate_num = 30;
      // $to_companies = To_company::orderBy('send_date','asc')->get();
      $to_companies = To_company::orderBy('send_date','asc')->paginate($pagenate_num);
      $count = To_company::orderBy('send_date','asc')->get()->count() / $pagenate_num;
      $total_count = To_company::orderBy('send_date','asc')->get()->count();

      // $test = To_company::orderBy('send_date','asc')->get()->count();


    //   return view('to_companies/index',['to_companies' => $to_companies]);
      return view('to_companies/index',
      ['to_companies_order_get' => $to_companies,'count' => $count,'total_count' => $total_count]
      // ['count' => $count],
      // ['total_count' => $total_count]
      // ['test'=> $test]
    );

    }



    //テスト用insertファイルへ
    public function insertGet(Request $request)
    {
        return view('to_companies/insert');
    }

  
    
}
