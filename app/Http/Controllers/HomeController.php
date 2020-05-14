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
        $pagenate_counts = 400;

        // ユーザに紐付いているFromCompanyを全て取得
        $user = \Auth::user();
        $fromCompanies = FromCompany::where('user_id', $user->id)->orderBy('id','asc')->get();

        // 取得したFromCompaniesのうち、先頭のものを最初の営業対象にする
        $fromCompany = $fromCompanies->first();

        // ユーザに紐づくFromCompanyが存在しなかった場合、ダミーデータをセット
        if ($fromCompany == null) {
            $fromCompany = new ToCompany;
            $from_company_post_id = 0;
             // paginateするために0件のダミーデータを取得する
            $toCompanies = ToCompany::where('id','0')->paginate($pagenate_counts);
        }
        else {
            $from_company_post_id = $fromCompany->id;
            $toCompanies = ToCompany::where('from_company_id', $from_company_post_id)->where('possible_send_flag','0')->orderBy('id','asc')->paginate($pagenate_counts);
        }

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
