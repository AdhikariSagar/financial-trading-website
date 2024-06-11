<x-main-layout>
    <div class="flex flex-col">
        <div class="flex">
            @foreach ($data as $stock)
                <div class="font-semibold flex-1">{{ $stock->sector }}</div>
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
