<x-main-layout>
    <div class="flex flex-col bg-blue-200 p-10 rounded-lg shadow-md">
        <div class="flex">
            @foreach ($data as $stock)
                <div class="font-bold text-lg flex-1">{{ $stock->sector }}</div>
            @endforeach
        </div>
        <div class="flex">
            @foreach ($data as $stock)
            <div class="flex-1">
                <a href="/instrument-details/stock/{{ $stock->symbol }}" class="cursor-pointer hover:text-blue-400">{{ $stock->name }} ({{ $stock->exchange }})</a>
            </div>
        @endforeach
        </div>
    </div>
</x-main-layout>
