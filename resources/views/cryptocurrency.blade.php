{{-- <x-main-layout>
    <h1>i am cryptocurrency</h1>
    <p>Session Id: <span class="font-bold">{{session()->getId()}}</span></p>
</x-main-layout> --}}
<x-main-layout>
    
    <div class="max-w-7xl mx-auto sm:p-10 lg:p-12">
        <div class="bg-slate-300 overflow-hidden shadow-xl sm:rounded-lg">
            
            <div class="flex flex-col py-2 px-3 ml-2">
                <div class="text-sm font-bold mt-2"> <!-- Small div -->
                    start
                </div>
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
            <div class="flex flex-col py-2 px-3 ml-2">

        </div>
    </div>
</x-main-layout>