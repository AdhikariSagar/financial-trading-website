<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exchange;
use App\Models\Candle;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function dashboard(){

    }
    public function index()
    {
       // $data = $this->getGoldData();
        //dd($data);
        return view('home');
    }
    //'GC.COMM'
    public function getGoldData(Request $request)
    {
        $id=$request->id;
        // Fetch data from the 'exchange' and 'candle' tables
        $goldInfo = DB::table('exchanges')
            ->where('symbol', $id)
            ->first();

        $goldData = DB::table('candles')
            ->where('symbol', $id)
            ->orderBy('dateTime', 'asc')
            ->get();

        return response()->json([
            'info' => $goldInfo,
            'data' => $goldData
        ]);
    }
}
