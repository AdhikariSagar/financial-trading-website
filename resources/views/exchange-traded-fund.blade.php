<x-main-layout>
    <div>
        <h1 class="text-3xl font-medium">List of ETFs</h1>
        <div class="mt-6 space-y-6">
            @foreach ($data as $item)
                <div class="w-full max-w-md p-2 bg-slate-200 shadow-b rounded-md">
                    <a href="/instrument-details/etf/{{ $item->symbol }}"
                        class="cursor-pointer hover:text-blue-400 font-semibold">{{ $item->name }}</a>
                    <div class="text-neutral-700">ISIN: {{ $item->isin }}</div>
                </div>
            @endforeach
        </div>
    </div>
</x-main-layout>