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
            <a href="#">Cotizacion</a>
        </li>
    </ul>

    <form action="{{ route('home') }}" class="flex justify-center w-1/4 p-4">
        <input type="text" name="keyword" id="keyword" class="w-full rounded-l-lg p-2 shadow-lg" placeholder="Buscar productos" required>
        <button class="bg-cyan-400 p-2 rounded-r-lg hover:bg-cyan-700 text-white shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
    </form>
</div>