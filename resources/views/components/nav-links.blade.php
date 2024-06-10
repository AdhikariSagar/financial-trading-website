<!-- resources/views/components/nav-links.blade.php -->

<a {{$attributes->merge(['class' => 'py-1 px-3 text-lg font-extrabold text-gray-700 hover:text-gray-900 cursor-pointer inline-block border-b-2' . ($active ? ' border-red-700' : ' border-transparent')])}}>
    {{$slot}}
</a>

