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
        if(!($request->project_change == "")){
            $from_company_post_id = $request->from_company_id;
            $prefectures = Prefecture::all();
            $categories = Category::all();
            $pagenate_counts = 200;
            $fromCompany = FromCompany::where('id', $from_company_post_id)->first();
            $fromCompanies = FromCompany::all();
    
            $toCompanies = ToCompany::orderBy('id','asc')->where('possible_send_flag','0')->where('from_company_id',$from_company_post_id)->paginate($pagenate_counts);
            $count = ToCompany::orderBy('send_date','asc')->get()->count() / $pagenate_counts;
            $total_count = ToCompany::orderBy('send_date','asc')->get()->count();
    
            return view('home')
                    ->with('prefectures', $prefectures)
                    ->with('categories', $categories)
                    ->with('fromCompany', $fromCompany)
                    ->with('fromCompanies', $fromCompanies)
                    ->with('toCompanies', $toCompanies);
                  

        //プロジェクト編集をクリックした場合
            }else{
                $from_company_post_id = $request->from_company_id;
                $fromCompany = FromCompany::where('id', $from_company_post_id)->first();
                $fromCompanies = FromCompany::all();
                return view('/from_companies/edit_project')
                      ->with('fromCompany', $fromCompany)
                      ->with('fromCompanies', $fromCompanies);
        }    

        

    }



  

}
