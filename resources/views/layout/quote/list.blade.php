@extends('home')
@section('content')
<div class="w-full">

    <div class="w-full p-2 flex justify-end">
        <a href="{{route('prospects_add')}}" class="bg-blue-400 hover:bg-blue-700 hover:text-white flex p-3 rounded-lg hover:shadow-lg">
            Registrar 
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-1" >
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </a>    
    </div>
    
    <div class="w-full border-2 shadow-lg">
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">id</th>
                        <th scope="col" class="py-3 px-6">Prospecto</th>
                        <th scope="col" class="py-3 px-6">Atendido por</th>
                        <th scope="col" class="py-3 px-6">Tipo de Precio</th>
                        <th scope="col" class="py-3 px-6">Total</th>
                        <th scope="col" class="py-3 px-6">Fecha</th>
                        <th scope="col" class="py-3 px-6"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key->id }}
                                </td>
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key->prospect->name }}
                                </td>
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key->attended_by }}
                                </td>
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if($key->type_price==1)
                                        Menudeo
                                    @endif

                                    @if($key->type_price==2)
                                        Mayoreo
                                    @endif

                                    @if($key->type_price==3)
                                        Distribuidor
                                    @endif
                                </td>
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key->total }}
                                </td>
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key->created_at }}
                                </td>

                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="{{ url('quote/pdf') }}/{{ $key->id }}" target="_blank" class="hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </a>
                                </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>     
    </div>

</div>     
@endsection