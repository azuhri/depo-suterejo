@extends('app.admin.template.master')

@section('title')
    Data Sampah
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bundles/') }}">
    @vite('resources/assets/cssbundles/select2.min.css')
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
                    <h1 class="fs-5 color-900 mt-1 mb-0">Data Sampah</h1>
                    <small class="text-muted">Kamu memiliki <span class="text-secondary"> 10 data sampah</span>
                        sebanyak</small>
                </div>
                <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                    <button class="btn mx-1 btn-dark px-4 text-uppercase" data-bs-toggle="modal"
                        data-bs-target="#ConnectionRequest" type="button">
                        Kategori Sampah
                    </button>
                    <div class="modal fade" id="ConnectionRequest" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content text-start">
                                <div class="modal-body custom_scroll p-lg-5">
                                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h5 class="modal-title">Daftar Kategori Sampah</h5>
                                    <p class="text-muted small">Kategori sampah beserta total sub sampahnya</p>
                                    <ul class="list-unstyled custom_scroll mb-0">
                                        <li class="card p-3 my-1 flex-row">
                                            <div class="flex-fill ms-3">
                                                <div class="h6 mb-0 text-success">Plastik</div>
                                                <span class="text-muted small">21 mutual connections Sr. ReatJs Developer at
                                                    Facebook</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button class="btn mx-1 btn-light-primary"><i class="fa fa-edit"></i><span
                                                        class="d-none d-lg-inline-block ms-2">Ubah</span></button>
                                                <button class="btn mx-1 btn-light-danger"><i class="fa fa-close"></i><span
                                                        class="d-none d-lg-inline-block ms-2">Hapus</span></button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn mx-1 btn-primary px-4 text-uppercase" data-bs-toggle="modal"
                        data-bs-target="#CreateEvent" type="button">Buat Sub Sampah</button>
                    <div class="modal fade" id="CreateEvent" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content text-start">
                                <div class="modal-body custom_scroll p-lg-5">
                                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h4 class="modal-title">Buat Sub Sampah Baru</h4>
                                    <p class="text-muted">Masukan data sub sampah baru pada form dibawah ini!</p>
                                    <div class="row g-2 mt-3">
                                        <div class="col-12">
                                            <label class="form-label">Nama Sampah</label>
                                            <input type="text" class="form-control" placeholder="Masukan nama sampah...">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Jenis Sampah</label>
                                            <select id="jenis_sampah" name="jenis_sampah" id="">
                                                <option value="plastik">plastik</option>
                                                <option value="kaca">kaca</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Harga Minimal</label>
                                            <input class="form-control" type="text" placeholder="Location">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Harga Maksimal</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Recipient's username">
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-lg btn-secondary text-uppercase" type="button"
                                                data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-lg btn-primary text-uppercase"
                                                type="button">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .row end -->
        </div>
    </div>
@endsection

@section('content_body')
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3 row-deck row-cols-xxl-3 row-cols-xl-2 row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-1">
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/crm.jpg" alt="Dashboard CRM">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">CRM</h4>
                            <p>A dashboard built with all the required matrics for sales activities and KPIs.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="crm/index.html" title="">Go
                                to Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/cryptocurrency.jpg"
                            alt="Dashboard cryptocurrency">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Cryptocurrency</h4>
                            <p>A high tech library of widgets required to give overview for all the crypto analysis.
                            </p>
                            <a class="btn px-4 bg-white" target="_blank" href="crypto/index.html" title="">Go
                                to Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/ecommerce.jpg"
                            alt="Dashboard ecommerce">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">eCommerce</h4>
                            <p>An unique dashboard to provide all the demographic sales overview details.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="ecommerce/index.html" title="">Go
                                to
                                Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/event.jpg" alt="Dashboard event">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Event Management</h4>
                            <p>A dashboard to track all your event activirties.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="event/index.html" title="">Go
                                to Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/fitness.jpg"
                            alt="Dashboard fitness">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Fitness Analytics</h4>
                            <p>A fitness tracker, which allows to see all important information on one screen.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="fitness/index.html" title="">Go to
                                Dashboard</a>
                            <a class="btn px-4 bg-white mt-1" target="_blank" href="fitness/landing/index.html"
                                title="">Landing Page Preview</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/hospital.jpg"
                            alt="Dashboard hospital">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Hospital Management</h4>
                            <p>A dashboard build for hospintals and pharma organisations.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="hospital/index.html" title="">Go to
                                Dashboard</a>
                            <a class="btn px-4 bg-white mt-1" target="_blank" href="hospital/landing/index.html"
                                title="">Landing Page Preview</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/hrms.jpg" alt="Dashboard hrms">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">HRMS Portal</h4>
                            <p>A easy to understand Employee activity tracker.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="hrms/index.html" title="">Go to
                                Dashboard</a>
                            <a class="btn px-4 bg-white mt-1" target="_blank" href="hrms/landing/index.html"
                                title="">Landing Page Preview</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/inventory.jpg"
                            alt="Dashboard inventory">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Inventory Management</h4>
                            <p>A dashboard to track all your inventories.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="inventory/index.html" title="">Go
                                to Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/jobportal.jpg"
                            alt="Dashboard jobportal">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Job Portal</h4>
                            <p>A unique dashboard to trach all the job portal activities.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="job-portal/index.html" title="">Go
                                to Dashboard</a>
                            <a class="btn px-4 bg-white mt-1" target="_blank" href="job-portal/landing/index.html"
                                title="">Landing Page Preview</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/realestate.jpg"
                            alt="Dashboard realestate">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Real-Estate</h4>
                            <p>A dashboard built for huge projects.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="real-estate/index.html" title="">Go
                                to Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/restaurant.jpg"
                            alt="Dashboard restaurant">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Restaurant</h4>
                            <p>An unique dashboard for the Hospitality industry.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="restaurant/index.html" title="">Go
                                to Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/server.jpg" alt="Dashboard server">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Server Analysis</h4>
                            <p>An easy to understand tracker for the status of the server.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="server/index.html" title="">Go to
                                Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/university.jpg"
                            alt="Dashboard university">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">School / University</h4>
                            <p>A dashbaord to show the overall picture of the School/University data in easy to
                                understand formate.</p>
                            <a class="btn px-4 bg-white" target="_blank" href="university/index.html" title="">Go
                                to Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/music.jpg"
                            alt="Dashboard university">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">Music</h4>
                            <p>A dashbaord to show the Music album, Favorite Playlist and Singer</p>
                            <a class="btn px-4 bg-white" target="_blank" href="music/index.html" title="">Go to
                                Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card app-demo p-2">
                        <img class="img-fluid rounded-4" src="./assets/img/dashboard/nft.jpg" alt="Dashboard university">
                        <div class="card-overlay"></div>
                        <div class="demo-text p-xl-4 p-lg-2 p-0">
                            <h4 class="fw-light">NFT</h4>
                            <p>A dashbaord to show the NFT Bid, NFT Collections and Profile</p>
                            <a class="btn px-4 bg-white" target="_blank" href="nft/index.html" title="">Go
                                to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @vite('resources/assets/js/bundle/select2.bundle.js')
    <script>
        $('#jenis_sampah').select2();
    </script>
@endsection
