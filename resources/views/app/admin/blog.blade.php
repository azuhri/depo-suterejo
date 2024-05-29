@extends('app.admin.template.master')

@section('title')
    Blog Artikel
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/cssbundle/sweetalert2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/cssbundle/dataTables.min.css') }}">
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.standalone.min.css"
        integrity="sha512-D5/oUZrMTZE/y4ldsD6UOeuPR4lwjLnfNMWkjC0pffPTCVlqzcHTNvkn3dhL7C0gYifHQJAIrRTASbMvLmpEug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.min.css"
        integrity="sha512-aQb0/doxDGrw/OC7drNaJQkIKFu6eSWnVMAwPN64p6sZKeJ4QCDYL42Rumw2ZtL8DB9f66q4CnLIUnAw28dEbg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    {{-- <link rel="stylesheet" href="{{ asset('/cssbundle/select2.min.css') }}"> --}}
@endsection

@section('content_header')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Artikel</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Blog Artikel</h1>
                    <small class="text-muted">Kamu memiliki total <span class="text-secondary"><span
                                id="total_blog">10</span> artikel</span>
                    </small>
                </div>
                <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                    <a href="{{route("admin.dashboard.blog.create")}}" class="d-flex align-items-center btn btn-md mx-1 btn-dark px-4 text-uppercase">
                        <svg class="mx-2" viewBox="0 0 24 24" width="21" height="21" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        Buat Artikel
                    </a>
                </div>
            </div> <!-- .row end -->
        </div>
    </div>
@endsection

@section('content_body')
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="card">
                <div class="row g-0">
                    <div class="col-xxl-12 col-lg-8">
                        <div class="card-body tab-content">
                            <div class="tab-pane fade show active" id="b-tab-1" role="tabpanel">
                                <h5>Daftar Artikel</h5>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2" style="">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/1.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">LUNO - Bootstrap 5 Responsive Admin Dashboard
                                                    Theme</h5>
                                                <a href="#">https://alui.thememakker.com/index.html</a>
                                                <p class="text-muted mb-0"> If you are going to use a passage of Lorem
                                                    Ipsum, you need to be sure there isn't anything embarrassing hidden in
                                                    the middle of text.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/2.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">BigBucket - Bootstrap 4x Admin Template</h5>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="text-muted mb-0">Contrary to popular belief, Lorem Ipsum is not
                                                    simply random text. It has roots in a piece of classical Latin
                                                    literature</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/3.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">Lucid ASP .NET Core MVC - Responsive Admin
                                                    Template</h5>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="text-muted mb-0">There are many variations of passages of Lorem
                                                    Ipsum available, but the majority have suffered alteration</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/4.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">Lucid - VueJS Admin Template &amp; Webapp kit
                                                </h5>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="text-muted mb-0">I have been a Personal trainer for 2 years
                                                    building a women's fitness company Bootcamp company in 2018.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/8.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">Amaze - Multipurpose Admin Template ui kit</h5>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="text-muted mb-0">Contrary to popular belief, Lorem Ipsum is not
                                                    simply random text. It has roots in a piece of classical Latin
                                                    literature</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="b-tab-2" role="tabpanel">
                                <h5>Favourites</h5>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/2.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">BigBucket - Bootstrap 4x Admin Template</h5>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="text-muted mb-0">Contrary to popular belief, Lorem Ipsum is not
                                                    simply random text. It has roots in a piece of classical Latin
                                                    literature</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/3.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">Lucid ASP .NET Core MVC - Responsive Admin
                                                    Template</h5>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="text-muted mb-0">There are many variations of passages of Lorem
                                                    Ipsum available, but the majority have suffered alteration</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="b-tab-3" role="tabpanel">
                                <h5>Admin Template</h5>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/5.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h6 class="fw-bold mb-1">HexaBit - Responsive Bootstrap Admin Template
                                                    &amp; UI KIT</h6>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text
                                                    ever since the 1500s, scrambled it to make a type specimen book</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/6.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h6 class="fw-bold mb-1">Alpino - Bootstrap 4 Admin Dashboard Template</h6>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="mb-0">I have been a Personal trainer for 2 years building a
                                                    women's fitness company Bootcamp company in 2018.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="b-tab-4" role="tabpanel">
                                <h5>My bookmark</h5>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/3.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">Lucid ASP .NET Core MVC - Responsive Admin
                                                    Template</h5>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="text-muted mb-0">There are many variations of passages of Lorem
                                                    Ipsum available, but the majority have suffered alteration</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/4.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">Lucid - VueJS Admin Template &amp; Webapp kit
                                                </h5>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="text-muted mb-0">I have been a Personal trainer for 2 years
                                                    building a women's fitness company Bootcamp company in 2018.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card overflow-visible mb-1">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2">
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <ul class="dropdown-menu shadow border-0 p-2">
                                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                                <li><a class="dropdown-item" href="#">Block</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded" src="./assets/img/gallery/8.jpg" alt="">
                                            <div
                                                class="media-body ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                                <h5 class="fw-light mb-1">Amaze - Multipurpose Admin Template ui kit</h5>
                                                <a href="#">https://themeforest.net/user/wrraptheme/portfolio</a>
                                                <p class="text-muted mb-0">Contrary to popular belief, Lorem Ipsum is not
                                                    simply random text. It has roots in a piece of classical Latin
                                                    literature</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal add bookmark -->
                <!-- <button class="btn btn-primary px-4 text-uppercase" data-bs-toggle="modal" data-bs-target="#CreateBookmarks" type="button">Create Bookmarks</button> -->
                <!-- Modal: Create Bookmarks -->
                <div class="modal fade" id="CreateBookmarks" tabindex="-1" aria-labelledby="CreateBookmarks"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content needs-validation">
                            <div class="modal-header">
                                <h5 class="modal-title">Add new Bookmark</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" placeholder="Bookmark Url">
                                            <label>Bookmark Url</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" placeholder="Bookmark Title">
                                            <label>Bookmark Title</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" placeholder="Description">
                                            <label>Description</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select">
                                                <option selected="">Open this select menu</option>
                                                <option value="1">Created by me</option>
                                                <option value="2">Favourites</option>
                                                <option value="3">Admin Template</option>
                                            </select>
                                            <label>Bookmark List</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select">
                                                <option selected="">Open this select menu</option>
                                                <option value="1">Thememakker</option>
                                                <option value="2">UI8</option>
                                                <option value="3">Themeforest</option>
                                            </select>
                                            <label>Bookmark Tags</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save Bookmark</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/bundle/sweetalert2.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/bundle/dataTables.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment-with-locales.min.js"
        integrity="sha512-4F1cxYdMiAW98oomSLaygEwmCnIP38pb4Kx70yQYqRwLVCs3DbRumfBq82T08g/4LJ/smbFGFpmeFlQgoDccgg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
@endpush
