@extends('app.admin.template.master')

@section('title')
    Buat Artikel
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/cssbundle/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cssbundle/dropify.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
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
                        <li class="breadcrumb-item" aria-current="page">Blog Artikel</li>
                        <li class="breadcrumb-item active" aria-current="page">Buat Artikel</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Membuat Artikel</h1>
                </div>
                <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                    <a href="{{ route('admin.dashboard.blog.index') }}"
                        class="d-flex align-items-center btn btn-md mx-1 btn-secondary px-4 text-uppercase">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div> <!-- .row end -->
        </div>
    </div>
@endsection

@section('content_body')
    <div class="page-body blog-app px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Data Artikel Baru</h6>
                    <div class="dropdown morphing scale-left">
                        <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" aria-label="Card Full-Screen"
                            data-bs-original-title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <label class="col-xl-3 col-sm-4 col-form-label">Banner Artikel</label>
                        <div class="col-xl-9 col-sm-8">
                            <input type="file" id="banner" class="dropify" data-max-file-size="1M" />
                            <small class="text-muted my-1"> <i> aset gambar harus berupa gambar <span
                                        class="text-danger">(png, jpg, jpeg)</span></i></small>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <label class="col-xl-3 col-sm-4 col-form-label">Judul Artikel</label>
                        <div class="col-xl-9 col-sm-8">
                            <input type="text" class="form-control form-control-lg" placeholder="Blog Title">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <label class="col-xl-3 col-sm-4 col-form-label">Konten</label>
                        <div class="col-xl-9 col-sm-8">
                            <textarea id="summernote" name="editordata"></textarea>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <label class="col-xl-3 col-sm-4 col-form-label"></label>
                        <div class="col-xl-9 col-sm-8">
                            <a href="#" class="btn btn-danger">Batal</a>
                            <button type="button" class="btn btn-secondary">Simpan Sebagai Draft</button>
                            <button type="button" class="btn btn-primary">Publikasikan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"
        integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/bundle/sweetalert2.bundle.js') }}"></script>
    <script src="{{ asset('js/bundle/dropify.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/bundle/dataTables.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment-with-locales.min.js"
        integrity="sha512-4F1cxYdMiAW98oomSLaygEwmCnIP38pb4Kx70yQYqRwLVCs3DbRumfBq82T08g/4LJ/smbFGFpmeFlQgoDccgg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script>
        let dropify = $('#banner').dropify();
        $('#summernote').summernote({
            placeholder: 'Mau tulis apa ?',
            tabsize: 2,
            height: 500
        });
    </script>
@endpush
