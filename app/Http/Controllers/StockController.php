<?php

namespace App\Http\Controllers;

use App\Models\Metadata;
use Illuminate\Http\Request;

class StockController extends Controller
{
   /*  public function home(){

        $fetchedData = Metadata::where('type','common stock')->get();
        return view('stock', ['stockMetaData'=>$fetchedData]);
    } 

    public function stockDetails(Request $request){
        $symbol = $request->id;
        $data = Metadata::where('symbol',$symbol)->first();
        return view('stock-details',['stock'=>$data]);
    }*/
}
