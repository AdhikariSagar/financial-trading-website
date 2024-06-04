<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exchange;
use Illuminate\Support\Facades\DB;

class ExchangeController extends Controller
{
    //
    public function getAll(){
       $exchange= Exchange::all();

       //header $fsfs k=[] name:cure,value,dfe,
        //dd($exchange);
        return view('exchange',['data'=>$exchange]);
    }

    public function getWithId($id){

    }

    public function exchangeDetail(Request $request){
        $symbol = $request->symbol;
        $exchange = DB::table('exchanges')
        ->where('symbol', $symbol)
        ->first();
        if($exchange){
            return view('exchange-details',['data'=>$exchange]);
        } else {
            return view('home');
        }
       
    }
}
