@extends('home')
@section('content')

<div class="bg-white">
  <div class="pt-6">
    <nav aria-label="Breadcrumb">
      <ol role="list" class="max-w-2xl mx-auto px-4 flex items-center space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
        <li>
          <div class="flex items-center">
            <a href="{{ route('home') }}" class="mr-2 text-sm font-medium text-gray-900"> Inicio </a>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-5 text-gray-300">
              <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
            </svg>
          </div>
        </li>

        <li>
          <div class="flex items-center">
            <a href="#" class="mr-2 text-sm font-medium text-gray-900"> Producto </a>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-5 text-gray-300">
              <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
            </svg>
          </div>
        </li>

        <li class="text-sm">
          <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600"> {{ $item->code }} </a>
        </li>
      </ol>
    </nav>

    <!-- Image gallery -->
    <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">

        <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
            <img src="{{ asset('images/products') }}/{{$item->image}}" alt="{{ $item->name }}" class="w-full object-center object-cover">
        </div>


        <div class="hidden lg:grid lg:grid-cols-2 lg:gap-y-8">
            @if(count($gallery)>0)
                <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/products') }}/{{$gallery[0]->image}}" alt="Model wearing plain black basic tee." class="w-full  object-center object-cover">
                </div>
            @endif
            @if(count($gallery)>1)
            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                <img src="{{ asset('images/products') }}/{{$gallery[1]->image}}" alt="Model wearing plain black basic tee." class="w-full  object-center object-cover">
            </div>
            @endif
            @if(count($gallery)>2)
            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                <img src="{{ asset('images/products') }}/{{$gallery[2]->image}}" alt="Model wearing plain gray basic tee." class="w-full  object-center object-cover">
            </div>
            @endif
            @if(count($gallery)>3)
                <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/products') }}/{{$gallery[3]->image}}" alt="Model wearing plain gray basic tee." class="w-full  object-center object-cover">
                </div>
            @endif
        </div>            
        
    </div>

    <!-- Product info -->
    <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl uppercase">{{ $item->name }}</h1>
      </div>

      <!-- Options -->
      <div class="mt-4 lg:mt-0 lg:row-span-3">
        <h2 class="sr-only">Product information</h2>
        <p class="tracking-tight text-3xl text-gray-900">Menudeo: ${{ $item->price1 }}</p>
        <p class="tracking-tight text-3xl text-gray-900">Mayoreo: ${{ $item->price2 }}</p>
        <p class="tracking-tight text-3xl text-gray-900">Distribuidor: ${{ $item->price3 }}</p>

        <form class="mt-10">
            <button type="submit" class="mt-10 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Agregar
            </button>
        </form>
      </div>

      <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <!-- Description and details -->
        @if(count($sheet_description))
            <div>
            <h3 class="sr-only">Description</h3>

            <div class="space-y-6">
                <p class="text-base text-gray-900">{{ $sheet_description[0]->description }}</p>            
            </div>
            </div>
        @endif
        
        @if(count($sheet_content))
            <div class="mt-10">
                <h3 class="text-sm font-medium text-gray-900">Contenido</h3>

                <div class="mt-4">
                    <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                        @foreach($sheet_content as $key)
                            <li class="text-gray-400"><span class="text-gray-600">{{ $key->description }}</span></li>                            
                        @endforeach
                    </ul>
                </div>
            </div>            
        @endif

        @if(count($sheet_specifications))
            @foreach($sheet_specifications as $key)
            <div class="mt-10">
                <h3 class="text-sm font-medium text-gray-900">{{$key->title}}</h3>

                <div class="mt-4">
                    <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                        @php $l=0; @endphp
                        @for($i=1;$i<count($key->sub);)
                            <li class="text-gray-400">
                                <span class="text-gray-600">
                                    {{$key->sub[$l]->description}} {{$key->sub[$i]->description}}
                                </span>
                                </li>
                            @php $i+=2 @endphp
                            @php $l = $i-1 @endphp
                            
                        @endfor
                    </ul>
                </div>
            </div>
            
            @endforeach
        @endif


      </div>
    </div>
  </div>
</div>


@endsection