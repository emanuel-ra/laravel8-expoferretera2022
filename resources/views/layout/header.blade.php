<div class="header">
    <img class="header__logo" src="{{ asset('images/logo/massivehome.png') }}" alt="">
    <img class="header__logo" src="{{ asset('images/logo/linlbitscomercio.png') }}" alt="">
    <img class="header__logo" src="{{ asset('images/logo/VIVIMXHOME.png') }}" alt="">
    <img class="header__logo" src="{{ asset('images/logo/elrinconsalud.jpg') }}" alt="">
</div>

<div class="nav">
    <ul class="nav__options">
        <li class="nav__options__option">
            <a href="{{ route('home') }}">Inicio</a>
        </li>
        <li class="nav__options__option">
            <a href="{{ route('prospects_list') }}">Prospecto</a>
        </li>
        <li class="nav__options__option">
            <a href="{{ route('quote') }}">Cotización</a>
        </li>
    </ul>

    
    <div class="flex w-1/2 justify-end">
        
        <form action="{{ route('home') }}" class="flex justify-center w-1/2 p-4">
            <input type="text" name="keyword" id="keyword" class="w-full rounded-l-lg p-2 shadow-lg" value="{{ (isset($keyword)) ? $keyword:'' }}" placeholder="Buscar productos" >
            <button class="bg-cyan-400 p-2 rounded-r-lg hover:bg-cyan-700 text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
        </form>
        
        <div class="w-24">
            <a href="{{ route('cart') }}" class="block w-full h-full flex justify-center items-center relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                <span class="absolute top-2 font-bold">
                    {{ Cart::getTotalQuantity(); }}
                </span>
            </a>
        </div>
    </div>

</div>