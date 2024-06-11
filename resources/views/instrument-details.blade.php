<x-main-layout>
    @if ($metaData)
        <div class="mt-4 bg-slate-100 p-3 rounded-lg shadow-md">
            <div>
                <span class="text-xl font-semibold text-gray-700 hover:text-blue-300">{{ $metaData->name ?? '' }}</span>
                
            </div>
            <div class="flex items-center mt-1 text-sm space-x-3">
                @if ($exchangeData->ticker)
                    
                    <span class="text-sm ml-2 bg-gray-200 hover:bg-gray-300 text-gray-600 p-1 rounded">{{ $metaData->type ?? '' }}</span>
                @endif

                @if ($exchangeData->ticker)
                
                    <span class="text-sm ml-2 bg-gray-200 hover:bg-gray-300 text-gray-600 p-1 rounded-md">{{ $metaData->ticker ?? '' }}</span>
                @endif

                @if ($exchangeData->isin)
        
                    <span
                        class=" flex items-center bg-gray-200 hover:bg-gray-300 text-gray-600 p-1 rounded">ISIN:
                        {{ $exchangeData->isin }}
                    </span>
                    
                @endif
                @if ($exchangeData->wpkn)
                 <span class="h-1.5 w-1.5 bg-gray-300 rounded-full mx-1"></span>
                    <span
                        class="h-8 flex items-center leading-none w-fit px-3 pb-1  capitalize rounded-full bg-slate-200">{{ $exchangeData->wpkn }}</span>
                @endif
                
            </div>
            <div class="text-sm text-gray-400 flex item-center mt-1 space-x-2">
                <span>As of {{$latestCandle['dateTime']}}</span>
                <span class="{{$latestCandle['diff']>0 ? 'text-green-500' : 'text-red-600'}}">{{$latestCandle['diff']>0 ? '+' : ''}}{{$latestCandle['diff']}} {{$latestCandle['currency']}}</span>
                <span class="{{$latestCandle['diffChangePer']>0 ? 'text-green-500' : 'text-red-600'}}">({{$latestCandle['diffChangePer']>0 ? '+' :''}}{{$latestCandle['diffChangePer']}}%)</span>
                
            </div>
        </div>
        <div class="mt-4 md:mt-7 text-sm ">{{ $metaData->description ?? '' }}</div>
        <div class="mt-8 w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
            {{-- Graph container --}}
            <div class="w-full md:w-[65%]">
                <div class="w-full h-[300px] md:h-[400px] overflow-hidden">
                    <div id="chart-container" class="relative  h-[300px] md:h-[400px] w-full"></div>
                </div>
            </div>
            {{-- Other details --}}
            <div class="w-full md:w-[35%] md:space-y-5">
                @if ($metaData->marketCap)
                    <div>
                        <h1 class="font-bold mb-1 text-lg">Market Capitalization Information</h1>
                        <div class="text-gray-700 pb-2 border-b font-bold">
                            <div>Total Market Value</div>
                            <div class="font-thin text-sm">{{ number_format($metaData->marketCap->value, 2) }}
                                {{ $metaData->currency }}</div>
                        </div>
                        <div class="text-gray-700 pb-2 border-b font-bold">
                            <div>Market Dominance</div>
                            <div class="font-thin text-sm">{{ number_format($metaData->marketCap->dominance, 2) }}%
                            </div>
                        </div>
                        <div class="text-gray-700 pb-2 border-b font-bold">
                            <div>Fully Diluted Market Cap</div>
                            <div class="font-thin text-sm">{{ $metaData->currency == 'EUR' ? '€' : '' }}
                                {{ $metaData->currency == 'USD' ? '$' : '' }}{{ number_format($metaData->marketCap->diluted, 2) }}
                            </div>
                        </div>
                        <div class="text-gray-700 pb-2 border-b font-bold">
                            <div>Average</div>
                            <div class="font-thin text-sm">{{ $metaData->currency == 'EUR' ? '€' : '' }}
                                {{ $metaData->currency == 'USD' ? '$' : '' }}{{ number_format($metaData->marketCap->average, 2) }}
                            </div>
                        </div>
                    </div>
                @endif
                <div>
                    <h1 class="font-bold mb-1 text-lg">Trading Information</h1>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin text-sm"> $423.02</div>
                    </div>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin text-sm"> $424.01</div>
                    </div>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin text-sm"> $427.07</div>
                    </div>
                </div>
                <div>
                    <h1 class="font-bold mb-1 text-lg">Key Statistics</h1>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Price/Earnings (Normalized)</div>
                        <div class="font-thin text-sm"> 36.71</div>
                    </div>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin text-sm"> $413.02</div>
                    </div>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin text-sm"> $414.01</div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        // Retrieve candlestick data from PHP using Blade template syntax
        const candlestickData = @json($candlestickData);

        // Define an array to store the candlestick data
        const seriesData = [];
        const histoGramData = [];

        // Iterate over each candlestick data entry
        for (const key in candlestickData) {
            if (candlestickData.hasOwnProperty(key)) {
                // Access the properties of the candlestick data entry
                const entry = candlestickData[key];

                // Validate that all necessary properties are not null
                if (
                    entry.dateTime &&
                    entry.startPrice != null &&
                    entry.highestPrice != null &&
                    entry.lowestPrice != null &&
                    entry.endPrice != null
                ) {
                    // Create a JavaScript Date object from the dateTime string
                    const date = new Date(entry.dateTime);
                    //console.log(entry);
                    //console.log(date);

                    // Push a new data point to the seriesData array
                    seriesData.push({
                        time: Math.floor(date.getTime() / 1000), // Convert date to seconds since UNIX epoch
                        open: entry.startPrice,
                        high: entry.highestPrice,
                        low: entry.lowestPrice,
                        close: entry.endPrice
                    });
                    histoGramData.push({
                        time: Math.floor(date.getTime() / 1000),
                        value: entry.volume
                    });
                } else {
                    console.warn('Invalid data point:', entry);
                }
            }
        }
        console.log(seriesData);
        const chartContainer = document.getElementById('chart-container');
        console.log({
            width: chartContainer.clientWidth,
            height: chartContainer.clientHeight,
            // Configure other chart properties
        })
        // Use the seriesData array to configure and render the chart
        const chart = LightweightCharts.createChart(chartContainer, {
            width: chartContainer.clientWidth,
            height: chartContainer.clientHeight,
            // Configure other chart properties
        });

        const candleSeries = chart.addCandlestickSeries();
        // Set data for the candlestick series
        candleSeries.setData(seriesData);
/*         const histogramSeries = chart.addHistogramSeries({
            color: '#26a69a'
        });
        histogramSeries.setData(histoGramData); */
    </script>
</x-main-layout>
