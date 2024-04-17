@extends('app.template.master_landingpage')

@section('title')
    Layanan Kami
@endsection

@section('hero')
@endsection

@section('content')
    {{-- Hero --}}
    <div class="w-full bg-cover bg-center h-screen relative flex justify-center">
        <img class="w-full h-[92vh] absolute z-0" src="{{ asset('images/hero-services.png') }}" alt="">
        <div class="absolute h-[92vh] w-full bg-gray-900 z-0 opacity-50"></div>
        <div class="relative w-full h-[92vh] flex items-center justify-center px-10 z-5">
            <p class="font-thin text-white text-center  md:px-32 text-2xl">
                Solusisampah memberikan cara baru yang lebih efektif dan efisien untuk penjualan dan pengelolaan sampah.
                Dengan adanya layanan kami akan berdampak positif bagi masyarakat dan juga lingkungan yang bebas polusi
                sampah pada tahun mendatang.
            </p>
        </div>
    </div>
    <div class="my-32 mb-40 px-12 md:px-32 flex justify-center">
        <div class="w-full md:w-3/4 flex justify-between flex-col-reverse md:flex-row items-center">
            <div class="my-4">
                <p class="text-5xl text-center md:text-left font-extrabold text-primary">
                    Jemput Sampah
                </p>
                <p class="text-primary text-xl font-medium w-full text-center md:text-left md:w-1/2 mt-6 mb-8">
                    Pilih sampahmu, lalu pilih lokasi penjemputan, picker kami akan datang ke rumahmu untuk mengambil dan
                    membayar sampahmu.
                </p>
                <a href="{{route('account.services.option')}}"
                    class="text-primary text-md border-2 w-full text-center md:text-left flex md:block md:w-[400px] font-medium border-primary rounded-full p-3 justify-center md:px-10 mt-12">
                    Klik disini untuk melakukan transaksi
                </a>
            </div>
            <div>
                <img class="w-[600px] rounded-3xl shadow shadow border border-gray-200"
                    src="{{ asset('images/service-1.png') }}" alt="">
            </div>
        </div>
    </div>

    <div class="my-32 mb-40 py-32 flex bg-primary justify-center">
        <div class="w-3/4 flex flex-col-reverse md:flex-row justify-between items-center">
            <div class="my-4">
                <p class="text-white text-center md:text-left text-5xl font-extrabold text-primary">
                    Kerjasama Mitra
                </p>
                <p class="text-white text-center md:text-left text-primary text-xl font-medium w-full md:w-3/4 mt-6 mb-8">
                    Daur ulang berlangganan
                    untuk bisnis dari perusahaan
                </p>
                <a href="https://wa.me/6285186887175?text=Hallo Kak, Saya ingin membuat kerja sama mitra." target="_blank" class="text-white text-md border-2 font-medium border-white w-full flex md:block md:w-[400px] text-center rounded-full p-3 px-10 mt-12">
                    Hubungi kami melalui WhatsApp
                </a>
            </div>
            <div>
                <img class="w-[500px]" src="{{ asset('images/ilustrasi-service2.png') }}" alt="">
            </div>
        </div>
    </div>

    <div class="my-32 mb-40 px-12 md:px-32 flex justify-center">
        <div class="w-full md:w-3/4 flex justify-between flex-col-reverse md:flex-row items-center">
            <div class="text-center md:text-left my-4">
                <p class="text-5xl font-extrabold text-primary">
                    Servis
                    Kebersihan
                 </p>
                <p class="text-primary text-xl font-medium w-full md:w-3/4 mt-6 mb-8">
                    Daftarkan eventmu, untuk mengakses kolaborasi gotong royong membersihkan lingkunganmu.
                </p>
                <a href="https://wa.me/6285186887175?text=Hallo Kak, Saya ada permintaan servis kebersihan." target="_blank"
                    class="text-primary text-md border-2 font-medium border-primary rounded-full p-3 px-10 mt-12">
                    Hubungi kami melalui WhatsApp
                </a>
            </div>
            <div>
                <img class="w-[500px]"
                    src="{{ asset('images/ilustrasi-service3.png') }}" alt="">
            </div>
        </div>
    </div>
@endsection
