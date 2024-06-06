<a {{$attributes->merge(['class' => 'py-2 px-3 font-bold text-gray-700 hover:text-gray-900 cursor-pointer border-b-2' . ($active ? ' border-red-700' : ' border-transparent')])}}>
    {{$slot}}
</a>
