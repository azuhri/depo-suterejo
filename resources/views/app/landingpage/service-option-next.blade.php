@extends('app.template.master_landingpage')

@section('title')
    Payment
@endsection


@section('css')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection

@section('content')
    <div class="my-10 flex justify-center">
        <div class="w-full flex justify-center">
            <div class="w-2/4">
                <div class="my-4 bg-slate-100 mx-1 border rounded-lg">
                    <p class="text-xl mb-2 font-bold border-b-2 border-b-gray-200 pb-3 p-3 text-primary">INFORMASI ALAMAT
                        PENJEMPUTAN</p>
                    <div class="p-3">
                        <p class="my-2 text-slate-600 text-sm font-semibold">Alamat Anda</p>
                        <button onclick="modal_address.showModal();"
                            class="p-3 px-4 bg-[#05aa5b] text-white rounded-lg font-bold text-xs">
                            Tambahkan alamat
                        </button>
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
                            <input type="text" placeholder="Nama Bank / E-Wallet"
                                class="mt-2 w-full border p-3 rounded-lg bg-transparent">
                        </div>
                        <div class="flex flex-col my-3">
                            <label class="text-slate-600 text-sm font-semibold" for="norek">Nomor
                                Rekening/E-Wallet</label>
                            <input type="text" placeholder="Misal: 14000234567890"
                                class="mt-2 w-full border p-3 rounded-lg bg-transparent">
                        </div>
                        <div class="flex flex-col my-3">
                            <label class="text-slate-600 text-sm font-semibold" for="norek">Nama Pemilik
                                Rekening/E-Wallet</label>
                            <input type="text" placeholder="Misal: Ifa Kurniawati"
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
            <div class="w-1/3 my-4">
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
                            <div class="my-4 text-center bg-primary text-white p-3 rounded-lg font-semibold text-sm">
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
                        <button class="bg-[#05aa5b] uppercase font-semibold text-white rounded-lg p-3 w-full">
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
                <div class="my-4">
                    <div
                        class="w-full text-center bg-gray-100 text-gray-500 border border-gray-500 p-6 rounded-lg text-sm font-bold">
                        -- Anda belum memiliki alamat --
                    </div>
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
                <div id="container_map" class="my-4">
                    <div id="map" class="border-2 min-h-[300px] border-slate-500 rounded-lg w-full">
                    </div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <button id="showMapButton" onclick="showMap(this);"
                        class="p-3 my-2 w-full px-4 bg-[#05aa5b] text-white rounded-lg font-bold text-xs">
                        Tambahkan Pinpoint Alamat Anda
                    </button>
                    <button id="closeMapButton" style="display: none" onclick="closeMap(this);"
                        class="p-3 my-2 px-4 bg-[#05aa5b] text-white rounded-lg font-bold text-xs">
                        Batalkan Pinpoint
                    </button>
                </div>
                <div class="p-3">
                    <div class="flex flex-col my-3">
                        <label class="text-slate-600 text-sm font-semibold" for="norek">Label Alamat</label>
                        <input type="text" placeholder="Nama Bank / E-Wallet"
                            class="mt-2 w-full border p-3 rounded-lg bg-transparent">
                    </div>
                    <div class="flex flex-col my-3">
                        <label class="text-slate-600 text-sm font-semibold" for="norek">
                            Detail Alamat
                        </label>
                        <textarea class="mt-2 w-full border p-3 rounded-lg bg-transparent" name="label_alamat" id="label_alamat" cols="20" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
@endsection

@section('js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            format: 'dd mmmm yyyy', // Change the format here
        });
        const openModalCreateAddress = () => {
            document.getElementById("modal_address").close();
            document.getElementById("modal_create_address").showModal();
        }

        const closeModalCreateAddress = () => {
            document.getElementById("modal_address").showModal();
            document.getElementById("modal_create_address").close();
        }
        $(document).ready(function() {

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
                        marker.setLatLng([lat, lng])
                        circle.setLatLng([lat, lng])
                        $("#latlong").html(`(LatLong: ${lat}, ${lng})`)
                        $("#latitude").val(lat);
                        $("#longitude").val(lng);
                        $("#latlong").show(500)
                        $("#btnSubmitTitikLokasi").attr("disabled", false);
                        circle.setStyle({
                            fillOpacity: 0.4,
                            weight: 3
                        });
                        marker.setOpacity(1);
                        map.flyTo(L.latLng(lat, lng), 14, {
                            animate: true,
                            duration: 2,
                            onComplete: function() {
                                // Callback saat animasi "flyTo" selesai
                                marker.openPopup();
                                // Tambahkan animasi lainnya pada popup marker jika diperlukan
                            }
                        });
                        console.log(position.coords.latitude, position.coords.longitude);
                    }, function(error) {
                        console.log("Error:", error.message);
                    });
                } else {
                    console.log("Geolocation tidak tersedia pada peramban ini");
                }
            }
            getLocationsUser();
            $("#map").hide();
        })

        const showMap = (self) => {
            $(self).hide(100);
            $("#closeMapButton").show(400);
            $("#map").show(500);
        }

        const closeMap = (self) => {
            $(self).hide(200);
            $("#showMapButton").show(400);
            $("#map").hide(500);
        }
    </script>
@endsection
