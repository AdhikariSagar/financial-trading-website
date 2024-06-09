<!-- resources/views/components/header.blade.php -->

<div class="bg-white shadow-sm px-4 md:px-8 lg:px-32 fixed w-full top-0 left-0">
        <a href="/" class="text-xl font-bold text-center text-red-500 hover:text-gray-700 md:text-2xl">Trading</a>        
        <nav class="flex-no-wrap flex w-full text-center overflow-auto scrollbar-none">
                <!-- Primary Nav -->
                <div class="flex flex-no-wrap whitespace-nowrap items-center space-x-1">
                    <x-nav-links href="/stock" :active="request()->is('stock')">Stock</x-nav-links>
                    <x-nav-links href="/cryptocurrency" :active="request()->is('cryptocurrency')">Crypto</x-nav-links>
                    <x-nav-links href="/etc" :active="request()->is('etc')">ETCs</x-nav-links>
                    <x-nav-links href="/etf" :active="request()->is('etf')">ETFs</x-nav-links>
                    <x-nav-links href="/fund" :active="request()->is('fund')">Fund</x-nav-links>
                    <x-nav-links href="/index" :active="request()->is('index')">Index</x-nav-links>
                    <x-nav-links href="/commodity" :active="request()->is('commodity')">Commodity</x-nav-links>
                    <x-nav-links href="/mf" :active="request()->is('mf')">Mutual Fund</x-nav-links>
                </div>
        </nav>
    </div>
</div>
