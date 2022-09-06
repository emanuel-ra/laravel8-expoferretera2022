@extends('home')
@section('content')
       
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        {{ $items->appends(['keyword' => $keyword])->links() }}
    </div>
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Artículos</h2>

            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @foreach($items as $key)
                    <div class="group relative">
                        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            <img src="{{ asset('images/products') }}/{{$key->image}}" onerror="this.src='{{ asset('images/image-not-found.png') }}';" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="{{ url('/products/view').'/'.$key->id }}" class="uppercase">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ Str::substr($key->name,0, 30) }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{$key->code}}</p>
                            </div>

                            <p class="text-sm font-medium text-gray-900">${{ number_format($key->price1,2) }}</p>
                            
                        </div>
                    </div>
                @endforeach 

            <!-- More products... -->
            </div>
        </div>
    </div>       
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        {{ $items->appends(['keyword' => $keyword])->links() }}
    </div>
@endsection