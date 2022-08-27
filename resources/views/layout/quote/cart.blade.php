@extends('home')
@section('content')
<div class="w-full flex justify-center">
    
    <div class="container flex flex-wrap">       
            
        <form action="{{ route('cart_price') }}" method="post" class="flex w-full gap-2 justify-end p-2">
            @csrf
            <div class="flex items-center">
                <input <?=($type_price==1)?'checked':''?> id="radio_menudeo" onclick="javascript: submit()" type="radio" value="1" name="radio_type_price" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="radio_menudeo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Menudeo</label>
            </div>

            <div class="flex items-center">
                <input <?=($type_price==2)?'checked':''?> id="radio_mayoreo" onclick="javascript: submit()" type="radio" value="2" name="radio_type_price" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="radio_mayoreo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Mayoreo</label>
            </div>

            <div class="flex items-center">
                <input <?=($type_price==3)?'checked':''?> id="radio_distribuidor" onclick="javascript: submit()" type="radio" value="3" name="radio_type_price" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="radio_distribuidor" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Distribuidor</label>
            </div>
        </form>
        
        <div class="w-[60%] grid grid-cols-1 gap-2">
            @foreach($cart as $key)                
                <div class="w-full flex border-t-2 border-b-2 mt-2 p-2">
                    
                    <div class="w-1/3 flex justify-center items-center ">
                        <img src="{{ asset('images/products') }}/{{$key->associatedModel->image}}" class="rounded-lg" alt="{{$key->name}}">
                    </div>                    
                    
                    <div class="p-2 w-10/12">
                        <h2 class="text-xl">{{$key->name}}</h2>
                        <span class="text-lg font-semibold">{{ $key->associatedModel->code }}</span>
                        <br>

                        <span class="text-SM text-gray-600 ">
                            @if($type_price == 1)
                                $ {{ number_format(($key->price*$key->quantity),2,'.',',') }}
                            @endif
                            
                            @if($type_price == 2)
                                $ {{ number_format(($key->associatedModel->price2*$key->quantity),2,'.',',') }}
                            @endif

                            @if($type_price == 3)
                                $ {{ number_format(($key->associatedModel->price3*$key->quantity),2,'.',',') }}
                            @endif
                        </span>
                        
                        <div class="w-1/2 flex mt-2">

                            <a href="{{ url('/cart/minus').'/'.$key->id }}" class="bg-gray-300 hover:bg-gray-500 hover:text-white p-2 flex items-center justify-center w-11 rounded-l-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" d="M5 12h14" />
                                </svg>
                            </a>

                            <form action="{{ route('cart_update') }}" method="POST" class="w-24" method="POST">         
                                @csrf
                                <input type="hidden" name="id" value="{{ $key->id }}" >                       
                                <input type="text" name="qty" class="w-full p-2 text-center border-2" value="{{ $key->quantity }}">                                
                            </form>

                            <a href="{{ url('/cart/plus').'/'.$key->id }}" class="bg-gray-300 hover:bg-gray-500 hover:text-white p-2 flex items-center justify-center w-11  rounded-r-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
                                </svg>
                            </a>

                        </div>

                        <div class="w-full mt-2">
                            <a href="{{ url('/cart/remove').'/'.$key->id }}" class="flex w-24 bg-red-400 p-2 rounded-xl hover:bg-red-600 hover:text-white hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                Eliminar
                            </a>
                        </div>

                    </div>
                </div>            
            @endforeach
        </div>

        <div class="w-[40%] p-2 relative">
            <form action="{{ route('cart_price') }}" method="post" class="w-[30%] fixed">
                @csrf
                <div class="w-full bg-gray-300 rounded-lg shadow-lg">
                    <h2 class="text-center text-2xl text-gray-700 font-semibold p-2">Resumen del pedido</h2>
                    
                    <div class="w-full border-t-2 p-4 flex justify-between text-gray-700">
                        <span class="block text-3xl">Total</span>
                        <span class="block text-3xl">${{ number_format($total,2,'.',',') }}</span>
                    </div>

                </div>

                <div class="w-full mt-2">
                    <label for="">Prospecto</label>
                    <select name="prospect_id" id="prospect_id" class="w-full p-2 border-b-2" required>
                        <option value=""></option>
                        @foreach($prospects as $key)
                            <option value="{{ $key->id }}">{{ $key->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full mt-2">
                    <label for="">Comentarios</label>
                    <textarea name="commentary" class="w-full border-2 rounded-lg p-3"></textarea>
                </div>

                <div class="w-full mt-2">
                    <label for="">Atendido por</label>
                    <input type="text" class="w-full border-2  rounded-lg p-3">
                </div>

                <div class="w-full mt-2">
                    <button class="bg-blue-400 w-full rounded-lg p-3 font-semibold hover:bg-blue-600 shadow-lg hover:shadow-2xl">
                        Guardar Cotización
                    </button>
                </div>

            </form>
        </div>

    </div>     
    
   

</div>     
@endsection