<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Depo Sutorejo | Register Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/bg-login2.png') }}')">
        <div class="fixed h-screen w-full bg-gray-900 z-5 opacity-50"></div>
        <div class="fixed h-screen w-full z-6 flex justify-center items-center">
            <div class="w-4/5 lg:w-1/3">
                <p class="text-4xl text-white text-center w-full">Daftar</p>
                <form action="{{ route('auth.register.post') }}" method="POST" id="formRegister" class="my-6">
                    @csrf
                    <div class="flex">
                        <input type="text" required name="name"
                            class="w-full mr-1 backdrop-blur-xs placeholder-white font-normal bg-gray-900 border border-gray-500 bg-opacity-50 text-white my-4 p-4 px-6 rounded-full"
                            value="{{old("name")}}"
                            placeholder="Nama Lengkap">
                        <input type="text" required name="email"
                            class="w-full ml-1 backdrop-blur-xs placeholder-white font-normal bg-gray-900 border border-gray-500 bg-opacity-50 text-white my-4 p-4 px-6 rounded-full"
                            value="{{old("email")}}"
                            placeholder="Username/Email">
                    </div>
                    <input type="number" required name="phonenumber"
                        class="w-full backdrop-blur-xs placeholder-white font-normal bg-gray-900 border border-gray-500 bg-opacity-50 text-white my-4 p-4 px-6 rounded-full"
                        value="{{old("phonenumber")}}"
                        placeholder="Nomor Telepon">
                    <input type="password" required name="password"
                        class="w-full backdrop-blur-xs placeholder-white font-normal bg-gray-900 border border-gray-500 bg-opacity-50 text-white my-4 p-4 px-6 rounded-full"
                        placeholder="Kata Sandi">
                    <button onclick="loginForm(this, event)"
                        class="mt-6 text-xl bg-blue-500 w-full p-3 py-4 text-center rounded-full text-white">
                        Daftar
                    </button>
                    <p class="text-md mt-4 text-center w-full text-white"> Sudah punya akun ? <a
                            href="{{ route('auth.login') }}" class="font-bold text-blue-500">&nbsp;Masuk</a> </p>
                </form>
            </div>
        </div>
    </div>
    {{-- <img src="{{asset("images/bg-login.png")}}" alt=""> --}}
    <script src="{{ asset('js/jquery3.7.js') }}"></script>
    <script src="{{ asset('js/toaster.js') }}"></script>
    <script>
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

        const loginForm = (self, e) => {
            e.preventDefault();
            $("#formRegister").submit();
        }
    </script>
</body>

</html>
