<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Title --}}
    <title>@yield('title') | Depo Sutorejo</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Navigator --}}
    @include('app.components.navigator')

    {{-- Hero --}}
    <div class="w-full bg-cover bg-center h-screen">
        <img class="w-full max-h-[92vh]" src="{{url('/')}}/@yield("hero")" alt="">
    </div>

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    @include("app.components.footer")
</body>

</html>
