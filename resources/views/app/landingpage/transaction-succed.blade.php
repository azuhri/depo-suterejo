<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Succeed | Depo Sutorejo</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="hero min-h-screen"
        style="background-image: url({{asset("images/success_transaction.png")}});">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-6xl font-bold text-white">Terimakasih!</h1>
                <p class="my-2 text-xl text-white">Anda berhasil mendaur ulang <span class="font-bold">{{$transaction->weight_kg}}kg</span> sampah</p>
                <p class="my-2 text-xl text-white mb-6">dan membantu lingkungan menjadi lebih bersih!</p>
                <a href="{{route("landing.home")}}" class="p-3 px-8 rounded-lg bg-gray-50 font-bold text-gray-500">OK</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery3.7.js') }}"></script>
</body>
<script>
    setTimeout(() => {
        window.location.href="{{route("landing.home")}}"
    }, 10*1000);
</script>
</html>
