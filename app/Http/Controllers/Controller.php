<?php

namespace App\Http\Controllers;

use App\Models\Candle;
use App\Models\Exchange;
use App\Models\Metadata;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Double;
use View;

class Controller
{
    /**
     * For home view
     */
    public function home(Request $request){

    
        // Get all metadata and candles
        $allMetaData = Metadata::with('exchange')->get();
        $allCandles = Candle::with('metadata')->get();
    
        // Create an array to store extracted names
        $extractedNames = [];
        $latestCandleData=[];
    
        // Extract the first part of the name for each item
        foreach ($allMetaData as $item) {
            $extractedNames[] = explode(' ', $item->name)[0];
            // Query to get metadata where both type and symbol match
            $metaData = Metadata::where('type', $item->type)
            ->where('symbol', $item->symbol)->with('marketCap')
            ->first();

            // Query to get exchange data where symbol matches
            $exchangeData = Exchange::where('symbol', $item->symbol)->first();

            $candlestickData = Candle::where('symbol', $item->symbol)
                ->orderBy('dateTime', 'asc')
                ->get();

            // Get the latest candlestick data
            $latestCandle = $candlestickData->last();

            // Calculate the change difference
            $startPrice = $latestCandle->startPrice;
            $closePrice = $latestCandle->endPrice;
            $diffChange = $closePrice - $startPrice;

            // Calculate the percentage change
            $diffChangePer = ($diffChange / $startPrice) * 100;

            // Format the change difference and percentage
            $latestCandleData[] = number_format($diffChangePer, 2);

            // Pass the latest candle data to the view
            
        }
        //dd($latestCandleData);
    
        // Pass the result of getInstrumentType() to the view
        $getInstrumentType = function ($type) {
            switch ($type) {
                case "common stock":
                    return "stock";
                case "cryptocurrency":
                    return "crypto";
                case "exchange traded fund":
                    return "etf";
                case "exchange traded commodity":
                    return "etc";
                case "fund":
                    return "fund";
                case "commodity":
                    return "commodity";
                case "index":
                    return "index";
                case "mutual fund":
                    return "mf";
                default:
                    return "unknown";
            }
        };
    
        // Pass all data to the view
        return view('home', compact('allMetaData', 'extractedNames', 'getInstrumentType', 'latestCandleData'));
    }
    
    /**
     * For common stock view
     */
    public function stockHome(){
        $data = Metadata::where('type','common stock')->with('marketCap')->get();
        return view('stock', ['data'=>$data]);
    }

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
            // get required values  
            $latestValue = $candlestickData->last();
            $startPrice = $latestValue->startPrice;
            $closePrice = $latestValue->endPrice;

            //Calculate the changes
            $diffChange = $closePrice - $startPrice;
            $diffChangePer = ($diffChange/$startPrice)*100;

            // put all values into array
            $latestCandle=[];
            $latestCandle["diff"]=number_format($diffChange, 2);;
            $latestCandle["diffChangePer"]=number_format($diffChangePer, 2);
            $latestCandle["dateTime"]=date("M j, Y g:ia", strtotime($latestValue->dateTime));
            $latestCandle["currency"]=$latestValue->currency;

            //dd($latestCandle);
            
            // Check if any data is found
            if ($metaData || $exchangeData) {
                // Passing both instrument-details and home views
                return view('instrument-details', compact('metaData', 'exchangeData','candlestickData','latestCandle'));
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
            case "crypto":
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
            case "mf":
                return "mutual fund";
            default:
                return "unknown";
        }
    }
}
