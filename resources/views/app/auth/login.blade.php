<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Depo Sutorejo | Login Page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('{{asset("images/bg-login.png")}}')">
        <div class="fixed h-screen w-full bg-gray-900 z-5 opacity-50"></div>
        <div class="fixed h-screen w-full z-6 flex justify-center items-center">
            <div>
                <p class="text-4xl text-white text-center w-full">Masuk</p>
                <form action="" class="my-6">
                    <input type="text" class="w-full backdrop-blur-lg placeholder-white font-bold bg-white bg-opacity-50 text-white my-4 p-4 px-6 rounded-full" placeholder="Nama pengguna/nomor telepon">
                    <input type="password" class="w-full backdrop-blur-lg placeholder-white font-bold bg-white bg-opacity-50 text-white my-4 p-4 px-6 rounded-full" placeholder="Kata sandi">
                    <button class="mt-6 text-xl bg-primary w-full p-3 py-4 text-center rounded-full text-white">
                        Masuk
                    </button>
                    <p class="text-md mt-4 text-center w-full text-white"> Belum punya akun ? <a href="{{route("auth.register")}}" class="font-bold text-primary">&nbsp;Daftar</a> </p>
                </form>
            </div>
        </div>
    </div>
    {{-- <img src="{{asset("images/bg-login.png")}}" alt=""> --}}
</body>
</html>