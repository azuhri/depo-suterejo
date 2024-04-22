@extends('app.admin.template.master')

@section('title')
    Data Sampah
@endsection

@section('css')
@endsection

@section('content_header')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Dashboard</h1>
                    {{-- <small class="text-muted">Kamu memiliki <span class="text-secondary"> 10 data sampah</span>
                        sebanyak</small> --}}
                </div>
            </div> <!-- .row end -->
        </div>
    </div>
@endsection

@section('content_body')
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1 g-3 mb-3 row-deck">
                <div class="col">
                    <div class="card">
                        <div
                            class="card-body d-flex justify-content-center flex-column align-items-center d-flex justify-content-center flex-column align-items-center">
                            <div class="text-muted text-uppercase small text-center">TOTAL PENGGUNA</div>
                            <img class="w-50" src="{{ asset('images/illustrations/users.png') }}" alt="illustration">
                            <div class="mt-1 text-center">
                                <span class="fw-bold h4 mb-0 counter">{{$totalUsers}}</span>
                                <span class="text-success ms-1">Pengguna</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center flex-column align-items-center ">
                            <div class="text-muted text-uppercase small text-center">TOTAL TRANSAKSI</div>
                            <img class="w-50" src="{{ asset('images/illustrations/transactions.png') }}"
                                alt="illustration">
                            <div class="mt-1 text-center">
                                <span class="fw-bold h4 mb-0 counter">{{$totalTransaction}}</span>
                                <span class="text-success ms-1">Data</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center flex-column align-items-center">
                            <div class="text-muted text-uppercase small text-center">JENIS SAMPAH</div>
                            <img class="w-50" src="{{ asset('images/illustrations/waste-management.png') }}"
                                alt="illustration">
                            <div class="mt-1 text-center">
                                <span class="fw-bold h4 mb-0 counter">{{$totalTrashCategories}}</span>
                                <span class="text-success ms-1">Tipe</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center flex-column align-items-center">
                            <div class="text-muted text-uppercase small text-center">DATA SAMPAH</div>
                            <img class="w-50" src="{{ asset('images/illustrations/inventories.png') }}"
                                alt="illustration">
                            <div class="mt-1 text-center">
                                <span class="fw-bold h4 mb-0 counter">{{$totalTrashes}}</span>
                                <span class="text-success ms-1">Data</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center flex-column align-items-center">
                            <div class="text-muted text-uppercase small text-center">BERAT SAMPAH BULAN INI</div>
                            <img class="w-50" src="{{ asset('images/illustrations/transactions.png') }}"
                                alt="illustration">
                            <div class="mt-1 text-center">
                                <span class="fw-bold h4 mb-0 counter">0</span>
                                <span class="text-success ms-1">KG</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.counter').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 6000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>
@endsection
