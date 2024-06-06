<x-main-layout>
    <h1 class="text-2xl">All sector stocks</h1>
    <table class="w-[400px]">
        <thead>
            <tr>
                @foreach ($stockMetaData as $stock)
                    <th class="text-left">{{ $stock->sector }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($stockMetaData as $stock)
                    <td><a href="/stock-details/{{ $stock->symbol }}" class="cursor-pointer hover:text-blue-400">{{ $stock->name }} ({{ $stock->exchange }})</a></td>
                @endforeach
            </tr>
        </tbody>
    </table>
</x-main-layout>
