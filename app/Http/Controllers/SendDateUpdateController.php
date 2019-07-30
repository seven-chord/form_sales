<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToCompany;
use Carbon\Carbon;


class SendDateUpdateController extends Controller
{
    public function sendDateUpdate(Request $request)
    {
        $now = Carbon::now();
        $result = ToCompany::where('id', $request->to_company_id)
          ->update(['possible_send_flag' => 1,'send_date' => $now]);

        
        // return $result;
    }
}
