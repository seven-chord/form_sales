<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\ToCompany;
use Validator;
use Carbon\Carbon;


class ToCompaniesController extends Controller
{
    //テスト用to_companies情報insertのController
    public function insertPost(Request $request)
    {
        $now = Carbon::now();
        $toCompanies = new ToCompany;
        $toCompanies->company_name = $request->company_name;
        $toCompanies->address_1 = $request->address_1;
        $toCompanies->address_2 = $request->address_2;
        $toCompanies->telephone_1 = $request->telephone_1;
        $toCompanies->categories = $request->categories;
        $toCompanies->contact_url = 'https://techacademy.jp/magazine/1988';
        $toCompanies->possible_send_flag = 1;
        $toCompanies->send_date = $now;
        $toCompanies->save(); //「/」ルートにリダイレクト
        return redirect('/to_companies/insert');
    }



    //企業一覧表示（index)のコントローラー
    public function index(Request $request)
    {
      $pagenate_counts = 30;
      // $to_companies = ToCompany::orderBy('send_date','asc')->get();
      $toCompanies = ToCompany::orderBy('send_date','asc')->paginate($pagenate_counts);
      $count = ToCompany::orderBy('send_date','asc')->get()->count() / $pagenate_counts;
      $total_count = ToCompany::orderBy('send_date','asc')->get()->count();

      // $test = ToCompany::orderBy('send_date','asc')->get()->count();


    //   return view('to_companies/index',['to_companies' => $to_companies]);
      return view('to_companies/index',
      ['to_companies_order_get' => $toCompanies,'count' => $count,'pagenate_counts' => $pagenate_counts]
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

    // 企業を非表示にする
    public function hide(Request $request)
    {
        ToCompany::where('id', $request->id)
                    ->update(['is_active' => false]);

        session()->flash('success', '非表示にしました。');

        return redirect(route('home'));
    }

}
