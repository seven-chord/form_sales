<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\ToCompany;



class SendImpossibleController extends Controller
{
    public function sendImpossible(Request $request)
    {
        $now = Carbon::now();
        $result = ToCompany::where('id', $request->to_company_id)
          ->update(['possible_send_flag' => 2,'send_date' => $now]);
        return $result;
    }
}
