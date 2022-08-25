@extends('home')
@section('content')
<div class="w-full flex justify-center items-center">
    <div class="container p-2">
        <h1>Registro de Prospectó</h1>
        <div class="w-full bg-gray-200 p-4 rounded-lg shadow-lg mt-3">
            
            <form action="{{ route('prospects_store') }}" class="w-full flex-col" method="POST">
                @csrf

                <div class="flex mt-3">
                    <input type="text" name="name" id="name" placeholder="Capture el nombre" value="{{old('name')}}" class="w-full p-2 text-lg shadow-lg text-gray-700" >
                </div>

                <div class="flex mt-3">
                    <input type="text" name="phone" id="phone" placeholder="Capture el teléfono" value="{{old('phone')}}" class="w-full p-2 text-lg shadow-lg text-gray-700" >
                </div>

                <div class="flex mt-3">
                    <input type="text" name="email" id="email" placeholder="Capture el email" value="{{old('email')}}" class="w-full p-2 text-lg shadow-lg text-gray-700">
                </div>

                <div class="flex mt-3">
                    <input type="text" name="state" id="state" list="states" placeholder="Capture el estado" value="{{old('state')}}" class="w-full p-2 text-lg shadow-lg text-gray-700">
                    <datalist id="states">
                        @foreach($State as $key)
                            <option value="{{$key->name}}">
                        @endforeach
                    </datalist>
                </div>

                <div class="flex mt-3">
                    <input type="text" name="city" id="city" placeholder="Capture la ciudad" value="{{old('city')}}" class="w-full p-2 text-lg shadow-lg text-gray-700">
                </div>

                <div class="flex mt-3">
                    <input type="text" name="address" id="address" placeholder="Capture la dirección" value="{{old('address')}}" class="w-full p-2 text-lg shadow-lg text-gray-700">
                </div>

                <div class="flex mt-3">
                    <input type="text" name="zip_code" id="zip_code" placeholder="Capture el código postal" value="{{old('zip_code')}}" class="w-full p-2 text-lg shadow-lg text-gray-700">
                </div>

                <div class="flex mt-3">
                    <input type="text" name="comercial_business" id="comercial_business" value="{{old('comercial_business')}}" placeholder="Capture el giro comercial" class="w-full p-2 text-lg shadow-lg text-gray-700">
                </div>

                <div class="flex mt-3">
                    <textarea name="commentary" class="w-full p-2 text-lg shadow-lg text-gray-700" value="{{old('commentary')}}" placeholder="Comentarios"></textarea>
                </div>

                @if ($errors->any())
                    <div class="w-full bg-red-600 text-white p-5 text-lg rounded-xl shadow-xl mt-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="w-full p-2 flex justify-end">
                    <button class="bg-blue-400 p-2 rounded-lg hover:bg-blue-700 hover:text-white hover:shadow-lg">Guardar</button>
                </div>
                
            </form>            
    
        </div>     
    </div>   
</div>     
@endsection