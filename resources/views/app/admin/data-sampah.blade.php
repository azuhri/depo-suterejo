@extends('app.admin.template.master')

@section('title')
    Data Sampah
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/cssbundle/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cssbundle/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cssbundle/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset_components/post.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/cssbundle/select2.min.css') }}"> --}}
@endsection

@section('content_header')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Sampah</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Data Sampah</h1>
                    <small class="text-muted">Kamu memiliki <span class="text-secondary"><span
                                id="total_trash">{{ $total_data_sampah }}</span> data sampah</span>
                        saat ini</small>
                </div>
                <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                    <button class="btn mx-1 btn-dark px-4 text-uppercase" data-bs-toggle="modal"
                        data-bs-target="#trashCategoryModal" type="button">
                        Kategori Sampah
                    </button>

                    <button class="btn mx-1 btn-primary px-4 text-uppercase" data-bs-toggle="modal"
                        data-bs-target="#createSubTrash" type="button">Buat Sub Sampah</button>
                </div>
            </div> <!-- .row end -->
        </div>
    </div>
@endsection

@section('content_body')
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="d-flex align-items-center my-4">
            <span>Tampilkan</span>
            <select id="selectDataTable" onchange="selectDataTable(this);" class="mx-2 text-center p-1 rounded"
                name="total_data_trash" id="total_data_trash">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="*">Semua</option>
            </select>
            <span>Data</span>
        </div>
        <div class="overflow-scroll">
            <div style="max-height: 500px">
                <table id="myDataTable_no_filter" class="table card-table myDataTable mb-0 overflow">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Jenis Sampah</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Harga/KG</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        {{-- <tr>
                            <td>1</td>
                            <td>
                                <a href="javascript:void(0);" class="d-flex align-items-center link-secondary">
                                    <div class="flex-fill ms-3">
                                        <div class="mb-0 h6">Organic Cream</div>
                                    </div>
                                </a>
                            </td>
                            <td>P0122</td>
                            <td>
                                <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="View"><i class="fa fa-eye"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Manage"><i class="fa fa-gear"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Category Sampah --}}
    <div class="modal fade" id="trashCategoryModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5 class="modal-title">Daftar Kategori Sampah</h5>
                        </div>
                        <button class="btn btn-dark px-4 d-flex align-items-center text-uppercase"
                            onclick="openCreateCategory()">
                            <svg class="mx-1" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor"
                                stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                class="css-i6dzq1">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            Data Kategori
                        </button>
                    </div>
                    <p class="text-muted small">Kategori sampah beserta total sub sampahnya</p>
                    <div class="overflow-scroll">
                        <ul class="list-unstyled custom_scroll mb-0" id="listCategories" style="max-height: 400px;">
                            {{-- <li class="card p-3 my-1 flex-row">
                                <div class="flex-fill ms-3">
                                    <div class="h6 mb-0 text-success">Plastik</div>
                                    <span class="text-muted small">21 mutual connections Sr. ReatJs Developer at
                                        Facebook</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn mx-1 btn-light-primary">
                                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
                                            stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            class="css-i6dzq1">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path
                                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                            </path>
                                        </svg>
                                        <span class="d-none d-lg-inline-block ms-2">Ubah</span></button>
                                    <button class="btn mx-1 btn-light-danger">
                                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
                                            stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            class="css-i6dzq1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17">
                                            </line>
                                            <line x1="14" y1="11" x2="14" y2="17">
                                            </line>
                                        </svg>
                                        <span class="d-none d-lg-inline-block ms-2">Hapus</span></button>
                                </div>
                            </li> --}}
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Buat Category Sampah --}}
    <div class="modal fade" id="createCategorySampah" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                        onclick="closeButtonCreateCategory();" aria-label="Close"></button>
                    <h4 class="modal-title">Buat Kategori Sampah</h4>
                    <div class="row g-2 mt-3">
                        <div class="col-12 my-2">
                            <label class="form-label">Nama Kategori Sampah</label>
                            <input type="text" id="trashCategory" class="form-control"
                                placeholder="Masukan nama kategori sampah...">
                        </div>
                        <div class="col-12 my-2">
                            <label class="form-label">Aset Gambar</label>
                            <input type="file" id="trash_image" class="dropify" data-max-file-size="1M" />
                            <small class="text-muted my-1"> <i> aset gambar harus berupa gambar <span
                                        class="text-danger">(png, jpg, jpeg)</span></i></small>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-end">
                            <button class="mx-1 btn btn-lg btn-secondary text-uppercase" type="button"
                                onclick="closeButtonCreateCategory();">Batal</button>
                            <button class="mx-1 btn btn-lg btn-success text-uppercase"
                                onclick="createTrashCategory();">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Category Sampah --}}
    <div class="modal fade" id="editCategorySampah" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <input type="hidden" id="id_trash_category">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                        onclick="closeButtonEditCategory();" aria-label="Close"></button>
                    <h4 class="modal-title">Edit Kategori: <span class="btn btn-light-success text-uppercase"
                            id="title_modal_edit"></span></h4>
                    <div class="row g-2 mt-3">
                        <div class="col-12 my-2">
                            <label class="form-label">Nama Kategori Sampah</label>
                            <input type="text" id="edit_trash_category" class="form-control"
                                placeholder="Masukan nama kategori sampah...">
                        </div>
                        <div class="col-12 my-2">
                            <label class="form-label">Aset Gambar</label>
                            <input type="file" id="edit_trash_image" class="dropify" data-max-file-size="1M" />
                            <small class="text-muted my-1"> <i> aset gambar harus berupa gambar <span
                                        class="text-danger">(png, jpg, jpeg)</span></i></small>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-end">
                            <button class="mx-1 btn btn-lg btn-secondary text-uppercase" type="button"
                                onclick="closeButtonEditCategory();">Batal</button>
                            <button class="mx-1 btn btn-lg btn-success text-uppercase"
                                onclick="updateTrashCategory();">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Create Sub Sampah --}}
    <div class="modal fade" id="createSubTrash" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <h4 class="modal-title">Buat Sub Sampah Baru</h4>
                    <p class="text-muted">Masukan data sub sampah baru pada form dibawah ini!</p>
                    <div class="row g-2 mt-3">
                        <div class="col-12">
                            <label class="form-label">Nama Sub Sampah</label>
                            <input type="text" class="form-control" id="sub_name"
                                placeholder="Masukan nama sampah...">
                        </div>
                        <div class="col-12 d-flex flex-column">
                            <label class="form-label">Jenis Sampah</label>
                            <select class="p-2 rounded" id="jenis_sampah" name="jenis_sampah">
                                @foreach ($trash_categories as $tc)
                                    <option value="{{ $tc->id }}">{{ strtoupper($tc->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Harga Minimal</label>
                            <input class="form-control" id="minimum_price" onkeyup="validateRupiahInput(this);"
                                type="text" placeholder="Masukan harga minimal..">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Harga Maksimal</label>
                            <div class="input-group">
                                <input type="text" id="maximum_price" onkeyup="validateRupiahInput(this);"
                                    class="form-control" placeholder="Masukan harga maksimal..">
                            </div>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-end">
                            <button class="btn mx-2 btn-lg btn-secondary text-uppercase" type="button"
                                data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-lg btn-success text-uppercase" onclick="createSubTrash();"
                                type="button">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Sub Sampah --}}
    <div class="modal fade" id="editSubTrash" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <h4 class="modal-title">Edit Sub Sampah: <span class="btn btn-light-success text-uppercase"
                            id="title_modal_edit_trash"></span></h4>
                    <div class="row g-2 mt-3">
                        <input type="hidden" id="edit_sub_id">
                        <div class="col-12">
                            <label class="form-label">Nama Sub Sampah</label>
                            <input type="text" class="form-control" id="edit_sub_name"
                                placeholder="Masukan nama sampah...">
                        </div>
                        <div class="col-12 d-flex flex-column">
                            <label class="form-label">Jenis Sampah</label>
                            <select class="p-2 rounded" id="edit_jenis_sampah" name="jenis_sampah">
                                @foreach ($trash_categories as $tc)
                                    <option value="{{ $tc->id }}">{{ strtoupper($tc->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Harga Minimal</label>
                            <input class="form-control" id="edit_minimum_price" onkeyup="validateRupiahInput(this);"
                                type="text" placeholder="Masukan harga minimal..">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Harga Maksimal</label>
                            <div class="input-group">
                                <input type="text" id="edit_maximum_price" onkeyup="validateRupiahInput(this);"
                                    class="form-control" placeholder="Masukan harga maksimal..">
                            </div>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-end">
                            <button class="btn mx-2 btn-lg btn-secondary text-uppercase" type="button"
                                data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-lg btn-success text-uppercase" onclick="updateSubTrash();"
                                type="button">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/bundle/dropify.bundle.js') }}"></script>
    <script src="{{ asset('js/bundle/sweetalert2.bundle.js') }}"></script>
    <script src="{{ asset('js/bundle/dataTables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/bundle/select2.bundle.js') }}"></script> --}}
    <script>
        let dropify = $('#trash_image').dropify();
        let dropify2 = $('#edit_trash_image').dropify();
        let _token = "{{ csrf_token() }}";

        const getDataTrashCategory = () => {
            $.ajax({
                url: `{{ route('admin.dashboard.trash.get-categories') }}`,
                type: 'GET',
                dataType: 'json',
                beforeSend: function() {
                    let skeleton = `<div id="skeleton_trash_category">
                        <div class="card p-3 my-1">
                            <div class="post">
                                <div class="avatar"></div>
                                <div class="d-flex flex-column">
                                    <div class="line w-100"></div>
                                    <div class="line w-100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card p-3 my-1">
                            <div class="post">
                                <div class="avatar"></div>
                                <div class="d-flex flex-column">
                                    <div class="line w-100"></div>
                                    <div class="line w-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $("#listCategories").html(skeleton);
                },
                success: function(data) {
                    let tempListData = '';
                    let listOption = '';
                    if (data.data.length > 0) {
                        data.data.forEach(val => {
                            listOption +=
                                `<option value="${val.id}">${val.name.toUpperCase()}</option>`;
                            tempListData += `
                            <li class="card p-3 my-1 flex-row">
                                <div class="flex-fill ms-3 d-flex align-items-center">
                                    <img class="rounded" src='{{ url('/') }}/${val.path_image}' style="width: 60px">
                                    <div class="d-flex flex-column px-4">
                                        <div class="h6 mb-0 text-success text-uppercase">${val.name}</div>
                                        <span class="text-muted small">Jumlah sub sampah sebanyak <span class="text-info font-weight-bold">${val.trashes.length} Data</span></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button onclick="openEditCategory(${val.id}, '${val.name}')" class="btn mx-1 btn-light-primary">
                                        <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                        </svg>
                                        <span class="d-none d-lg-inline-block ms-2 text-sm">Ubah</span>
                                    </button>
                                    <button class="btn mx-1 btn-light-danger" onclick="deleteTrashCategory(${val.id}, ${val.trashes.length});">
                                        <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        <span class="d-none d-lg-inline-block ms-2 text-sm">Hapus</span>
                                    </button>
                                </div>
                            </li>
                            `;
                        });
                    } else {
                        tempListData = `
                            <li class="card p-3 my-1 flex-row d-flex align-items-center justify-content-center">
                                <p class="p-0 m-0 text-muted">-- Data kosong --</p>
                            </li>
                            `;
                    }
                    $("#listCategories").hide();
                    $("#listCategories").html(tempListData);
                    $("#listCategories").fadeIn(1000);
                    $("#jenis_sampah").html(listOption);
                    $("#edit_jenis_sampah").html(listOption);
                },
                error: function(error) {
                    console.error("Fetch error:", error);
                }
            });
        }


        const getDataTrash = async (limit) => {
            await fetch(`{{ route('admin.dashboard.trash.get-sub-trash') }}?limit=${limit}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    let tempListData = '';
                    let counter = 1;
                    if (data.data.length > 0) {
                        data.data.forEach(val => {
                            tempListData += `<tr>
                            <td class="text-center">${counter++}</td>
                            <td class="text-uppercase">
                                ${val.name}
                            </td>
                            <td class="text-uppercase text-center">${val.category.name}</td>
                            <td class="text-center"><span class="mx-1 btn btn-light-danger">Rp.${convertToRupiah(val.minimum_price)} </span>-<span class="mx-1 btn btn-light-success"> Rp.${convertToRupiah(val.maximum_price)}</span></td>
                            <td class="d-flex justify-content-center">
                                <button onclick="openModalEditTrash(${val.id}, '${val.name}', ${val.category.id}, ${val.minimum_price},${val.maximum_price});" class="btn mx-1 btn-light-primary">
                                    <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                        </path>
                                    </svg>
                                    <span class="d-none d-lg-inline-block ms-2 text-sm">Ubah</span></button>
                                <button class="btn mx-1 btn-light-danger" onclick="deleteTrash(${val.id});">
                                    <svg viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                    <span class="d-none d-lg-inline-block ms-2 text-sm">Hapus</span></button>
                            </td>
                        </tr>`;
                        });
                    } else {
                        tempListData = `<tr>
                            <td colspan="5">
                                <div class="card my-1 flex-row d-flex align-items-center justify-content-center w-100">
                                  <p class="p-0 m-0 text-muted">-- Data kosong --</p>
                                </div>   
                            </td>
                        </tr>`
                    }
                    $("#dataTable").html(tempListData);
                })
                .catch(error => {
                    console.error("Fetch error:", error);
                });
        }

        getDataTrashCategory();
        getDataTrash(10);

        const openCreateCategory = () => {
            $("#createCategorySampah").modal("show");
            $("#trashCategoryModal").modal("hide");
        }

        const closeButtonCreateCategory = () => {
            $("#createCategorySampah").modal("hide");
            $("#trashCategoryModal").modal("show");
        }

        const openEditCategory = (id, name) => {
            $("#id_trash_category").val(id);
            $("#title_modal_edit").html(name);
            $("#edit_trash_category").val(name);
            $("#editCategorySampah").modal("show");
            $("#trashCategoryModal").modal("hide");
        }

        const closeButtonEditCategory = () => {
            $("#editCategorySampah").modal("hide");
            $("#trashCategoryModal").modal("show");
            drEvent = dropify2.data('dropify');
            drEvent.clearElement();
        }

        const openModalEditTrash = (id, name, category_id, minimum_price, maximum_price) => {
            $("#editSubTrash").modal("show");
            $("#edit_sub_id").val(id);
            $("#edit_sub_name").val(name);
            $("#title_modal_edit_trash").html(name);
            $("#edit_jenis_sampah").val(category_id);
            $("#edit_minimum_price").val(validateRupiah(minimum_price));
            $("#edit_maximum_price").val(validateRupiah(maximum_price));
        }

        const createTrashCategory = () => {
            let dataForm = new FormData();
            let trashCategory = $("#trashCategory").val();
            let trashImage = $("#trash_image")[0].files[0];

            dataForm.append("name", trashCategory.toLowerCase());
            dataForm.append("path_image", trashImage);
            dataForm.append("_token", _token);

            $.ajax({
                url: '{{ route('admin.dashboard.trash.new-category') }}',
                type: "POST",
                contentType: false, // Tidak mengatur header konten
                processData: false, // Tidak memproses data
                async: true,
                dataType: "json",
                data: dataForm,
                success: function(res) {
                    vt.success(res.message, {
                        title: "Pesan!",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    })
                    closeButtonCreateCategory();
                    $("#trashCategory").val("")
                    drEvent = dropify.data('dropify');
                    drEvent.clearElement();
                    getDataTrashCategory();
                },
                error: function(err) {
                    vt.warn(err.responseJSON.errors, {
                        title: "Peringatan",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    })
                }
            });
        }

        const updateTrashCategory = () => {
            let dataForm = new FormData();
            let id = $("#id_trash_category").val();
            let trashCategory = $("#edit_trash_category").val();
            let trashImage = $("#edit_trash_image")[0]?.files[0] ?? "";

            dataForm.append("id", id);
            dataForm.append("name", trashCategory.toLowerCase());
            dataForm.append("path_image", trashImage);
            dataForm.append("_token", "{{ csrf_token() }}");

            $.ajax({
                url: '{{ route('admin.dashboard.trash.update-category') }}',
                type: "POST",
                contentType: false, // Tidak mengatur header konten
                processData: false, // Tidak memproses data
                async: true,
                dataType: "json",
                data: dataForm,
                success: function(res) {
                    vt.success(res.message, {
                        title: "Pesan!",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    })
                    closeButtonEditCategory();
                    drEvent = dropify2.data('dropify');
                    drEvent.clearElement();
                    getDataTrashCategory();
                },
                error: function(err) {
                    vt.warn(err.responseJSON.errors, {
                        title: "Peringatan",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    })
                }
            });
        }

        const deleteTrashCategory = (id, totalSubTrash) => {
            let text = totalSubTrash < 1 ? "Apakah Anda ingin menghapus kategori sampah ini ?" :
                `Kategori sampah ini memiliki ${totalSubTrash} data sub sampah, Apakah Anda yakin ingin menghapusnya ?`;
            Swal.fire({
                position: 'top',
                title: "Konfirmasi!",
                text: text,
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonText: 'BATAL',
                confirmButtonText: 'HAPUS',
                confirmButtonColor: '#009FBD',
                cancelButtonColor: '#595552',
            }).then(val => {
                if (val.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.dashboard.trash.delete-category') }}',
                        dataType: "json",
                        type: "delete",
                        data: {
                            _token,
                            id
                        },
                        success: function(data) {
                            getDataTrashCategory();
                            getDataTrash($("#selectDataTable").val());
                            vt.success(data.message, {
                                title: "Pesan",
                                position: "top-right",
                                duration: 4000,
                                closable: false,
                                focusable: false,
                                callback: undefined
                            })
                        },
                        error: function(xhr, exception) {
                            const error = xhr.responseJSON;
                            vt.error(error.error, {
                                title: "Pesan",
                                position: "top-right",
                                duration: 4000,
                                closable: false,
                                focusable: false,
                                callback: undefined
                            })
                        }
                    });
                }
            });

        }

        const deleteTrash = (id) => {
            Swal.fire({
                position: 'top',
                title: "Konfirmasi!",
                text: "Apakah Anda ingin menghapus data sampah ini ?",
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonText: 'BATAL',
                confirmButtonText: 'HAPUS',
                confirmButtonColor: '#009FBD',
                cancelButtonColor: '#595552',
            }).then(val => {
                if (val.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.dashboard.trash.delete-sub-trash') }}',
                        dataType: "json",
                        type: "delete",
                        data: {
                            _token,
                            id
                        },
                        success: function(data) {
                            getDataTrash();
                            vt.success(data.message, {
                                title: "Pesan",
                                position: "top-right",
                                duration: 4000,
                                closable: false,
                                focusable: false,
                                callback: undefined
                            })
                            $("#total_trash").html(parseInt($("#total_trash").html()) - 1);
                            getDataTrash($("#selectDataTable").val());
                            getDataTrashCategory();
                        },
                        error: function(xhr, exception) {
                            const error = xhr.responseJSON;
                            vt.error(error.error, {
                                title: "Pesan",
                                position: "top-right",
                                duration: 4000,
                                closable: false,
                                focusable: false,
                                callback: undefined
                            })
                        }
                    });
                }
            });

        }

        const validateRupiahInput = (self) => {
            var number = $(self).val().replace(/[^0-9]/g, '');
            var formatted = number.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            $(self).val("Rp." + formatted);
        }

        const validateRupiah = (money) => {
            var number = money.toString().replace(/[^0-9]/g, '');
            var formatted = number.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            return "Rp." + formatted;
        }


        const createSubTrash = () => {
            let name = $("#sub_name").val();
            let trash_category_id = $("#jenis_sampah").val();
            let minimum_price = $("#minimum_price").val();
            let maximum_price = $("#maximum_price").val();
            minimum_price = minimum_price.replace("Rp.", "");
            minimum_price = minimum_price.replace(/\./g, "");
            maximum_price = maximum_price.replace("Rp.", "");
            maximum_price = maximum_price.replace(/\./g, "");
            $.ajax({
                url: '{{ route('admin.dashboard.trash.new-sub-trash') }}',
                type: "POST",
                dataType: "json",
                data: {
                    name,
                    trash_category_id,
                    minimum_price,
                    maximum_price,
                    _token
                },
                success: function(res) {
                    vt.success(res.message, {
                        title: "Pesan!",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    })
                    hideModal("createSubTrash");
                    $("#total_trash").html(parseInt($("#total_trash").html()) + 1);
                    getDataTrash($("#selectDataTable").val());
                    getDataTrashCategory();
                    $("#sub_name").val("");
                    $("#jenis_sampah").val("");
                    $("#minimum_price").val("");
                    $("#maximum_price").val("");
                },
                error: function(err) {
                    vt.warn(err.responseJSON.errors, {
                        title: "Peringatan",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    })
                }
            });
        }

        const updateSubTrash = () => {
            let id = $("#edit_sub_id").val();
            let name = $("#edit_sub_name").val();
            let trash_category_id = $("#edit_jenis_sampah").val();
            let minimum_price = $("#edit_minimum_price").val();
            let maximum_price = $("#edit_maximum_price").val();
            minimum_price = minimum_price.replace("Rp.", "");
            minimum_price = minimum_price.replace(/\./g, "");
            maximum_price = maximum_price.replace("Rp.", "");
            maximum_price = maximum_price.replace(/\./g, "");
            $.ajax({
                url: '{{ route('admin.dashboard.trash.update-sub-trash') }}',
                type: "PUT",
                dataType: "json",
                data: {
                    id,
                    name,
                    trash_category_id,
                    minimum_price,
                    maximum_price,
                    _token
                },
                success: function(res) {
                    vt.success(res.message, {
                        title: "Pesan!",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    })
                    getDataTrash($("#selectDataTable").val());
                    getDataTrashCategory();
                    $("#editSubTrash").modal("hide");
                },
                error: function(err) {
                    vt.warn(err.responseJSON.errors, {
                        title: "Peringatan",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    })
                }
            });
        }

        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return rupiah.split('', rupiah.length - 1).reverse().join('');
        }

        const selectDataTable = self => {
            let limit = $(self).val();
            getDataTrash(limit);
        }
    </script>
@endpush
