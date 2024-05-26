@extends('app.template.master_landingpage')

@section('title')
    Profil Saya
@endsection

@section('hero')
@endsection

@section('content')
    <div class="my-32 mb-40 flex justify-center">
        <div class="w-full md:w-4/5 flex justify-center items-center flex-col">
            <p class="text-3xl text-center font-extrabold text-primary">
                AKUN SAYA
            </p>
            <div class="flex md:flex-row flex-col items-center md:items-start md:justify-between w-full my-12">
                <div class="flex w-1/4 flex-col mb-4 items-center">
                    <img class="w-[200px] md:w-[120px] lg:w-[200px] shadow rounded-full border border-gray-800 my-4"
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->email }}&background=FFFFFF&color=1F448B"
                        alt="">
                    <div class="flex flex-col items-center">
                        <p class="text-md text-primary font-semibold">{{Auth::user()->name}}</p>
                        <p class="text-xs text-primary font-normal">{{Auth::user()->email}}</p>
                    </div>
                </div>
                <div class="w-10/12 md:w-3/4 flex flex-col">
                    <form action="{{route("account.profile.update")}}" method="POST" class="bg-base-100 border-2 shadow py-3 px-4 rounded-lg">
                        @csrf
                        <div class="flex flex-col">
                            <label for="name" class="my-2 text-primary font-bold">Nama Lengkap</label>
                            <input type="text" value="{{Auth::user()->name}}" class="p-2 w-full border border-gray-500 rounded-lg" name="name" id="name">
                        </div>
                        <div class="flex flex-col">
                            <label for="email" class="my-2 text-primary font-bold">Email</label>
                            <input type="text" value="{{Auth::user()->email}}" class="p-2 w-full border border-gray-500 rounded-lg" name="email" id="email">
                        </div>
                        <div class="flex flex-col">
                            <label for="phonenumber" class="my-2 text-primary font-bold">Nama Lengkap</label>
                            <input type="text" value="{{Auth::user()->phonenumber}}" class="p-2 w-full border border-gray-500 rounded-lg" name="phonenumber" id="phonenumber">
                        </div>
                        <button class="my-6 w-full rounded-xl p-4 bg-primary text-white">SIMPAN</button>
                    </form>
                    <form action="{{route('account.change-password')}}" method="POST" class="bg-base-100 border-2 shadow py-3 px-4 rounded-lg my-4">
                        @csrf
                        <div class="flex flex-col">
                            <label for="old_password" class="my-2 text-primary font-bold">Password Lama Anda</label>
                            <input type="password" placeholder="Masukan password lama Anda..." class="p-2 w-full border border-gray-500 rounded-lg" name="old_password" id="old_password">
                        </div>
                        <div class="flex flex-col">
                            <label for="new_password" class="my-2 text-primary font-bold">Pasword Baru Anda</label>
                            <input type="password" placeholder="Masukan password Baru Anda..." class="p-2 w-full border border-gray-500 rounded-lg" name="new_password" id="new_password">
                        </div>
                        <div class="flex flex-col">
                            <label for="confirm_new_password" class="my-2 text-primary font-bold">Konfirmasi Password Baru</label>
                            <input type="password" placeholder="Konfirmasi password Baru Anda..." class="p-2 w-full border border-gray-500 rounded-lg" name="confirm_new_password" id="confirm_new_password">
                        </div>
                        <button class="my-6 w-full rounded-xl p-4 bg-primary text-white">UBAH</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
