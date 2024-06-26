@extends('app.template.master_landingpage')

@section('title')
    Profil Saya
@endsection

@section('hero')
@endsection

@section('content')
    <div class="my-32 mb-40 flex justify-center">
        <div class="my-20">
            <p class="text-4xl text-center font-bold text-primary">BLOG</p>
            <div class="flex md:flex-row flex-col items-center justify-center mt-10">
                <div class="p-1 my-4 w-3/4 md:w-1/4 rounded-3xl shadow-xl border border-2 mx-2">
                    <img class="rounded-3xl p-1 w-full" src="{{ asset('images/blog-1.png') }}" alt="">
                    <div class="my-1 p-4">
                        <p class="font-bold">
                            Super Depo Sutorejo, Wujud Nyata Kerja
                            Sama Surabaya dengan Kitakyushu
                        </p>
                        <p class="font-ligth my-2 text-sm te">
                            Super Depo Sutorejo sebagai tempat pembuangan
                            sampah (TPS) berbasis reuse, reduce, dan recycle (3R)
                            jadi bukti komitmen pemkot dalam pengolahan sampah.
                        </p>
                    </div>
                    <div class="flex justify-center w-full">
                        <a href="{{route("landing.blog.detail", "blog-1")}}"
                            class="rounded-xl bg-white border border-primary text-primary p-2 mb-6 px-4 text-xs">Baca
                            Selengkapnya</a>
                    </div>
                </div>
                <div class="p-1 my-4 w-3/4 md:w-1/4 rounded-3xl shadow-xl border border-2 mx-2">
                    <img class="rounded-3xl p-1 w-full" src="{{ asset('images/blog-2.png') }}" alt="">
                    <div class="my-1 p-4">
                        <p class="font-bold">
                            Super Depo Sutorejo, Wujud Nyata Kerja
                            Sama Surabaya dengan Kitakyushu
                        </p>
                        <p class="font-ligth my-2 text-sm te">
                            Super Depo Sutorejo sebagai tempat pembuangan
                            sampah (TPS) berbasis reuse, reduce, dan recycle (3R)
                            jadi bukti komitmen pemkot dalam pengolahan sampah.
                        </p>
                    </div>
                    <div class="flex justify-center w-full">
                        <a href="{{route("landing.blog.detail", "blog-2")}}"
                            class="rounded-xl bg-white border border-primary text-primary p-2 mb-6 px-4 text-xs">Baca
                            Selengkapnya</a>
                    </div>
                </div>
                <div class="p-1 my-4 w-3/4 md:w-1/4 rounded-3xl shadow-xl border border-2 mx-2">
                    <img class="rounded-3xl p-1 w-full" src="{{ asset('images/blog-1.png') }}" alt="">
                    <div class="my-1 p-4">
                        <p class="font-bold">
                            Super Depo Sutorejo, Wujud Nyata Kerja
                            Sama Surabaya dengan Kitakyushu
                        </p>
                        <p class="font-ligth my-2 text-sm te">
                            Super Depo Sutorejo sebagai tempat pembuangan
                            sampah (TPS) berbasis reuse, reduce, dan recycle (3R)
                            jadi bukti komitmen pemkot dalam pengolahan sampah.
                        </p>
                    </div>
                    <div class="flex justify-center w-full">
                        <a href="{{route("landing.blog.detail", "blog-3")}}"
                            class="rounded-xl bg-white border border-primary text-primary p-2 mb-6 px-4 text-xs">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
