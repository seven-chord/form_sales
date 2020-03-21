<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\Category;
use App\ToCompany;
use App\FromCompany;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $prefectures = Prefecture::all();
        // $categories = Category::all();
        $from_company_post_id = 1;
        $pagenate_counts = 400;
        $fromCompany = FromCompany::where('id', $from_company_post_id)->first();
        $fromCompanies = FromCompany::all();
        // $toCompanyListCharge = ToCompany::where('possible_send_flag', '0')->where('from_company_id', 1)->first();
        $toCompanies = ToCompany::orderBy('id','asc')->where('possible_send_flag','0')->where('from_company_id',$from_company_post_id)->paginate($pagenate_counts);
        $count = ToCompany::orderBy('send_date','asc')->get()->count() / $pagenate_counts;
        $total_count = ToCompany::orderBy('send_date','asc')->get()->count();

        return view('home')
                ->with('fromCompany', $fromCompany)
                ->with('fromCompanies', $fromCompanies)
                ->with('from_company_post_id', $from_company_post_id)
                ->with('toCompanies', $toCompanies);
    }

    public function getFromCompany(Request $request)
    {
        $fromCompanyInfo["info"] = FromCompany::where('id', $request->from_company_id)->first();
        $fromCompanyInfo["count"] = ToCompany::where('possible_send_flag','1')->where('from_company_id', $request->from_company_id)->count();

        return $fromCompanyInfo;
    }
}
