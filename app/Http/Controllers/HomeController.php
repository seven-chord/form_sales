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
        $prefectures = Prefecture::all();
        $categories = Category::all();
        $pagenate_counts = 30;
        $fromCompanies = FromCompany::all();

        $toCompanies = ToCompany::orderBy('send_date','asc')->paginate($pagenate_counts);
        $count = ToCompany::orderBy('send_date','asc')->get()->count() / $pagenate_counts;
        $total_count = ToCompany::orderBy('send_date','asc')->get()->count();

        return view('home')
                ->with('prefectures', $prefectures)
                ->with('categories', $categories)
                ->with('fromCompanies', $fromCompanies)
                ->with('toCompanies', $toCompanies);
    }
}
