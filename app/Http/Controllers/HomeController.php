<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\Category;
use App\ToCompany;

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

        $toCompanies = ToCompany::where('is_active', true)->orderBy('send_date','asc')->paginate($pagenate_counts);
        $count = ToCompany::orderBy('send_date','asc')->get()->count() / $pagenate_counts;
        $total_count = ToCompany::orderBy('send_date','asc')->get()->count();

        return view('home')
                ->with('prefectures', $prefectures)
                ->with('categories', $categories)
                ->with('toCompanies', $toCompanies);
    }

    public function search(Request $request)
    {
        $prefectures = Prefecture::all();
        $categories = Category::all();

        $query = ToCompany::query();

        if(!empty($request->prefecture_id)){
            $query->where('prefecture_id', $request->prefecture_id);
        }

        if(!empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        $toCompanies = $query->paginate(30);

        return view('home')
                ->with('prefectures', $prefectures)
                ->with('categories', $categories)
                ->with('toCompanies', $toCompanies);
    }
}
