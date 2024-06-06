<x-main-layout>
    <x-details-wrapper>
        <div>
            <div><span class="text-3xl font-semibold">{{ $stock->name }}</span><span
                    class="text-3xl font-thin ml-2">{{ $stock->ticker }}</span></div>
            <div class="flex items-center mt-1">
                <span class="h-8 flex items-center leading-none w-fit px-3 rounded-full bg-purple-600 text-white">Stock</span>
                <span class="h-2 w-2 bg-gray-400 rounded-full mx-2"></span>
            </div>
        </div>
        <div>{{ $stock->description }}</div>
        <div class="mt-8 h-full w-full flex flex-col space-y-4 lg:flex-row lg:space-x-4 lg:space-y-0">
           {{-- Graph container --}}
            <div class="w-full h-[400px]  lg:w-[65%] "></div>
            {{-- Other details --}}
            <div class="w-full  h-[400px] lg:w-[35%] "></div>
        </div>
    </x-details-wrapper>

</x-main-layout>
