<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FromCompany;
use App\Prefecture;
use App\Category;
use App\ToCompany;


class FromCompanyProjectPostController extends Controller
{
    public function postProject(Request $request)
    {
        //プロジェクト変更をクリックした場合
        if (!($request->project_change == "")) {
            $pagenate_counts = 1000;
            $from_company_post_id = $request->from_company_id;

            // ユーザに紐付いているFromCompanyを全て取得
            $user = \Auth::user();
            $fromCompanies = FromCompany::where('user_id', $user->id)->orderBy('id','asc')->get();

            // リクエストで指定されたFromCompanyを営業対象にする
            $fromCompany = FromCompany::where('id', $from_company_post_id)->where('user_id', $user->id)->first();
            $toCompanies = ToCompany::where('from_company_id', $from_company_post_id)->where('possible_send_flag','0')->orderBy('id','asc')->paginate($pagenate_counts);
    
            return view('change_project')
                    ->with('fromCompany', $fromCompany)
                    ->with('fromCompanies', $fromCompanies)
                    ->with('from_company_post_id', $from_company_post_id)
                    ->with('toCompanies', $toCompanies);
        }

        //プロジェクト編集をクリックした場合
        else {
            $from_company_post_id = $request->from_company_id;
            $fromCompany = FromCompany::where('id', $from_company_post_id)->first();
            $fromCompanies = FromCompany::all();
            return view('/from_companies/edit_project')
                    ->with('fromCompany', $fromCompany)
                    ->with('fromCompanies', $fromCompanies);
        }    
    }
}
