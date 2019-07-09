<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\To_company;
use Validator;
use Carbon\Carbon;
use SplFileObject;


class ToCompaniesController extends Controller
{
    public function insert(Request $request)
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
        $to_companies->contact_url = $request->contact_url;
        $to_companies->contact_url = 'https://techacademy.jp/magazine/1988';
        $to_companies->possible_send_flag = 1;
        $to_companies->send_date = $now;
        $to_companies->save(); //「/」ルートにリダイレクト
        return redirect('/to_companies/create');
    }


    public function CsvImport(Request $request)
    {
        




    }
    //
}
