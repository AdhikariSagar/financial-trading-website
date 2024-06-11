{{-- <x-main-layout>
    <h1>i am cryptocurrency</h1>
    <p>Session Id: <span class="font-bold">{{session()->getId()}}</span></p>
</x-main-layout> --}}
<x-main-layout>
    <div class="w-full">
        <div class="bg-blue-200 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col py-2 px-3 ml-2">
                <div class="text-2xl font-bold mt-2"> <!-- Small div -->
                    Kryptowährungen
                </div>
                <div class="text-xl mt-2"> <!-- Large div -->
                    Kryptowährungen: Daten und Kurse zu Bitcoin, Ethereum, Bitcoin Cash, Ripple, Litecoin und Co.
                </div>

            </div>
            <div class="p-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <a href='/ethereum'>
                            <img src="{{ asset('img/cryto-1.png') }}" alt="Ethereum">
                            <h2 class="text-xl font-bold mt-2">Ethereum: Sollten Sie jetzt kaufen?</h2>
                        </a>
                        <p class="text-gray-600">5. Juni 2024</p>
                    </div>
                    <div class="col-span-1">
                        <img src="{{ asset('img/bitcoin.png') }}" alt="Bitcoin">
                        <h2 class="text-xl font-bold mt-2">Bitcoin: Sollten Sie jetzt kaufen?</h2>
                        <p class="text-gray-600">5. Juni 2024</p>
                    </div>
                    <div class="col-span-1">
                        <img src="{{ asset('img/Dogecoin.png') }}" alt="Dogecoin">
                        <h2 class="text-xl font-bold mt-2">Dogecoin: Sollten Sie jetzt kaufen?</h2>
                        <p class="text-gray-600">2. Juni 2024</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-y-3 md:space-y-6 mt-3 md:mt-6 max-w-sm">
            @if ($metaData->isNotEmpty())
                @foreach ($metaData as $data)
                <div class="font-bold text-lg flex-1">{{ $data->sector }}</div>
                    <div class="w-full flex flex-row justify-between items-center  rounded-md bg-slate-200 shadow-b p-2">
                        <div class="flex flex-row items-center space-x-4">
                            <img class="h-14 w-14 rounded-full" src="{{ asset('img/bitcoin.png') }}" alt="Bitcoin">
                            <div>
                                <a href="/instrument-details/crypto/{{ $data->symbol }}" class="font-semibold cursor-pointer hover:text-blue-400">{{ $data->name }}</a>
                                <p class="text-xs px-2 leading-none pb-2 pt-1 bg-slate-300 rounded-full w-fit">Crypto</p>
                            </div>
                        </div>
                        <div>
                            <p>${{ number_format($data->marketCap->value, 2) }} {{$data->currency}}</p>
                            <p class="{{ $data->marketCap->dominance < 0 ? 'text-red-400' : 'text-green-400 text-right' }}">
                                {{ number_format($data->marketCap->dominance, 2) }}%</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Cryptos not found</p>
            @endif
        </div>
    </div>
</x-main-layout>
