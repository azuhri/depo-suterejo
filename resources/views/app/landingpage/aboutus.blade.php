@extends('app.template.master_landingpage')

@section('title')
    Tentang Kami
@endsection

@section('hero')
@endsection

@section('content')
    {{-- Hero --}}
    <div class="w-full bg-cover bg-center h-screen relative flex justify-center">
        <img class="w-full h-[92vh] absolute z-0" src="{{ asset('images/hero-aboutus.png') }}" alt="">
        <div class="absolute h-[92vh] w-full bg-gray-900 z-0 opacity-50"></div>
        <div class="relative w-full h-[92vh] flex flex-col justify-center px-10 z-5">
            <p class="font-medium text-white text-6xl my-6">Solusisampah</p>
            <p class="font-light text-white text-xl w-1/4">Kelola sampah daur ulangmu dimulai dari lingkup terkecil untuk menciptakan dampak yang luas. Yuk kita mullai hari ini!</p>
        </div>
    </div>
    <div class="my-32 mb-40 px-32">
        <p class="text-4xl my-10 text-center font-bold text-primary">SOLUSISAMPAH</p>
        <p class="my-4 text-xl px-32 text-justify font-light">
            Solusisampah merupakan website penjualan dan pengelolaan sampah di Super Depo Sutorejo yang merupakan bagian program kerjasama lingkungan antara Pemerintahan kota Surabaya dengan Kitakyushu Jepang dengan menggunakan teknologi limbah organik dan anorganik secara modern. Dengan metode tersebut, proses pemilahan sampah bisa dilakukan dengan lebih efektif, efisien, dan higienis yang mampu mengolah hingga 12–15 ton sampah per harinya.
        </p>
        <p class="my-6 text-xl px-32 text-justify font-light">
            Solusisampah memberikan solusi layanan jemput sampah sehingga masyarakat menyadari bahwa dengan memilah sampah, mereka bisa mendapatkan nilai lebih dari sampah tersebut, dan membuat biaya pengelolaan sampah menjadi minimal.
        </p>
    </div>
    <div class="my-32 mb-40 flex justify-center py-32 bg-primary">
        <div class="w-11/12 flex">
            <div class="flex flex-col justify-center px-40">
                <p class="text-xl font-normal text-white text-justify">
                    Yuk, kita lakukan perubahan untuk masa depan dan lingkungan yang lebih bersih. Bersama Solusisampah, kami mengajak kamu untuk melakukan perubahan dengan cara yang sederhana; memilah sampah daur ulangmu lalu pesan penjemputan sampah daur ulangmu melalui website Solusisampah, dan dapatkan penukaran uang sehingga dapat mengurangi timbunan sampah.                </p>
                <p class="text-md font-normal text-white my-4 text-justify">
                    Selain berkontribusi untuk bumi dan alam yang lebih baik, melalui Solusisampah, kamu juga berkesempatan meningkatkan kesejahteraan sosial dan ekonomi bagi seluruh lapisan masyarakat.
                </p>
            </div>
            <div>
                <img class="rounded-top-right-xl w-[3000px]" src="{{ asset('images/ilustrasi-aboutus.png') }}" alt="">
            </div>
        </div>
    </div>
    {{-- <div class="my-20 mb-30 py-32 bg-primary">
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
    </div> --}}
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
                    <a href="#"
                        class="rounded-xl bg-white border border-primary text-primary p-2 mb-6 px-4 text-xs">Baca
                        Selengkapnya</a>
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
                    <a href="#"
                        class="rounded-xl bg-white border border-primary text-primary p-2 mb-6 px-4 text-xs">Baca
                        Selengkapnya</a>
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
                    <a href="#"
                        class="rounded-xl bg-white border border-primary text-primary p-2 mb-6 px-4 text-xs">Baca
                        Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
@endsection
