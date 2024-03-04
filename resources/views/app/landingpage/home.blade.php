@extends('app.template.master_landingpage')

@section('title')
    Beranda
@endsection

@section('hero')
images/bg-home.png
@endsection

@section('content')
    <div class="mb-20 mb-30 px-32">
        <p class="text-4xl text-center font-bold text-primary">TENTANG KAMI</p>
        <p class="my-4 text-xl px-32 text-justify font-light">
            Super Depo Sutorejo merupakan depo pengolahan sampah modern yang ada di Surabaya. Dikatakan modern karena depo
            ini didukung dengan sarana dan prasarana yang canggih, ramah lingkungan, dan mudah dioperasikan. Sarana dan
            prasarana yang ada di Super Depo Sutorejo adalah gerobak sampah, garputala, sapu,timbangan, konveyor, alat
            pencacah sampah, alat pencucian plastik, dan alat penekan (press) plastik. Dilihat dari segi kuantitas,
            ketersediaan sarana dan prasarana padaSuper Depo Sutorejo untuk mendukung aktivitas pemilahan sampah sudah
            terpenuhi.
        </p>
    </div>
    <div class="my-20 mb-30 py-32 bg-primary">
        <p class="text-4xl text-center font-bold text-white">LAYANAN</p>
        <div class="flex justify-center">
            <div class="flex flex-col justify-center w-1/6 mt-10 mx-20">
                <img class="rounded-3xl" src="{{ asset('images/service-1.png') }}" alt="">
                <p class="text-center mt-4 text-white text-2xl font-normal">Jemput Sampah</p>
            </div>
            <div class="flex flex-col justify-center w-1/6 mt-10 mx-20">
                <img class="rounded-3xl" src="{{ asset('images/service-3.png') }}" alt="">
                <p class="text-center mt-4 text-white text-2xl font-normal">Kerjasama Mitra</p>
            </div>
            <div class="flex flex-col justify-center w-1/6 mt-10 mx-20">
                <img class="rounded-3xl" src="{{ asset('images/service-2.png') }}" alt="">
                <p class="text-center mt-4 text-white text-2xl font-normal">Servis Kebersihan</p>
            </div>
        </div>
    </div>
    <div class="my-20">
        <p class="text-4xl text-center font-bold text-primary">BLOG</p>
        <div class="flex justify-center mt-10">
            <div class="p-1 my-4 w-1/4 rounded-3xl shadow-xl border border-2 mx-2">
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
                    <a href="#" class="rounded-xl bg-white border border-primary text-primary p-2 mb-6 px-4 text-xs">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="p-1 my-4 w-1/4 rounded-3xl shadow-xl border border-2 mx-2">
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
                    <a href="#" class="rounded-xl bg-white border border-primary text-primary p-2 mb-6 px-4 text-xs">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="p-1 my-4 w-1/4 rounded-3xl shadow-xl border border-2 mx-2">
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
                    <a href="#" class="rounded-xl bg-white border border-primary text-primary p-2 mb-6 px-4 text-xs">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
@endsection
