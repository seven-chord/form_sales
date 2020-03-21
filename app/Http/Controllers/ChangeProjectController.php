<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\Category;
use App\ToCompany;
use App\FromCompany;


class ChangeProjectController extends Controller
{
    public function changeProject(Request $request)
    {
        $from_company_post_id = $request->from_company_id;
        // $prefectures = Prefecture::all();
        // $categories = Category::all();
        $pagenate_counts = 200;
        $fromCompany = FromCompany::where('id', 2)->first();
        // $toCompanyListCharge = ToCompany::where('from_company_id', $from_company_post_id)->first();
        $fromCompanies = FromCompany::all();

        $toCompanies = ToCompany::orderBy('id','asc')->where('possible_send_flag','0')->where('from_company_id',2);
        $count = ToCompany::orderBy('send_date','asc')->get()->count();
        $total_count = ToCompany::orderBy('send_date','asc')->get()->count();
        $test = 2;

        return view('change_project')
                ->with('fromCompany', $fromCompany)
                ->with('fromCompanies', $fromCompanies)
                ->with('from_company_post_id', $from_company_post_id)
                ->with('toCompanies', $toCompanies);

    }

}
