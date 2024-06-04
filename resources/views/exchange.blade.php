<x-main-layout>
    <div>
        <h1>Welcome to exchangefff</h1>
        <div class="w-full h-full overflo-auto">
            <table  class="border border-black w-full overflow-auto">
                <thead>
                    <tr>
                        @foreach ($data[0]->getAttributes() as $key => $value)
                            <th>{{ $key }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    
                        <tr>
                         
                            @foreach ($item->getAttributes() as $value)
                                <td><a href="{{route('exchange-details',['symbol'=>$item->symbol])}}">{{ $value }} </a></td>
                            @endforeach
                        
                        </tr>
                   
                    @endforeach
                </tbody>
            </table>
        </div>
</x-main-layout>
