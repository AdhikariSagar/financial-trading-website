<x-main-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-center mb-4">{{ $data->name }}</h1>
        <div id="fetchId" data={{ $data->symbol }}></div>
        <div class="">
            <div class="flex justify-center space-x-2 mt-4">
                <button onclick="updateChart('1D')" class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">1D</button>
                <button onclick="updateChart('5D')" class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">5D</button>
                <button onclick="updateChart('1M')" class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">1M</button>
                <button onclick="updateChart('3M')" class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">3M</button>
                <button onclick="updateChart('6M')" class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">6M</button>
                <button onclick="updateChart('1Y')" class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">1Y</button>
                <button onclick="updateChart('All')" class="btn w-8 h-6 rounded bg-green-300 hover:bg-green-200 cursor-pointer">Alle</button>
            </div>
            <canvas id="gold-price-chart" class="mx-auto" height="600px" width="600px"></canvas>
        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</x-main-layout>