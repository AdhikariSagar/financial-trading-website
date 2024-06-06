<x-main-layout>  
    <div class="max-w-7xl flex flex-col h-full overflow-auto mx-auto lg:px-20 mt-4">
        <div class="bg-slate-300 shadow-xl sm:rounded-lg mb-3">
            
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
        </div>
        <div class="flex flex-row w-full space-x-4 mt-2">
            {{-- Left container --}}
            <div class="w-[70%]">
                <div class="h-40 w-full rounded bg-slate-200 shadow">
                    
                </div>
                <div class="h-52 w-full rounded bg-slate-200 shadow mt-2"></div>
            </div>
            {{-- right container --}}
            <div class="w-[30%] ">
                <div class="h-[400px] space-y-2 w-full rounded bg-slate-400 shadow mt-2 p-2">
                    <div class="w-full flex flex-row justify-between items-center  rounded bg-slate-200 shadow p-2">
                        <div class="flex flex-row items-center space-x-4">
                             <img class="h-14 w-14 rounded-full" src="{{ asset('img/bitcoin.png') }}" alt="Bitcoin">
                            <div>
                                <p class="cursor-pointer hover:text-blue-400 hover:underline">Nividia</p>
                                <p class="text-green-500">sth letter</p>
                            </div>
                        </div>
                        <div>
                            <p>deffs</p>
                            <p class="text-red-400">dfsdfs</p>
                        </div>
                    </div>
                    <div class="w-full flex flex-row justify-between items-center  rounded bg-slate-200 shadow p-2">
                        <div class="flex flex-row items-center space-x-4">
                             <img class="h-14 w-14 rounded-full" src="{{ asset('img/bitcoin.png') }}" alt="Bitcoin">
                            <div>
                                <p>NIvidia</p>
                                <p class="text-green-500">sth letter</p>
                            </div>
                        </div>
                        <div>
                            <p>deffs</p>
                            <p class="text-red-400">dfsdfs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>