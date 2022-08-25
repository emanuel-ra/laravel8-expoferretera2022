<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
   
    <header>
        @include('layout.header')
    </header>

    <div class="w-full p-2">
        @yield('content')
    </div>
    
    <footer></footer>

    <link rel="stylesheet" href="{{ asset('js/app.js') }}">
    
</body>
</html>