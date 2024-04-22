@extends('app.admin.template.master')

@section('title')
    Data Transaksi
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/cssbundle/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cssbundle/dataTables.min.css') }}">
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.standalone.min.css"
        integrity="sha512-D5/oUZrMTZE/y4ldsD6UOeuPR4lwjLnfNMWkjC0pffPTCVlqzcHTNvkn3dhL7C0gYifHQJAIrRTASbMvLmpEug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.min.css"
        integrity="sha512-aQb0/doxDGrw/OC7drNaJQkIKFu6eSWnVMAwPN64p6sZKeJ4QCDYL42Rumw2ZtL8DB9f66q4CnLIUnAw28dEbg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <link rel="stylesheet" href="{{ asset('/cssbundle/select2.min.css') }}"> --}}
@endsection

@section('content_header')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Data Transaksi</h1>
                    <small class="text-muted">Kamu memiliki <span class="text-secondary"><span
                                id="total_trash">{{ $total_transaction_today }}</span> data transaksi</span>
                        hari ini</small>
                </div>
            </div> <!-- .row end -->
        </div>
    </div>
@endsection

@section('content_body')
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <di class="d-flex align-items-center">
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
            <div class="d-flex flex-column justify-content-center mx-4">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </span>
                    <input type="text" value="{{ date('d F Y') }}" onchange="filterDate(this)" id="datepicker"
                        class="datepicker text-center border" class="form-control" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="d-flex">
                <select name="status" onchange="filterStatus(this)" id="status" class="p-2 rounded text-center">
                    <option value="*">SEMUA STATUS</option>
                    <option value="PENDING">DIPROSES</option>
                    <option value="OTW">SEDANG PENJEPUTAN</option>
                    <option value="FINISHED">SELESAI</option>
                </select>
            </div>
        </di>
        <div class="overflow-scroll">
            <div style="max-height: 500px">
                <table id="myDataTable_no_filter" class="table card-table myDataTable mb-0 overflow">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama Pengguna</th>
                            <th class="text-center">Tanggal Penjemputan</th>
                            <th class="text-center">Waktu Penjemputan</th>
                            <th class="text-center">Total Berat</th>
                            <th class="text-center">Estimasi Harga</th>
                            <th class="text-center">Lokasi</th>
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
@endsection
@push('scripts')
    <script src="{{ asset('js/bundle/sweetalert2.bundle.js') }}"></script>
    <script src="{{ asset('js/bundle/dataTables.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment-with-locales.min.js"
        integrity="sha512-4F1cxYdMiAW98oomSLaygEwmCnIP38pb4Kx70yQYqRwLVCs3DbRumfBq82T08g/4LJ/smbFGFpmeFlQgoDccgg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".datepicker").datepicker({
            format: 'dd MM yyyy',
            autoclose: true,
            todayHighlight: true,
        });

        let limit = 10;
        let orderDate = "{{ date('Y-m-d') }}";
        let status = "*";


        const getDatatable = async (query) => {
            await fetch(`{{ route('admin.dashboard.trans.datatable') }}${query}`)
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
                                <div class="d-flex flex-column">
                                    <p class="m-0">${val.user.name}</p>
                                    <small class="text-success m-0" style="font-weight:bold;">${val.order_number}</small>
                                </div>
                                    <button class="btn btn-sm btn-secondary text-white" style="font-size:12px;">DIPROSES</button>
                            </td>
                            <td class="text-uppercase text-center">${moment(val.order_date).format("DD MMMM Y")}</td>
                            <td class="text-uppercase text-center">${val.range_time}</td>
                            <td class="text-uppercase text-center">${val.weight_kg}kg</td>
                            <td class="text-center"><span class="mx-1 btn btn-light-danger">Rp.${convertToRupiah(val.estimate_amount_minimum)} </span>-<span class="mx-1 btn btn-light-success"> Rp.${convertToRupiah(val.estimate_amount_maximum)}</span></td>
                            <td class="text-uppercase text-center">
                                ${
                                    val.address.longitude?
                                    `<a href="https://maps.google.com/maps?q=${val.address.latidue},${val.address.longitude}&hl=ID&z=10" target="_blank" class="btn btn-dark btn-sm">
                                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                                    </a>`:
                                    "<p class='text-muted font-italic'>-- NO MAP --</p>"
                                }
                                
                            </td>
                            <td class="text-center">
                                <button class="btn btn-light-secondary">
                                    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                            </td>
                        </tr>`;
                        });
                    } else {
                        tempListData = `<tr>
                            <td colspan="8">
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

        getDatatable(`?limit=${limit}&orderDate=${orderDate}&status=${status}`);

        const selectDataTable = self => {
            limit = $(self).val();
            getDatatable(`?limit=${limit}&orderDate=${orderDate}&status=${status}`);
        }

        const filterDate = self => {
            orderDate = $(self).val();
            getDatatable(`?limit=${limit}&orderDate=${orderDate}&status=${status}`);
        }

        const filterStatus = self => {
            status = $(self).val();
            getDatatable(`?limit=${limit}&orderDate=${orderDate}&status=${status}`);
        }

        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return rupiah.split('', rupiah.length - 1).reverse().join('');
        }
    </script>
@endpush
