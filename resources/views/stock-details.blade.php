<x-main-layout>
    <x-details-wrapper>
        <div>
            <div><span class="text-3xl font-semibold">{{ $stock->name }}</span><span
                    class="text-3xl font-thin ml-2">{{ $stock->ticker }}</span></div>
            <div class="flex items-center mt-1">
                <span
                    class="h-8 flex items-center leading-none w-fit px-3 rounded-full bg-purple-600 text-white">Stock</span>
                <span class="h-2 w-2 bg-gray-400 rounded-full mx-2"></span>
            </div>
        </div>
        <div>{{ $stock->description }}</div>
        <div class="mt-8 h-full w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
            {{-- Graph container --}}
            <div class="w-full lg:w-[65%]">
                <div id="fetchId" data={{ $stock->symbol }}></div>
                <div class="w-full h-[600px] overflow-hidden">
                    <div class="flex justify-center space-x-2 mt-4">
                        <button onclick="updateChart('1D')"
                            class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">1D</button>
                        <button onclick="updateChart('5D')"
                            class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">5D</button>
                        <button onclick="updateChart('1M')"
                            class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">1M</button>
                        <button onclick="updateChart('3M')"
                            class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">3M</button>
                        <button onclick="updateChart('6M')"
                            class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">6M</button>
                        <button onclick="updateChart('1Y')"
                            class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">1Y</button>
                        <button onclick="updateChart('All')"
                            class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">Alle</button>
                    </div>
                    <canvas id="gold-price-chart" width="100%" height="100%"></canvas>
                </div>
            </div>
            {{-- Other details --}}
            <div class="w-full lg:w-[35%] md:space-y-10 md:pt-10">
                <div>
                    <h1 class="text-gray-500">Trading Information</h1>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin"> $424.01</div>
                    </div>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin"> $424.01</div>
                    </div>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin"> $424.01</div>
                    </div>
                </div>
                <div>
                    <h1 class="text-gray-500">Key Statistics</h1>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Price/Earnings (Normalized)</div>
                        <div class="font-thin"> 36.71</div>
                    </div>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin"> $424.01</div>
                    </div>
                    <div class="flex pb-2 border-b justify-between">
                        <div>Previous Close Price</div>
                        <div class="font-thin"> $424.01</div>
                    </div>
                </div>
            </div>
        </div>
    </x-details-wrapper>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</x-main-layout>
