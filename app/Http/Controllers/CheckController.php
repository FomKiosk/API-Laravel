<?php

namespace App\Http\Controllers;

use App\Models\Kiosk;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckController extends Controller
{
    public function check(Request $request)
    {
        $kiosk = Kiosk::where('uid', $request->get('uid'))->where('secret', $request->get('secret'))->first();
        return response()->json([
            'success' => true,
            'kiosk_id' => $kiosk->id
        ]);
    }
}
