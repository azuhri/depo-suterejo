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
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('{{asset("images/bg-login2.png")}}')">
        <div class="fixed h-screen w-full bg-gray-900 z-5 opacity-50"></div>
        <div class="fixed h-screen w-full z-6 flex justify-center items-center">
            <div class="px-10">
                <p class="text-4xl text-white text-center w-full">Masuk</p>
                <form action="{{route('auth.login.post')}}" method="POST" class="my-6">
                    @csrf
                    <input type="text" name="username" value="{{old("username")}}" class="w-full backdrop-blur-xs placeholder-white font-normal bg-gray-900 border border-gray-500 bg-opacity-50 text-white my-4 p-4 px-6 rounded-full" placeholder="Masukan username atau nomor telepon">
                    <input type="password" name="password" class="w-full backdrop-blur-xs placeholder-white font-normal bg-gray-900 border border-gray-500 bg-opacity-50 text-white my-4 p-4 px-6 rounded-full" placeholder="Masukan kata sandi">
                    <button class="mt-6 text-xl bg-blue-500 w-full p-3 py-4 text-center rounded-full text-white">
                        Masuk
                    </button>
                    <p class="text-md mt-4 text-center w-full text-white"> Belum punya akun ? <a href="{{route("auth.register")}}" class="font-bold text-blue-500">&nbsp;Daftar</a> </p>
                </form>
            </div>
        </div>
    </div>
    {{-- <img src="{{asset("images/bg-login.png")}}" alt=""> --}}
    <script src="{{ asset('js/jquery3.7.js') }}"></script>
    <script src="{{ asset('js/toaster.js') }}"></script>
    <script>
         @if (session('success'))
            vt.success("{{ session('success') }}", {
                title: "Notifikasi",
                position: "top-center",
                // position: toastPosition.TopCenter,
                duration: 8000,
                closable: false,
                focusable: false,
                callback: undefined
            })
        @endif
        @if (session('error'))
            vt.error("{{ session('error') }}", {
                title: "Peringatan!",
                position: "top-center",
                // position: toastPosition.TopCenter,
                duration: 8000,
                closable: false,
                focusable: false,
                callback: undefined
            })
        @endif
    </script>
</body>
</html>