<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Title --}}
    <title>@yield('title') | Depo Sutorejo</title>
    @vite('resources/css/app.css')
    @yield('css')
</head>

<body>
    {{-- Navigator --}}
    @include('app.components.header')

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    @include("app.components.footer")
    <script src="{{ asset('js/jquery3.7.js') }}"></script>
    <script src="{{ asset('js/toaster.js') }}"></script>
    <script>
        @if (session('success'))
           vt.success("{{ session('success') }}", {
               title: "Notifikasi",
               position: "bottom-right",
               // position: toastPosition.TopCenter,
               duration: 4000,
               closable: false,
               focusable: false,
               callback: undefined
           })
       @endif
       @if (session('error'))
           vt.error("{{ session('error') }}", {
               title: "Notifikasi",
               position: "bottom-right",
               // position: toastPosition.TopCenter,
               duration: 4000,
               closable: false,
               focusable: false,
               callback: undefined
           })
       @endif
   </script>
   @yield('js')
</body>

</html>
