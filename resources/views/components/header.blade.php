<!-- resources/views/components/header.blade.php -->

<div class="bg-white shadow-sm px-8">
        <a href="#" class="text-gray-800 text-xl font-bold hover:text-gray-700 md:text-2xl">Brand</a>        
        <nav class="flex-no-wrap flex w-full items-center">
                <!-- Primary Nav -->
                <div class="hidden md:flex flex-no-wrap whitespace-nowrap items-center space-x-2 w-full overflow-x-auto">
                    <x-nav-links href="/stock" :active="request()->is('stock')">Stock</x-nav-links>
                    <x-nav-links href="/cryptocurrency" :active="request()->is('cryptocurrency')">Cryptocurrency</x-nav-links>
                    <x-nav-links href="/etc" :active="request()->is('etc')">Exchange traded commodity </x-nav-links>
                    <x-nav-links href="/etf" :active="request()->is('etf')">Exchange traded fund</x-nav-links>
                    <x-nav-links href="/fund" :active="request()->is('fund')">Fund</x-nav-links>
                    <x-nav-links href="/index" :active="request()->is('index')">Index</x-nav-links>
                    <x-nav-links href="/commodity" :active="request()->is('commodity')">Commodity</x-nav-links>
                    <x-nav-links href="/mf" :active="request()->is('mf')">Mutual fund</x-nav-links>
                </div>
        </nav>
    </div>
</div>
