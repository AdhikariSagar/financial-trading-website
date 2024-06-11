<!-- resources/views/components/header.blade.php -->

<div class="bg-slate-200 shadow-sm px-4 md:px-8 lg:px-32 fixed w-full top-1 left-0 z-10">
    <!-- Website Name -->
    <div class="flex items-center justify-center pt-1">
        <a href="/" class="text-2xl md:text-3xl font-bold text-red-500 hover:text-gray-700">
            <span class="bg-gradient-to-r from-red-400 via-red-500 to-red-600 bg-clip-text text-transparent">
                Trading
            </span>
        </a>
    </div>
    
    <!-- Navigation -->
    <div class="flex items-center justify-between">
        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="block md:hidden text-gray-700 hover:text-gray-900">
            <i class="fas fa-bars"></i>
        </button>
        
        <nav class="hidden md:flex w-full items-center ml-4">
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
            <!-- Spacer -->
            <div class="flex-1"></div>
            <!-- Social Media Links -->
            <div class="flex items-center space-x-1">
                <x-nav-rights href="https://facebook.com" class="fa-brands fa-facebook"></x-nav-rights>
                <x-nav-rights href="https://twitter.com" class="fa-brands fa-twitter"></x-nav-rights>
                <x-nav-rights href="https://instagram.com" class="fa-brands fa-instagram"></x-nav-rights>
                <x-nav-rights href="https://linkedin.com" class="fa-brands fa-linkedin"></x-nav-rights>
            </div>
        </nav>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden w-full bg-slate-300 shadow-md absolute top-16 left-0 z-10">
        <div class="flex flex-col p-1">
            <x-nav-links href="/stock" :active="request()->is('stock')">Stock</x-nav-links>
            <x-nav-links href="/cryptocurrency" :active="request()->is('cryptocurrency')">Crypto</x-nav-links>
            <x-nav-links href="/etc" :active="request()->is('etc')">ETCs</x-nav-links>
            <x-nav-links href="/etf" :active="request()->is('etf')">ETFs</x-nav-links>
            <x-nav-links href="/fund" :active="request()->is('fund')">Fund</x-nav-links>
            <x-nav-links href="/index" :active="request()->is('index')">Index</x-nav-links>
            <x-nav-links href="/commodity" :active="request()->is('commodity')">Commodity</x-nav-links>
            <x-nav-links href="/mf" :active="request()->is('mf')">Mutual Fund</x-nav-links>
            <!-- Social Media Links -->
            <div class="flex items-center space-x-2 mt-4">
                <x-nav-rights href="https://facebook.com" class="fa-brands fa-facebook"></x-nav-rights>
                <x-nav-rights href="https://twitter.com" class="fa-brands fa-twitter"></x-nav-rights>
                <x-nav-rights href="https://instagram.com" class="fa-brands fa-instagram"></x-nav-rights>
                <x-nav-rights href="https://linkedin.com" class="fa fa-linkedin"></x-nav-rights>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle the mobile menu
    document.getElementById('menu-toggle').addEventListener('click', function() {
        var mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
        } else {
            mobileMenu.classList.add('hidden');
        }
    });
</script>
