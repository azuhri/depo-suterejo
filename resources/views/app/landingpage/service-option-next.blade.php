@extends('app.template.master_landingpage')

@section('title')
    Payment
@endsection


@section('css')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="{{ asset('/cssbundle/sweetalert2.min.css') }}">
@endsection

@section('content')
    <div class="my-10 flex justify-center">
        <div class="w-full flex-col md:flex-row px-4 md:px-10 md:flex justify-center">
            <div class="w-full md:w-3/4">
                <div class="my-4 bg-slate-100 mx-1 border rounded-lg">
                    <p class="text-xl font-bold border-b-2 border-b-gray-200 pb-3 p-3 text-primary">INFORMASI ALAMAT
                        PENJEMPUTAN</p>
                    <div class="p-3">
                        <p class="mb-4 text-slate-600 text-sm font-semibold">Alamat Penjemputan</p>
                        <div id="addressContainer">
                            @if (!$defaultAddress)
                                <button onclick="modal_address.showModal();"
                                    class="p-3 px-4 bg-[#05aa5b] text-white rounded-lg font-bold text-xs">
                                    Tambahkan alamat
                                </button>
                            @else
                                @include('app.landingpage.partials.address.address-container', [
                                    'data' => $defaultAddress,
                                ])
                            @endif
                        </div>
                    </div>
                </div>
                <div class="my-4 bg-slate-100 mx-1 border rounded-lg ">
                    <p class="text-xl mb-2 font-bold border-b-2 border-b-gray-200 pb-3 p-3 text-primary">INFORMASI
                        PENJEMPUTAN</p>
                    <div class="p-3">
                        <div class="flex items-center w-full">
                            <div class="w-3/4 mr-2">
                                <p class="my-2 text-slate-600 text-sm font-semibold">Tanggal Penjemputan</p>
                                <input id="datepicker" type="text">
                            </div>
                            <div class="w-1/4 ml-2">
                                <p class="my-2 text-slate-600 text-sm font-semibold">Waktu Penjemputan</p>
                                <select class="w-full text-xs text-center rounded-lg p-2 border" name="time_pickup"
                                    id="time_pickup">
                                    <option value="08:00-10:00">08:00-10:00</option>
                                    <option value="10:00-12:00">10:00-12:00</option>
                                    <option value="12:00-14:00">12:00-14:00</option>
                                    <option value="14:00-16:00">14:00-16:00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-4 bg-slate-100 mx-1 border rounded-lg">
                    <p class="text-xl mb-2 font-bold border-b-2 border-b-gray-200 pb-3 p-3 text-primary">INFORMASI REKENING
                        ANDA</p>
                    <div class="p-3">
                        <div class="flex flex-col my-3">
                            <label class="text-slate-600 text-sm font-semibold" for="norek">Rekening Tujuan</label>
                            <input type="text" id="merchant" placeholder="Nama Bank / E-Wallet"
                                class="mt-2 w-full border p-3 rounded-lg bg-transparent">
                        </div>
                        <div class="flex flex-col my-3">
                            <label class="text-slate-600 text-sm font-semibold" for="norek">Nomor
                                Rekening/E-Wallet</label>
                            <input type="text" id="norek" placeholder="Misal: 14000234567890"
                                class="mt-2 w-full border p-3 rounded-lg bg-transparent">
                        </div>
                        <div class="flex flex-col my-3">
                            <label class="text-slate-600 text-sm font-semibold" for="norek">Nama Pemilik
                                Rekening/E-Wallet</label>
                            <input type="text" id="receiver" placeholder="Misal: Ifa Kurniawati"
                                class="mt-2 w-full border p-3 rounded-lg bg-transparent">
                        </div>
                    </div>
                </div>
                <div class="my-4 bg-slate-100 mx-1 border rounded-lg">
                    <p class="text-xl mb-2 font-bold border-b-2 border-b-gray-200 pb-3 p-3 text-primary">DOKUMENTASI GAMBAR
                    </p>
                    <div class="p-3 flex gap-4">
                        @foreach ($sessionImages as $img)
                            <img class="w-1/3" src="{{ asset($img) }}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 my-4">
                <div class="w-full  bg-slate-100 mx-1 border rounded-lg">
                    <p class="text-xl w-full mb-2 font-bold border-b-2 border-b-gray-200 pb-3 p-3 text-primary">INFORMASI
                        PENJUALAN</p>
                    <div class="p-3">
                        <div class="px-2 pb-6">
                            @foreach ($sessionTrash as $trash)
                                <div class="flex justify-between my-4">
                                    <div class="flex flex-col">
                                        <p class="text-sm text-primary uppercase font-semibold">{{ $trash->name }}</p>
                                        <p class="text-xs font-normal">Berat: {{ $trash->weight }}kg</p>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold">
                                            <span
                                                class="border border-red-500 p-1 px-2 rounded-lg bg-red-100 text-red-500">Rp.{{ number_format($trash->minPrice, 0, '.', '.') }}
                                            </span>
                                            <span class="mx-1">s.d</span>
                                            <span
                                                class="border border-green-500 p-1 px-2 rounded-lg bg-green-100 text-green-500">Rp.{{ number_format($trash->maxPrice, 0, '.', '.') }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            <div class="my-4 text-center bg-blue-500 text-white p-3 rounded-lg font-semibold text-sm">
                                Biaya Layanan Dikenakan Ke Pengguna Sebesar 10%
                            </div>
                            <div class="flex justify-between my-4">
                                <p class="text-sm text-primary uppercase font-semibold">Total Estimasi Penjualan</p>
                                <div>
                                    <p class="text-xs font-bold">
                                        <span
                                            class="border border-red-500 p-1 px-2 rounded-lg bg-red-100 text-red-500">Rp.{{ number_format($totalMinPrice, 0, '.', '.') }}
                                        </span>
                                        <span class="mx-1">s.d</span>
                                        <span
                                            class="border border-green-500 p-1 px-2 rounded-lg bg-green-100 text-green-500">Rp.{{ number_format($totalMaxPrice, 0, '.', '.') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-between my-4">
                                <p class="text-sm text-primary uppercase font-semibold">Biaya Aplikasi</p>
                                <div>
                                    <p class="text-xs font-bold">
                                        <span
                                            class="border border-red-500 p-1 px-2 rounded-lg bg-red-100 text-red-500">Rp.{{ number_format($totalMinPrice * 0.1, 0, '.', '.') }}
                                        </span>
                                        <span class="mx-1">s.d</span>
                                        <span
                                            class="border border-green-500 p-1 px-2 rounded-lg bg-green-100 text-green-500">Rp.{{ number_format($totalMaxPrice * 0.1, 0, '.', '.') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-between my-4">
                                <p class="text-sm text-primary uppercase font-semibold">Total Estimasi Pendapatan</p>
                                <div>
                                    <p class="text-xs font-bold">
                                        <span
                                            class="border border-red-500 p-1 px-2 rounded-lg bg-red-100 text-red-500">Rp.{{ number_format($totalMinPrice - $totalMinPrice * 0.1, 0, '.', '.') }}
                                        </span>
                                        <span class="mx-1">s.d</span>
                                        <span
                                            class="border border-green-500 p-1 px-2 rounded-lg bg-green-100 text-green-500">Rp.{{ number_format($totalMaxPrice - $totalMaxPrice * 0.1, 0, '.', '.') }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button onclick="sendData(this)"
                            class="bg-primary uppercase font-semibold text-white rounded-lg p-3 w-full">
                            KIRIM
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <dialog id="modal_address" class="modal">
        <div class="modal-box w-11/12 max-w-2xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg text-primary">DATA ALAMAT ANDA</h3>
            <div class="flex flex-col">
                <button onclick="openModalCreateAddress();"
                    class="p-3 my-4 w-full rounded-lg border border-primary text-primary text-center text-sm font-semibold">
                    Tambahkan Alamat Baru
                </button>
                <div class="my-4" id="listAddress">
                    @if (!$defaultAddress)
                        <div id="empty_address"
                            class="w-full text-center bg-gray-100 text-gray-500 border border-gray-500 p-6 rounded-lg text-sm font-bold">
                            -- Anda belum memiliki alamat --
                        </div>
                    @else
                        @foreach ($allAddress as $addr)
                            @include('app.landingpage.partials.address.list-address', ['data' => $addr])
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </dialog>

    <dialog id="modal_create_address" class="modal">
        <div class="modal-box w-11/12 max-w-2xl">
            <button onclick="closeModalCreateAddress();"
                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <h3 class="font-bold text-lg text-primary">MEMBUAT ALAMAT BARU</h3>
            <div class="flex flex-col">
                @include('app.landingpage.partials.address.form-address')
            </div>
        </div>
    </dialog>

    {{-- <dialog id="modal_edit_address" class="modal">
        <div class="modal-box w-11/12 max-w-2xl">
            <button onclick="closeModalEditAddress();"
                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            <h3 class="font-bold text-lg text-primary">EDIT ALAMAT BARU</h3>
            <div class="flex flex-col">
                @include('app.landingpage.partials.address.form-address')
            </div>
        </div>
    </dialog> --}}
@endsection

@section('js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/bundle/sweetalert2.bundle.js') }}"></script>
    <script>
        let originLatitude;
        let originLongitude;
        $('#datepicker').datepicker({
            format: 'dd mmmm yyyy', // Change the format here
            minDate: new Date(), // Set minDate to today's date
        });

        const openModalCreateAddress = () => {
            document.getElementById("modal_address").close();
            document.getElementById("modal_create_address").showModal();
            marker.setLatLng([originLatitude, originLongitude])
            circle.setLatLng([originLatitude, originLongitude])
            map.flyTo(L.latLng(originLatitude, originLongitude), 14, {
                animate: true,
                duration: 2,
                onComplete: function() {
                    // Callback saat animasi "flyTo" selesai
                    marker.openPopup();
                    // Tambahkan animasi lainnya pada popup marker jika diperlukan
                }
            });
            console.log("Test");
        }

        const closeModalCreateAddress = () => {
            document.getElementById("modal_address").showModal();
            document.getElementById("modal_create_address").close();
            let title = $("#label_address").val("");
            let detailAddress = $("#detail_address").val("");
            let notes = $("#notes_address").val("");
            $("#address_id").val("");
            $("#showMapButton").show(400);
            $("#closeMapButton").hide();
            $("#map").hide(500);
        }

        const closeModalEditAddress = () => {
            document.getElementById("modal_address").showModal();
            document.getElementById("modal_edit_address").close();
        }

        var map = L.map('map').setView([-7.275612, 112.6301103], 13);
        googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 30,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);
        let icon = L.icon({
            iconUrl: '{{ url('/') }}/icons/pin-red.png',

            iconSize: [25, 25], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [12, 25], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        let circle = L.circle([-7.275612, 112.6301103], {
            color: 'blude',
            fillColor: '#1F448B',
            fillOpacity: 0.4,
            radius: 100
        }).addTo(map);
        let marker = L.marker([-7.275612, 112.6301103]).addTo(map);
        marker.setOpacity(0);
        circle.setStyle({
            fillOpacity: 0,
            weight: 0
        });
        map.on('click', function(ev) {
            console.log(ev);
            let {
                lat,
                lng
            } = ev.latlng;
            $("#latitude").val(lat);
            $("#longitude").val(lng);
            $("#btnSubmitTitikLokasi").attr("disabled", false);
            circle.setStyle({
                fillOpacity: 0.4,
                weight: 3
            });
            marker.setOpacity(1);
            marker.setLatLng([lat, lng]);
            circle.setLatLng([lat, lng]);
        });

        map.on('mouseover', function() {
            map.getContainer().style.cursor = 'crosshair';
        });
        const getLocationsUser = () => {
            if ("geolocation" in navigator) {
                var watchID = navigator.geolocation.watchPosition(function(position) {
                    let lat = position.coords.latitude;
                    let lng = position.coords.longitude;
                    if (lat !== originLatitude || lng !== originLongitude) {
                        originLatitude = lat;
                        originLongitude = lng;
                        console.log(originLatitude, originLongitude);
                        marker.setLatLng([originLatitude, originLongitude])
                        circle.setLatLng([originLatitude, originLongitude])
                        $("#latitude").val(originLatitude);
                        $("#longitude").val(originLongitude);
                        circle.setStyle({
                            fillOpacity: 0.4,
                            weight: 3
                        });
                        marker.setOpacity(1);
                        map.flyTo(L.latLng(originLatitude, originLongitude), 14, {
                            animate: true,
                            duration: 2,
                            onComplete: function() {
                                // Callback saat animasi "flyTo" selesai
                                marker.openPopup();
                                // Tambahkan animasi lainnya pada popup marker jika diperlukan
                            }
                        });
                    }
                }, function(error) {
                    console.log("Error:", error.message);
                });
            } else {
                console.log("Geolocation tidak tersedia pada peramban ini");
            }
        }

        $(document).ready(function() {
            getLocationsUser();
            $("#map").hide();
        })

        const openModalEditAddress = (json) => {
            console.log(json);
            let title = $("#label_address").val(json.title);
            let detailAddress = $("#detail_address").val(json.detail_address);
            let notes = $("#notes_address").val(json.notes);
            let latitude = $("#latitude").val(json.latidue);
            let longitude = $("#longitude").val(json.longitude);
            let location = $(self).attr("data-location", json.longitude ? "true" : "false");
            $("#address_id").val(json.id);
            if (json.longitude) {
                $("#closeMapButton").show(400);
                $("#showMapButton").hide();
                $("#map").show(500);
                marker.setLatLng([json.latidue, json.longitude])
                circle.setLatLng([json.latidue, json.longitude])
                map.flyTo(L.latLng(json.latidue, json.longitude), 14, {
                    animate: true,
                    duration: 2,
                    onComplete: function() {
                        // Callback saat animasi "flyTo" selesai
                        marker.openPopup();
                        // Tambahkan animasi lainnya pada popup marker jika diperlukan
                    }
                });
            }
            document.getElementById("modal_address").close();
            document.getElementById("modal_create_address").showModal();
        }

        const showMap = (self) => {
            $(self).hide(100);
            $("#closeMapButton").show(400);
            $("#map").show(500);
            $("#buttonSubmitAddress").attr("data-location", true);
        }

        const closeMap = (self) => {
            $(self).hide(200);
            $("#showMapButton").show(400);
            $("#map").hide(500);
            $("#buttonSubmitAddress").attr("data-location", false);
        }

        const createNewAddress = (self) => {
            let title = $("#label_address").val();
            let detailAddress = $("#detail_address").val();
            let notes = $("#notes_address").val();
            let latitude = $("#latitude").val();
            let longitude = $("#longitude").val();
            let id = $("#address_id").val();
            let location = $(self).attr("data-location");
            let data = {
                title,
                id,
                detail_address: detailAddress,
                notes,
                _token: "{{ csrf_token() }}",
            }
            if ((location === "true" && id !== "") || (location === "true" && id === "")) {
                data.longitude = longitude;
                data.latitude = latitude;
            }

            $.ajax({
                url: '{{ route('account.address.create') }}',
                type: "POST",
                async: true,
                dataType: "json",
                beforeSend: function() {
                    $(self).attr("disabled", "disabled");
                    $(self).html(`<span class="loading loading-spinner loading-md"></span>`);
                },
                data: data,
                success: function(res) {
                    if (res.data.status) {
                        let elAddress = `<div class="flex items-center mb-2">
                                            <p class="text-xs flex">
                                                <span class="font-normal items-center flex p-1 px-3 bg-green-600 text-xs text-white rounded-full">
                                                    ${res.data.title}
                                                </span>
                                                ${
                                                    res.data.longitude?
                                                    `<span class="flex items-center mx-2 p-2 px-3 bg-gray-500 text-white rounded-full font-normal">
                                                                                                                                    <svg class="mr-1" viewBox="0 0 24 24" width="15" height="15" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                                                                                                                    Telah Di Pinpoint
                                                                                                                                </span>`:
                                                    "" 
                                                }
                                            </p>
                                        </div>
                                        <div class="my-4">
                                            <p class="text-sm text-gray-500 font-semibold">
                                                ${res.data.detail_address}
                                            </p>
                                            <p class="${!res.data.notes ? "hiddend": ""} text-xs mt-2 font-normal italic">Note: Depan masjid</p>
                                            <button class="mt-4 text-xs p-2 px-3 rounded-full bg-primary text-white font-normal"
                                                type="button">
                                                <span>Ganti Alamat</span>
                                            </button>
                                        </div>`;
                        $("#addressContainer").html(elAddress);
                        $("#empty_address").remove();
                    }
                    if (id) {
                        $("#listAddress").html(res.data.html_list_address);
                        $("#addressContainer").html(res.data.html_address_container);
                    } else {
                        $("#listAddress").append(res.data.list_address_html);
                    }
                    $(self).removeAttr("disabled");
                    $(self).html("Simpan");
                    closeModalCreateAddress();
                    $("#label_address").val("");
                    $("#detail_address").val("");
                    $("#notes_address").val("");
                    vt.success(res.message, {
                        title: "Pesan!",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    });
                },
                error: function(err) {
                    $(self).removeAttr("disabled");
                    $(self).html("Simpan");
                    vt.warn(err.responseJSON.errors, {
                        title: "Peringatan",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    });
                }
            });

        }

        const deleteAddress = (address_id, labelName) => {
            let modalAddress = document.getElementById("modal_address");
            modalAddress.close();
            Swal.fire({
                position: 'top',
                title: "Konfirmasi!",
                text: `Apakah Anda ingin menghapus alamat ${labelName}?`,
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonText: 'BATAL',
                confirmButtonText: 'HAPUS',
                confirmButtonColor: '#009FBD',
                cancelButtonColor: '#595552',
            }).then(val => {
                if (val.isConfirmed) {
                    $.ajax({
                        url: '{{ route('account.address.delete') }}',
                        type: "DELETE",
                        async: true,
                        dataType: "json",
                        beforeSend: function() {},
                        data: {
                            address_id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            $("#list_address_" + res.data.id).remove();
                            vt.success(res.message, {
                                title: "Pesan!",
                                position: "top-right",
                                // position: toastPosition.TopCenter,
                                duration: 4000,
                                closable: false,
                                focusable: false,
                                callback: undefined
                            });
                            modalAddress.showModal();
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
                            });
                        }
                    });

                }
                modalAddress.showModal();
            });
        }

        const selectAddress = (self, address_id) => {
            let modalAddress = document.getElementById("modal_address");
            $.ajax({
                url: '{{ route('account.address.select') }}',
                type: "post",
                async: true,
                dataType: "json",
                beforeSend: function() {
                    $(self).attr("disabled", "disabled");
                    $(self).html(`<span class="loading loading-spinner loading-md"></span>`);
                },
                data: {
                    address_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    $("#listAddress").html(res.data.html);
                    $("#addressContainer").html(res.data.html_address_default)
                    modalAddress.close();
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
                    });
                }
            });
        }

        const sendData = (self) => {
            let range_time = $("#time_pickup").val();
            let order_date = $("#datepicker").val();
            let bank_name = $("#merchant").val();
            let rekening_number = $("#norek").val();
            let rekening_name = $("#receiver").val();
            let address_id = $("#default_address_id").val();
            $.ajax({
                url: '{{ route('account.services.next.submit') }}',
                type: "post",
                async: true,
                dataType: "json",
                beforeSend: function() {
                    $(self).attr("disabled", "disabled");
                    $(self).html(`<span class="loading loading-spinner loading-md"></span>`);
                },
                onComplete: function() {

                },
                data: {
                    address_id,
                    range_time,
                    order_date,
                    bank_name,
                    rekening_number,
                    rekening_name,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    setTimeout(() => {
                        window.location.href = "{{route('account.transaction.succeed.index')}}"
                    }, 2000);
                },
                error: function(err) {
                    $(self).removeAttr("disabled", "disabled");
                    $(self).html(`KIRIM`);
                    vt.warn(err.responseJSON.errors, {
                        title: "Peringatan",
                        position: "top-right",
                        // position: toastPosition.TopCenter,
                        duration: 4000,
                        closable: false,
                        focusable: false,
                        callback: undefined
                    });
                }
            });
        }
    </script>
@endsection
