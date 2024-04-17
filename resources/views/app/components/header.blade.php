@php
    $specialRoutes = [
        route("landing.home")
    ]; 

    if(in_array(url()->current(), $specialRoutes)) {
        $primary = "white";
        $secondary = "primary";
    } else {
        $primary = "primary";
        $secondary = "white";
    }
@endphp


<header class="hidden md:flex w-full p-4 px-20 bg-{{$primary}} shadow-lg md:grid md:grid-cols-5">
    <div class="flex items-center col-span-1">
        <img src="{{ asset('images/recycle.png') }}" alt="">
        <span class="ml-2 font-bold  text-{{$secondary}}">Solusi Sampah</span>
    </div>
    <div class="col-span-3 text-{{$secondary}} flex justify-center items-center">
        <ul class="flex">
            <li class="mx-10  {{url()->current() == route("landing.home") ? "border-b border-".$secondary." pb-1 font-bold" : "font-medium"}}"><a href="{{route("landing.home")}}">Beranda</a></li>
            <li class="mx-10  {{url()->current() == route("landing.aboutus") ? "border-b border-".$secondary." pb-1 font-bold" : "font-medium"}}"><a  href="{{route("landing.aboutus")}}">Tentang Kami</a></li>
            <li class="mx-10  {{url()->current() == route("landing.services") ? "border-b border-".$secondary." pb-1 font-bold" : "font-medium"}}"><a href="{{route("landing.services")}}">Layanan</a></li>
            <li class="mx-10  {{url()->current() == route("landing.blog") ? "border-b border-".$secondary." pb-1 font-bold" : "font-medium"}}"><a href="#">Blog</a></li>
        </ul>
    </div>
    <div class="col-span-1 flex justify-end items-center">
        @if (Auth::user())
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="font-semibold text-{{$secondary}} flex text-sm m-1 items-center">
                    <span class="mx-2">Azis Zuhri Pratomo</span>
                    <img class="border border-{{$secondary}} border-gray-800 w-[40px] rounded-full"
                        src="https://ui-avatars.com/api/?name={{Auth::user()->email}}&background=FFFFFF&secondary=1F448B" alt="">
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 border shadow bg-base-100 rounded-box w-52">
                    <li class="text-primary font-bold">
                        <a href="#">Profil</a>
                    </li>
                    <li class="text-primary font-bold">
                        <a href="#">Riwayat Transaksi</a>
                    </li>
                    <li class="text-primary font-bold flex">
                        <form class="w-full flex" action="{{route('account.logout')}}" method="POST">
                            @csrf
                            <button class="w-full text-left" type="submit">Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('auth.register') }}"
                class="mx-2 border border-{{$secondary}} text-{{$secondary}} font-medium p-2 px-6 rounded-full">Daftar</a>
              <a href="{{ route('auth.login') }}" class="mx-2 bg-{{$secondary}} text-{{$primary}} p-2 px-6 rounded-full">Masuk</a>
        @endif

    </div>
</header>
