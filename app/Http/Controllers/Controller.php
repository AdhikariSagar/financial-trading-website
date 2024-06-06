<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use App\Models\Metadata;
use Illuminate\Http\Request;

class Controller
{
    public function instrumentDetails(Request $request)
    {
        $type = $this->getInstrumentType($request->type);
        $symbol = $request->symbol;

        if ($type !== "unknown") {
            // Query to get metadata where both type and symbol match
            $metaData = Metadata::where('type', $type)
                ->where('symbol', $symbol)
                ->first();

            // Query to get exchange data where symbol matches
            $exchangeData = Exchange::where('symbol', $symbol)->first();

            // Check if any data is found
            if ($metaData || $exchangeData) {
                return view('instrument-details', compact('metaData', 'exchangeData'));
            } else {
                return redirect()->route('pagenotfound');
            }
        } else {
            return redirect()->route('pagenotfound');
        }
        dd($type, $symbol);
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
