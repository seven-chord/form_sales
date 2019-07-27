<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToCompany;

class SendDateUpdateController extends Controller
{
    public function sendDateUpdate(Request $request)
    {
        $result = ToCompany::where('id', $request->to_company_id)
          ->update(['possible_send_flag' => 1]);
        return $result;
    }
}
