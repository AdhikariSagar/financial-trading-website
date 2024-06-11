<x-main-layout>
    <div>
        <h1 class=" text-slate-600 text-3xl font-bold">Commodity</h1>
        <div class="mt-6 space-y-6 bg-blue-200 p-10 rounded-lg shadow-md">
            @foreach ($data as $item)
                <div class="w-full max-w-md p-2 bg-slate-200 shadow-b rounded-md">
                    <a href="/instrument-details/etc/{{ $item->symbol }}"
                        class="cursor-pointer hover:text-blue-400 font-semibold">{{ $item->name }}</a>
                    <div class="text-neutral-700">ISIN: {{ $item->isin }}</div>
                </div>
            @endforeach
        </div>
    </div>
</x-main-layout>