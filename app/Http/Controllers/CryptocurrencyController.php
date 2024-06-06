<?php

namespace App\Http\Controllers;

use App\Models\Candle;
use Illuminate\Http\Request;
use App\Models\Exchange;
use App\Models\Metadata;
use Illuminate\Support\Facades\DB;


class CryptocurrencyController extends Controller
{
    //
     //
     public function getAll(){
        $exchange= Exchange::all();
 
        //header $fsfs k=[] name:cure,value,dfe,
         //dd($exchange);
         return view('exchange',['data'=>$exchange]);
     }
 
     public function getWithId($id){
 
     }
 
     public function crytoDetail(Request $request){
        $data= Metadata::all();//::with('')->first();
        //dd($metadata); 
        //$candle = Candle::find(1);
        
        return view('home',['data'=>$data]);
        
     }
}
