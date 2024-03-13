<header class="flex w-full p-4 px-20 bg-primary text-white grid grid-cols-5">
    <div class="flex items-center col-span-1">
        <img src="{{ asset('images/recycle.png') }}" alt="">
        <span class="ml-2">Depo Sutorejo</span>
    </div>
    <div class="col-span-3 flex justify-center items-center">
        <ul class="flex">
            <li class="mx-4 border-b border-white pb-2"><a href="#">Beranda</a></li>
            <li class="mx-4"><a href="#">Tentang Kami</a></li>
            <li class="mx-4"><a href="#">Layanan</a></li>
            <li class="mx-4"><a href="#">Blog</a></li>
        </ul>
    </div>
    <div class="col-span-1 flex justify-end items-center">
        <a href="{{ route('auth.register') }}" class="mx-2 border border-white text-white p-2 px-4 rounded-lg">Daftar</a>
        <a href="{{ route('auth.login') }}" class="mx-2 bg-white text-primary p-2 px-4 rounded-lg">Masuk</a>
    </div>
</header>