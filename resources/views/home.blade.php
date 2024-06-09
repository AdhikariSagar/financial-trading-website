<x-main-layout>
    </p>
    <div class="mt-8 w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
        {{-- Left container --}}
        <div class="w-full md:w-[65%]">
            {{-- details --}}
            <div>
                {{-- Tab options --}}
                <div class="flex border border-black rounded-full w-fit mb-3">
                    <div class="border-r px-3 border-black hover:bg-black/50 pb-1 hover:text-white cursor-pointer hover:rounded-l-full ">Morningstar</div>
                    <div class="border-r px-3 border-black hover:bg-black/50 pb-1 hover:text-white cursor-pointer ">U.S.</div>
                    <div class="border-r px-3 border-black hover:bg-black/50 pb-1 hover:text-white cursor-pointer ">Global</div>
                    <div class="px-3 border-black hover:bg-black/50 hover:text-white cursor-pointer hover:rounded-r-full ">Commodities</div>
                </div>
                {{-- Tab content --}}
                <div class="space-y-1">
                    <div class="flex justify-between space-x-2 items-center pb-2 border-b border-gray-400">
                        <p>US Market</p>
                        <div class="flex space-x-2">
                            <p class="font-semibold text-neutral-700">Closed</p>
                            <p>13,001.74</p>
                            <p class="{{ false ? 'text-green-500' : 'text-red-500'}}"><span>arrow down</span> 24.61</p>
                            <p class="{{ false ? 'text-green-500' : 'text-red-500'}}">- 0.19%</p>
                        </div>
                    </div>
                    <div class="flex justify-between space-x-2 items-center pb-2 border-b border-gray-400">
                        <p>US Mid cap</p>
                        <div class="flex space-x-2">
                            <p class="font-semibold text-neutral-700">Closed</p>
                            <p>13,001.74</p>
                            <p class="{{ false ? 'text-green-500' : 'text-red-500'}}"><span>arrow down</span> 24.61</p>
                            <p class="{{ false ? 'text-green-500' : 'text-red-500'}}">- 0.19%</p>
                        </div>
                    </div>
                    <div class="flex justify-between space-x-2 items-center pb-2 border-b border-gray-400">
                        <p>US Smcap sustainability</p>
                        <div class="flex space-x-2">
                            <p class="font-semibold text-neutral-700">Closed</p>
                            <p>13,001.74</p>
                            <p class="{{ false ? 'text-green-500' : 'text-red-500'}}"><span>arrow down</span> 24.61</p>
                            <p class="{{ false ? 'text-green-500' : 'text-red-500'}}">- 0.19%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Right container --}}
        <div class="w-full md:w-[35%] md:space-y-10">
            {{-- List of trades --}}
            <div class="p-2 border border-gray-500 rounded-md space-y-2">
                @foreach ($allMetaData as $item )
                <div class="w-full flex flex-row justify-between items-center p-2 border-b border-gray-400">
                    <div class="flex flex-row items-center space-x-4">
                        <img class="h-12 w-12 rounded-full" src="{{ asset('img/bitcoin.png') }}" alt="Bitcoin">
                        <div>
                            <a href="#"
                                class="font-semibold cursor-pointer hover:text-blue-400 max-w-[100px] overflow-hidden"><span>{{$item->symbol}}</span></a>
                            <p class="text-neutral-700 leading-none">{{$item->ticker}}</p>
                        </div>
                    </div>
                    <div>
                        <p>test</p>
                        <p class="{{ true ? 'text-red-400' : 'text-green-400 text-right' }} leading-none">
                            test%
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</x-main-layout>
