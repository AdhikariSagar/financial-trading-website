<?php

namespace App\Http\Controllers;

use App\Models\Candle;
use App\Models\Exchange;
use App\Models\Metadata;
use Illuminate\Http\Request;

class Controller
{

    /**
     * For etc view
     */
    public function etcHome(){
        $data = Metadata::where('type','exchange traded commodity')->with('marketCap')->get();
        return view('exchage-traded-commodity', ['data'=>$data]);
    }

    /**
     * For etf view
     */
    public function etfHome(){
        $data = Metadata::where('type','exchange traded fund')->with('marketCap')->get();
        return view('exchange-traded-fund', ['data'=>$data]);
    }

    /**
     * For fund view
     */
    public function fundHome(){
        $data = Metadata::where('type','fund')->with('marketCap')->get();
        return view('fund', ['data'=>$data]);
    }

    /**
     * For index view
     */
    public function indexHome(){
        $data = Metadata::where('type','index')->with('marketCap')->get();
        return view('index', ['data'=>$data]);
    }

    /**
     * For Mutual fund view
     */
    public function mfHome(){
        $data = Metadata::where('type','mutual fund')->with('marketCap')->get();
        return view('mutual-fund', ['data'=>$data]);
    }

     /**
     * For Commodity view
     */
    public function commodityHome(){

        $data = Exchange::where('type','commodity')->get();
        return view('commodity', ['data'=>$data]);
    }

    /**
     * For cryptocurrency view
     */
    public function cryptoHome(){
        $metaData = Metadata::where('type','cryptocurrency')->with('marketCap')->get();
        return view('cryptocurrency', ['metaData'=>$metaData]);
    }
    /**
     * For instrument-details view
     */
    public function instrumentDetails(Request $request)
    {
        $type = $this->getInstrumentType($request->type);
        $symbol = $request->symbol;

        if ($type !== "unknown") {
            // Query to get metadata where both type and symbol match
            $metaData = Metadata::where('type', $type)
                ->where('symbol', $symbol)->with('marketCap')
                ->first();

            // Query to get exchange data where symbol matches
            $exchangeData = Exchange::where('symbol', $symbol)->first();

            $candlestickData = Candle::where('symbol', $symbol)
                ->orderBy('dateTime', 'asc')
                ->get();

            // Check if any data is found
            if ($metaData || $exchangeData) {
                return view('instrument-details', compact('metaData', 'exchangeData','candlestickData'));
            } else {
                return redirect()->route('pagenotfound');
            }
        } else {
            return redirect()->route('pagenotfound');
        }
    }

    // Helper function to determine the instrument type
    private function getInstrumentType($type)
    {
        switch ($type) {
            case "stock":
                return "common stock";
            case "cryptocurrency":
                return "cryptocurrency";
            case "etf":
                return "exchange traded fund";
            case "etc":
                return "exchange traded commodity";
            case "fund":
                return "fund";
            case "commodity":
                return "commodity";
            case "index":
                return "index";
            case "mutual-fund":
                return "mutual fund";
            default:
                return "unknown";
        }
    }
}
