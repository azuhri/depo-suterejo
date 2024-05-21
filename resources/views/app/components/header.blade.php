@php
    $specialRoutes = [route('landing.home')];

    if (in_array(url()->current(), $specialRoutes)) {
        $primary = 'white';
        $secondary = 'primary';
    } else {
        $primary = 'primary';
        $secondary = 'white';
    }
@endphp


<header class="hidden md:flex w-full p-4 px-20 bg-{{ $primary }} shadow-lg md:grid md:grid-cols-5">
    <div class="flex items-center col-span-1">
        {{-- <img src="{{ asset('images/recycle.png') }}" alt=""> --}}
        <img class="w-[40px]" src="{{ asset('images/recycle2.png') }}" alt="">
        <span class="ml-2 font-bold  text-{{ $secondary }}">Solusi Sampah</span>
    </div>
    <div class="col-span-3 text-{{ $secondary }} flex justify-center items-center">
        <ul class="flex">
            <li
                class="mx-10  {{ url()->current() == route('landing.home') ? 'border-b border-' . $secondary . ' pb-1 font-bold' : 'font-medium' }}">
                <a href="{{ route('landing.home') }}">Beranda</a>
            </li>
            <li
                class="mx-10  {{ url()->current() == route('landing.aboutus') ? 'border-b border-' . $secondary . ' pb-1 font-bold' : 'font-medium' }}">
                <a href="{{ route('landing.aboutus') }}">Tentang Kami</a>
            </li>
            <li
                class="mx-10  {{ url()->current() == route('landing.services') ? 'border-b border-' . $secondary . ' pb-1 font-bold' : 'font-medium' }}">
                <a href="{{ route('landing.services') }}">Layanan</a>
            </li>
            <li
                class="mx-10  {{ url()->current() == route('landing.blog') ? 'border-b border-' . $secondary . ' pb-1 font-bold' : 'font-medium' }}">
                <a href="#">Blog</a>
            </li>
        </ul>
    </div>
    <div class="col-span-1 flex justify-end items-center">
        @if (Auth::user())
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button"
                    class="font-semibold text-{{ $secondary }} flex text-sm m-1 items-center">
                    <span class="mx-2">{{ Auth::user()->name }}</span>
                    <img class="border border-{{ $secondary }} border-gray-800 w-[40px] rounded-full"
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->email }}&background=FFFFFF&secondary=1F448B"
                        alt="">
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 border shadow bg-base-100 rounded-box w-52">
                    <li class="text-primary font-bold">
                        <a href="#">Profil</a>
                    </li>
                    <li class="text-primary font-bold">
                        <a href="{{route('account.transaction.list.index')}}">Riwayat Transaksi</a>
                    </li>
                    <li class="text-primary font-bold flex">
                        <form class="w-full flex" action="{{ route('account.logout') }}" method="POST">
                            @csrf
                            <button class="w-full text-left" type="submit">Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('auth.register') }}"
                class="mx-2 border border-{{ $secondary }} text-{{ $secondary }} font-medium p-2 px-6 rounded-full">Daftar</a>
            <a href="{{ route('auth.login') }}"
                class="mx-2 bg-{{ $secondary }} text-{{ $primary }} p-2 px-6 rounded-full">Masuk</a>
        @endif

    </div>
</header>

<div class="drawer relative z-[100000]">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content bg-gray-100 py-4 px-3 border-3 shadow lg:hidden flex justify-between">
        <!-- Page content here -->
        <div class="flex items-center">
            <img class="w-[40px]" src="{{ asset('images/recycle2.png') }}" alt="">
            <span class="ml-2 font-bold text-lg text-green-800">Solusi Sampah</span>
        </div>
        <label for="my-drawer" class="drawer-button cursor-pointer">
            <svg viewBox="0 0 24 24" width="30" height="30" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </label>
    </div>
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
            @if (Auth::user())
                <div class="collapse w-full">
                    <input type="checkbox" />
                    <div class="collapse-title text-xl font-medium w-full">
                        <div tabindex="0" role="button"
                            class="font-semibold flex text-sm m-1 items-center">
                            <img class="w-[40px] shadow rounded-full"
                                src="https://ui-avatars.com/api/?name={{ Auth::user()->email }}&background=FFFFFF&secondary=1F448B"
                                alt="">
                            <span class="mx-2 text-center">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                    <div class="collapse-content">
                        <ul tabindex="0"
                            class="p-2 border shadow rounded-box">
                            <li class="text-primary font-bold">
                                <a href="#">Profil</a>
                            </li>
                            <li class="text-primary font-bold">
                                <a href="{{route('account.transaction.list.index')}}">Riwayat Transaksi</a>
                            </li>
                            <li class="text-primary font-bold flex">
                                <form class="w-full flex" action="{{ route('account.logout') }}" method="POST">
                                    @csrf
                                    <button class="w-full text-left" type="submit">Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
            <!-- Sidebar content here -->
            <li class="{{ url()->current() == route('landing.home') ? 'font-bold' : '' }}">
                <a href="{{ route('landing.home') }}">Beranda</a>
            </li>
            <li class="{{ url()->current() == route('landing.aboutus') ? 'font-bold' : '' }}">
                <a href="{{ route('landing.aboutus') }}">Tentang Kami</a>
            </li>
            <li class="{{ url()->current() == route('landing.services') ? 'font-bold' : '' }}">
                <a href="{{ route('landing.services') }}">Layanan</a>
            </li>
            <li class="{{ url()->current() == route('landing.blog') ? 'font-bold' : '' }}">
                <a href="#">Blog</a>
            </li>

            @if (!Auth::user())
                <li class="{{ url()->current() == route('auth.login') ? 'font-bold' : '' }}">
                    <a href="{{ route('auth.login') }}">Masuk</a>
                </li>
                <li class="{{ url()->current() == route('auth.register') ? 'font-bold' : '' }}">
                    <a href="{{ route('auth.register') }}">Daftar</a>
                </li>
            @endif
        </ul>
    </div>
</div>
