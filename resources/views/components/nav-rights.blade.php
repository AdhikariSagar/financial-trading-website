<!-- resources/views/components/nav-rights.blade.php -->

<a {{ $attributes->merge(['class' => 'px-2 text-gray-700 hover:text-gray-900 cursor-pointer']) }}>
    {{ $slot }}
</a>
