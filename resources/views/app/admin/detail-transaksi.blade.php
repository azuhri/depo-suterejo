@extends('app.admin.template.master')

@section('title')
    Blog Artikel
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/cssbundle/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cssbundle/dropify.min.css') }}">
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
                        <li class="breadcrumb-item" aria-current="page">Transaksi</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Detail Transaksi</h1>
                    <small class="text-muted">Kode Transaksi: <span
                            class="text-secondary font-bold">{{ $transaction->order_number }}</span></small>
                </div>
            </div> <!-- .row end -->
        </div>
    </div>
@endsection

@section('content_body')
    @php
        $status = '';
        $statusColor = '';
        switch ($transaction->status_transaction) {
            case 'PENDING':
                $status = 'DIPROSES';
                $statusColor = 'btn-secondary';
                break;
            case 'PICKUP':
                $status = 'SEDANG DIJEMPUT';
                $statusColor = 'btn-primary';
                break;
            case 'FINISHED':
                $status = 'SELESAI';
                $statusColor = 'btn-success';
                break;
            default:
                $statusColor = 'btn-success';
                $status = 'DIBAYAR';
                break;
        }
    @endphp
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <!-- Create invoice -->
            <div class="row g-3">
                <div class="col-12">
                    <div class="card print_invoice">
                        <div class="card-header border-bottom fs-4">
                            <h5 class="mb-0">Transaksi dari <span
                                    class="text-secondary font-bold">{{ $transaction->user->name }}</span>&nbsp;<span
                                    style="font-size: 10px"
                                    class="btn btn-sm {{ $statusColor }} text-white">{{ $status }}</span></h5>
                            <a href="https://wa.me/{{ str_replace('08', '62', $transaction->user->phonenumber) }}"
                                target="_blank" class="btn btn-md border shadow">
                                <svg viewBox="0 0 48 48" style="margin-right:4px" width="30" height="30"
                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>Whatsapp-color</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs> </defs>
                                        <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Color-" transform="translate(-700.000000, -360.000000)"
                                                fill="#67C15E">
                                                <path
                                                    d="M723.993033,360 C710.762252,360 700,370.765287 700,383.999801 C700,389.248451 701.692661,394.116025 704.570026,398.066947 L701.579605,406.983798 L710.804449,404.035539 C714.598605,406.546975 719.126434,408 724.006967,408 C737.237748,408 748,397.234315 748,384.000199 C748,370.765685 737.237748,360.000398 724.006967,360.000398 L723.993033,360.000398 L723.993033,360 Z M717.29285,372.190836 C716.827488,371.07628 716.474784,371.034071 715.769774,371.005401 C715.529728,370.991464 715.262214,370.977527 714.96564,370.977527 C714.04845,370.977527 713.089462,371.245514 712.511043,371.838033 C711.806033,372.557577 710.056843,374.23638 710.056843,377.679202 C710.056843,381.122023 712.567571,384.451756 712.905944,384.917648 C713.258648,385.382743 717.800808,392.55031 724.853297,395.471492 C730.368379,397.757149 732.00491,397.545307 733.260074,397.27732 C735.093658,396.882308 737.393002,395.527239 737.971421,393.891043 C738.54984,392.25405 738.54984,390.857171 738.380255,390.560912 C738.211068,390.264652 737.745308,390.095816 737.040298,389.742615 C736.335288,389.389811 732.90737,387.696673 732.25849,387.470894 C731.623543,387.231179 731.017259,387.315995 730.537963,387.99333 C729.860819,388.938653 729.198006,389.89831 728.661785,390.476494 C728.238619,390.928051 727.547144,390.984595 726.969123,390.744481 C726.193254,390.420348 724.021298,389.657798 721.340985,387.273388 C719.267356,385.42535 717.856938,383.125756 717.448104,382.434484 C717.038871,381.729275 717.405907,381.319529 717.729948,380.938852 C718.082653,380.501232 718.421026,380.191036 718.77373,379.781688 C719.126434,379.372738 719.323884,379.160897 719.549599,378.681068 C719.789645,378.215575 719.62006,377.735746 719.450874,377.382942 C719.281687,377.030139 717.871269,373.587317 717.29285,372.190836 Z"
                                                    id="Whatsapp"> </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                Hubungi WA
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card p-3">
                                <div class="border-bottom pb-2">
                                    <p class="text-gray my-2">Alamat Penjemputan</p>
                                    <div class="d-flex flex-column">
                                        <div class="my-2">
                                            @if ($transaction->address->longitude)
                                                <a href="https://maps.google.com/maps?q={{ $transaction->address->latidue }},{{ $transaction->address->longitude }}&hl=ID&z=10"
                                                    target="_blank" class="btn btn-dark btn-sm m-0">
                                                    <svg style="margin-right: 2px; font-weight:bold" viewBox="0 0 24 24"
                                                        width="20" height="20" stroke="currentColor" stroke-width="2"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                        class="css-i6dzq1">
                                                        <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6">
                                                        </polygon>
                                                        <line x1="8" y1="2" x2="8" y2="18">
                                                        </line>
                                                        <line x1="16" y1="6" x2="16" y2="22">
                                                        </line>
                                                    </svg>
                                                    Lihat Maps
                                                </a>
                                            @endif
                                        </div>
                                        <textarea disabled class="form-control w-100 address">{{ $transaction->address->title }}: {{ $transaction->address->detail_address }} ({{ $transaction->address->notes }})</textarea>
                                    </div>
                                    {{-- <div id="logo">
                                        <div id="logoctr">
                                            <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                                            <a href="javascript:;" id="save-logo" title="Save changes">Save</a> | <a
                                                href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                                            <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
                                        </div>
                                        <div id="logohelp">
                                            <input id="imageloc" type="text" size="50" value=""><br> (max
                                            width: 540px, max height: 100px)
                                        </div>
                                        <img id="image" src="../assets/img/logo-icon.svg" alt="logo">
                                    </div> --}}
                                </div>
                                <div style="clear:both"></div>
                                <div class="customer mt-4">
                                    <div class="d-flex flex-column">
                                        <p>Dokumentasi</p>
                                        <div class="d-flex">
                                            @foreach ($transaction->assets as $asset)
                                                <a target="_blank" href="{{ url('/') . '/' . $asset->path_image }}">
                                                    <img style="width: 300px;"
                                                        src="{{ url('/') . '/' . $asset->path_image }}" alt="">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    {{-- <table class="meta">
                                        <tbody>
                                            <tr>
                                                <td class="meta-head">Invoice #</td>
                                                <td>
                                                    <textarea class="form-control">000123</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="meta-head">Date</td>
                                                <td>
                                                    <textarea class="form-control" id="date">December 15, 2021</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="meta-head">Amount Due</td>
                                                <td>
                                                    <div class="due">$875.00</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table> --}}
                                </div>
                                <div style="clear:both"></div>
                                <table class="items">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">Item</th>
                                            <th class="text-center">Estimasi Berat</th>
                                            <th class="text-center">Harga Satuan</th>
                                            <th class="text-center">Berat Akhir</th>
                                            @if ($transaction->status_transaction == 'PICKUP')
                                                <th class="text-center">Aksi</th>
                                            @endif
                                        </tr>
                                        @foreach ($transaction->detail as $item)
                                            <tr class="item-row">
                                                <td class="description">
                                                    <textarea class="text-uppercase" disabled>{{ $item->trash->name }}</textarea>
                                                </td>
                                                <td>
                                                    <p disabled class="text-center">{{ $item->weight_kg }} Kg</p>
                                                </td>
                                                <td>
                                                    <textarea disabled class="text-center">Rp{{ number_format($item->trash->minimum_price, 0, '.', '.') }} - Rp{{ number_format($item->trash->maximum_price, 0, '.', '.') }}</textarea>
                                                </td>
                                                <td class="text-center"><span class="price">{{ $item->final_weight_kg }}
                                                        Kg</span></td>
                                                @if ($transaction->status_transaction == 'PICKUP')
                                                    <td class="text-center">
                                                        <button
                                                            onclick="scalingTrash({{ $item->id }}, '{{ base64_encode($item->trash->name) }}')"
                                                            class="btn btn-sm btn-info"><img style="width: 24px"
                                                                src="https://www.svgrepo.com/show/430171/scales-justice-lawyer.svg"
                                                                alt=""></button>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        @if ($transaction->status_transaction != 'PENDING')
                                            <tr>
                                                <td colspan="2" class="text-left">Estimasi Berat</td>
                                                <td colspan="3" class="total-line">
                                                    <div id="subtotal">{{ $transaction->weight_kg }} Kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-left">Harga Estimasi Terendah</td>
                                                <td colspan="3" class="total-line">
                                                    <div id="total">Rp
                                                        {{ number_format($transaction->estimate_amount_minimum, 0, '.', '.') }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-left">Harga Estimasi Tertinggi</td>
                                                <td colspan="3" class="total-line">
                                                    <div id="total">Rp
                                                        {{ number_format($transaction->estimate_amount_maximum, 0, '.', '.') }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-left">Total Berat Akhir</td>
                                                <td colspan="3" class="total-line">
                                                    <div id="total">{{ $transaction->final_weight_kg }} Kg</div>
                                                </td>
                                            </tr>
                                            @php
                                                $totalHarga = 0;
                                                foreach ($transaction->detail as $detail) {
                                                    $totalHarga +=
                                                        $detail->trash->maximum_price * $detail->final_weight_kg;
                                                }
                                                $finalPrice = $totalHarga - $totalHarga * 0.1;
                                            @endphp
                                            @if ($transaction->isFinishedScales())
                                                <tr>
                                                    <td colspan="2" class="text-left">Total Harga</td>
                                                    <td colspan="3" class="total-line">
                                                        <div id="total">Rp
                                                            {{ number_format($totalHarga, 0, '.', '.') }}</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-left">Biaya Admin (10%)</td>
                                                    <td colspan="3" class="total-line">
                                                        <div id="total">Rp
                                                            {{ number_format($totalHarga * 0.1, 0, '.', '.') }}</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-left balance">Total Harga Akhir</td>
                                                    <td colspan="3" class="total-line balance">
                                                        <div class="due">Rp
                                                            {{ number_format($finalPrice, 0, '.', '.') }}</div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    </tbody>
                                </table>
                                <div style="clear:both"></div>
                                @if ($transaction->status_transaction != 'PENDING')
                                    <div class="footer-note mt-5">
                                        <h5>Note:</h5>
                                        <textarea class="form-control bg-light" disabled>Setiap transaksi dikenakan potongan biaya admin 10%</textarea>
                                    </div>
                                @endif

                                @if ($transaction->status_transaction == 'FINISHED' || $transaction->status_transaction == "PAID")
                                    <div class="mt-4">
                                        <div class="my-1">
                                            <p class="m-0">Nama Bank/E-Wallet</p>
                                            <p style="font-weight: bold">{{$transaction->bank_name}}</p>
                                        </div>
                                        <div class="mb-1">
                                            <p class="m-0">No Rekening/ No HP</p>
                                            <p style="font-weight: bold">{{$transaction->rekening_number}}</p>
                                        </div>
                                        <div class="mb-1">
                                            <p class="m-0">Nama Penerima</p>
                                            <p style="font-weight: bold">{{$transaction->rekening_name}}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($transaction->status_transaction == 'FINISHED' || $transaction->status_transaction == "PAID")
                            <div class="p-4">
                                <label class="my-2" for="payment_doc">Upload Bukti Pembayaran</label>
                                <div class="">
                                    <input onchange="uploadPaymentDoc();" type="file" id="payment_doc" data-default-file='{{url('/')."/".$transaction->payment_doc_path}}' class="dropify" data-max-file-size="1M" data-allowed-file-extensions="png jpg jpeg" />
                                    <small class="text-muted my-1"> <i> Gambar bukti pembayaran harus berupa <span
                                                class="text-danger">(png, jpg, jpeg)</span></i></small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 text-center text-md-end">
                    @if ($transaction->status_transaction == 'PENDING')
                        <button onclick="pickupOrder();" type="button"
                            class="btn btn-md btn-dark d-flex align-items-center justify-content-center">JEMPUT SEKARANG
                            <svg style="margin-left: 6px" viewBox="0 0 24 24" width="24" height="24"
                                stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" class="mr-2">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg></button>
                    @elseif($transaction->status_transaction == 'PICKUP' && $transaction->isFinishedScales())
                        <button onclick="finishOrder();" type="button"
                            class="btn btn-md btn-primary d-flex align-items-center justify-content-center">SELESAIKAN
                            TRANSAKSI
                        </button>
                    @endif
                    {{-- <button type="button" class="btn btn-lg btn-primary" onclick="window.print();return false"><i
                            class="fa fa-print me-2"></i>Print Invoice</button>
                    <button type="button" class="btn btn-lg btn-secondary"><i class="fa fa-envelope me-2"></i>Send
                        PDF</button> --}}
                </div>
            </div> <!-- .row end -->
            <!-- Plugin Js -->
            <script src="../assets/js/bundle/invoice.bundle.js"></script>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="scalingTrashModal" tabindex="-1" aria-labelledby="scalingTrashModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scalingTrashModalLabel">Timbang Sampah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="my-2">
                        <label class="my-1" for="">Nama Item</label>
                        <input type="text" value="Sampah Plastik" id="item_name" disabled class="form-control">
                    </div>
                    <input type="hidden" name="weight_fix" id="weight_fix">
                    <input type="hidden" name="detailTrxId" id="detailTrxId">
                    <div class="my-2">
                        <label class="my-1" for="">Berat</label>
                        <div class="input-group mb-3">
                            <input disabled type="text" id="inputBerat" class="form-control" value="0KG"
                                aria-describedby="button-addon2">
                            <button onclick="regetDataWeight();" class="btn btn-outline-secondary" type="button"
                                id="button-addon2">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <polyline points="23 4 23 10 17 10"></polyline>
                                    <polyline points="1 20 1 14 7 14"></polyline>
                                    <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="saveWeight(this);" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
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
        let dropify = $('#payment_doc').dropify();
        const pickupOrder = () => {
            Swal.fire({
                position: 'center',
                title: "Konfirmasi!",
                text: `Jemput transaksi sampah ini sekarang ?`,
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonText: 'BATAL',
                confirmButtonText: 'IYA',
                confirmButtonColor: '#009FBD',
                cancelButtonColor: '#595552',
            }).then(val => {
                if (val.isConfirmed) {
                    window.location.href =
                        '{{ route('admin.dashboard.trans.pickup', $transaction->unique_code) }}';
                }
            });
        }

        const finishOrder = () => {
            Swal.fire({
                position: 'center',
                title: "Konfirmasi!",
                text: `Anda yakin ingin menyelesaikan transaksi ini?`,
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonText: 'BATAL',
                confirmButtonText: 'IYA',
                confirmButtonColor: '#009FBD',
                cancelButtonColor: '#595552',
            }).then(val => {
                if (val.isConfirmed) {
                    window.location.href =
                        '{{ route('admin.dashboard.trans.finish', $transaction->unique_code) }}';
                }
            });
        }

        const getWeightTrash = async () => {
            await fetch('{{ route('admin.dashboard.trans.scalling') }}') // Ganti dengan URL API Anda
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json(); // Jika respons berupa JSON
                })
                .then(data => {
                    $("#inputBerat").val(data.data + " Kg")
                    $("#weight_fix").val(data.data)
                    console.log(data);
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        }

        const scalingTrash = (trxDetailId, encryptedName) => {
            $("#detailTrxId").val(trxDetailId);
            $("#item_name").val(atob(encryptedName).toUpperCase())
            getWeightTrash();
            $("#scalingTrashModal").modal("show");
        }

        const regetDataWeight = () => {
            getWeightTrash();
        }

        const saveWeight = (self) => {
            let detailTrxId = $("#detailTrxId").val();
            $.ajax({
                url: '{{ route('admin.dashboard.trans.scalling', '') }}/' +
                    detailTrxId, // Ganti dengan URL API Anda
                type: 'POST',
                data: {
                    weight: $('#weight_fix').val(),
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function() {
                    $(self).html(`<div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                    </div>`);
                },
                success: function(response) {
                    $("#scalingTrashModal").modal("hide");
                    setTimeout(() => {
                        location.reload();
                    }, 300);
                },
                error: function(error) {
                    // Tindakan jika permintaan gagal
                    console.error(error);
                }
            });
        }

        const uploadPaymentDoc = () => {
            let dataForm = new FormData();
            let payementDoc = $("#payment_doc")[0].files[0];
            dataForm.append("payment_doc", payementDoc);
            dataForm.append("_token", '{{csrf_token()}}');
            $.ajax({
                url: '{{ route("admin.dashboard.trans.upload.payment-doc", $transaction->unique_code) }}',
                type: "POST",
                contentType: false, // Tidak mengatur header konten
                processData: false, // Tidak memproses data
                async: true,
                dataType: "json",
                data: dataForm,
                success: function(res) {
                    setTimeout(() => {
                        location.reload();
                    }, 300);
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
    </script>
@endpush
