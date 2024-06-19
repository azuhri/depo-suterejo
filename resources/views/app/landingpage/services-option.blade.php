@extends('app.template.master_landingpage')

@section('title')
    Opsi Layanan
@endsection

@section('css')
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endsection

@section('content')
    <div class="my-32 mb-40 px-4 flex justify-center">
        <div class="w-full flex justify-centet flex-col items-center">
            <p class="text-primary font-bold text-3xl">JENIS SAMPAH</p>
            <p class="mt-2 text-gray-500">Pilih jenis sampah yang ingin anda jual</p>
            <p class="text-gray-500">kepada kolektor</p>
            <div class="mt-20 grid gap-3 lg:grid-cols-3">
                @foreach ($trashCategory as $tc)
                    <div class="p-3 border rounded-xl shadow bg-zinc-100 relative">
                        <div class="flex justify-between">
                            <div class="w-1/2 p-4">
                                <img class="w-[150px]" src="{{ asset($tc->path_image) }}" alt="">
                            </div>
                            <div class="w-1/2 flex flex-col justify-center">
                                <p class="uppercase text-primary font-semibold">{{ $tc->name }}</p>
                                <p class="text-sm text-gray-500 mt-2">Rp
                                    {{ number_format($tc->trashes[0]->minimum_price, 0, '.', '.') }} s.d Rp
                                    {{ number_format($tc->trashes[count($tc->trashes) - 1]->maximum_price, 0, '.', '.') }}
                                </p>
                                <p class="text-sm text-gray-500 mb-2"> Estimasi per Kg</p>
                            </div>
                        </div>
                        <div class="absolute bottom-3 right-3">
                            <button onclick="modal_{{ $tc->id }}.showModal()"
                                class="bg-primary p-2 rounded-full text-white">
                                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <dialog id="modal_{{ $tc->id }}" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <div class="modal-action w-full d-flex flex-col">
                                <div class="flex w-full justify-between border-b border-b-gray-500">
                                    <div class="w-1/2 p-4">
                                        <img class="w-[150px]" src="{{ asset($tc->path_image) }}" alt="">
                                    </div>
                                    <div class="w-1/2 flex flex-col justify-center">
                                        <p class="uppercase font-semibold">{{ $tc->name }}</p>
                                        <p class="text-sm text-gray-500 mt-2">Rp
                                            {{ number_format($tc->trashes[0]->minimum_price, 0, '.', '.') }} s.d Rp
                                            {{ number_format($tc->trashes[count($tc->trashes) - 1]->maximum_price, 0, '.', '.') }}
                                        </p>
                                        <p class="text-sm text-gray-500 mb-2"> Estimasi per Kg</p>
                                    </div>
                                </div>
                                <div class="my-2 p-4" id="container_sub_trash_{{ $tc->id }}">
                                    <p class="font-semibold text-md">Sub Kategori Sampah</p>
                                    @foreach ($tc->trashes as $trash)
                                        <div class="flex flex-col my-2">
                                            <div class="flex">
                                                <div class="flex w-2/3 items-center">
                                                    <input type="checkbox" class="checkbox check-secondary"
                                                        id="checked_trash{{ $trash->id }}"
                                                        onchange="checkedTrash(this, {{ $tc->id }}, {{ $trash->id }});"
                                                        data-trash-id="{{ $trash->id }}">
                                                    <label class="ml-2 uppercase text-sm"
                                                        for="checked_trash{{ $trash->id }}"
                                                        id="label_trash_{{ $trash->id }}">{{ $trash->name }}</label>
                                                </div>
                                                <p class="text-xs w-1/3 ml-2 text-right">
                                                    Rp{{ number_format($trash->minimum_price, 0, '.', '.') }} -
                                                    Rp{{ number_format($trash->maximum_price, 0, '.', '.') }}</p>
                                            </div>
                                        </div>
                                        <div id="container_predict_weight_{{ $trash->id }}" style="display: none"
                                            class="flex justify-between w-full items-center">
                                            <p class="text-xs ml-5 text-primary font-bold">Perkiraan Berat</p>
                                            <div>
                                                <input type="number" min="0.5"
                                                    class="text-xs text-right p-1 border border-gray-500 rounded w-[60px]"
                                                    id="input_weight_{{ $trash->id }}" value="0"
                                                    placeholder="Berat">
                                                <input type="hidden" id="min_price_{{ $trash->id }}"
                                                    value="{{ $trash->minimum_price }}">
                                                <input type="hidden" id="max_price_{{ $trash->id }}"
                                                    value="{{ $trash->maximum_price }}">
                                                <span class="text-xs">Kg</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="bg-primary text-white w-full py-3 rounded-xl"
                                    id="butto_save_{{ $tc->id }}" onclick="saveButton(this, {{ $tc->id }})">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </dialog>
                @endforeach
            </div>
            <div class="mt-4 w-[500px] lg:w-[1350px] px-6">
                <p class="text-primary font-bold">Upload Gambar Sampah</p>
            </div>
            <div class="w-[500px] lg:w-[1350px] px-6">
                <input type="file" class="filepond mt-4" name="filepond[]" multiple data-max-files="3">
                <p class="text-xs text-gray-500 italic">Note: gambar harus berupa (.png/.jpg/.jpeg)</p>
            </div>
            <div style="display: none"id="container_list"
                class="overflow-x-auto my-6 flex flex-col justify-between w-[500px] lg:w-[1350px] px-6 text-sm text-primary font-bold">
                <p class="text-xl text-primary my-2">List Sampah Anda</p>
                <table class="table rounded">
                    <!-- head -->
                    <thead>
                        <tr class="text-center text-black">
                            {{-- <th>No</th> --}}
                            <th>Jenis Sampah</th>
                            <th>Berat</th>
                            <th>Estimasi Harga</th>
                        </tr>
                    </thead>
                    <tbody class="text-primary" id="body_table_list">

                    </tbody>
                </table>
            </div>
            <div class="flex items-center mt-4 w-[500px] lg:w-[1350px] px-4">
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <input type="checkbox" class="checkbox" />
                        <span class="label-text m-0 ml-2 font-semibold">Pakai timbangan digital</span>
                    </label>
                </div>
                <span class="text-xs mx-4 p-2 px-4 text-white bg-blue-800 rounded-lg font-bold">REKOMENDASI</span>
            </div>
            <div class="w-[500px] lg:w-[1350px] px-6 my-4">
                <button onclick="submitData(this);"
                    class="bg-primary text-white p-3 px-6 float-right flex justify-evenly text-center rounded-xl">
                    {{-- Total Sampah <span>2,5</span>Kg | Estimasi Harga - <span>Rp0</span> s.d <span>Rp0</span> --}}
                    Selanjutnya
                </button>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        const inputElement = document.querySelector('.filepond');
        const pond = FilePond.create(inputElement, {
            maxFiles: 3, // Membatasi jumlah file yang dapat di-upload menjadi 3
            instantUpload: true,
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            labelFileTypeNotAllowed: "File yang di bolehkan hanya .jpg/.png/.jpeg",
            labelIdle: "Upload gambar dengan cara Drag & Drop atau Browse"
        });

        const checkedTrash = (self, trashCategoryId, trashId) => {
            let isChecked = $(self).prop("checked");
            if (isChecked) {
                $("#container_predict_weight_" + trashId).slideDown(200);
            } else {
                $("#container_predict_weight_" + trashId).slideUp(200);
                $("#input_weight_" + trashId).val(0);
            }
        }

        let dataTrash = [];
        const saveButton = (self, trashCategoryId) => {
            let counterChecked = 0;
            let isTimeToCloseModal = true;
            $('#container_sub_trash_' + trashCategoryId).find('input[type="checkbox"]').each(function() {
                const checkbox = $(this);
                let trashId = checkbox.attr("data-trash-id");
                if (checkbox.prop("checked")) {
                    let weight = parseFloat($("#input_weight_" + trashId).val());
                    let minPrice = parseInt($("#min_price_" + trashId).val());
                    let maxPrice = parseInt($("#max_price_" + trashId).val());
                    let subTrash = $("#label_trash_" + trashId).text();
                    if (weight <= 0) {
                        vt.warn(`Berat dari ${subTrash} tidak boleh kosong`, {
                            title: "Peringatan",
                            position: "top-right",
                            // position: toastPosition.TopCenter,
                            duration: 4000,
                            closable: false,
                            focusable: false,
                            callback: undefined
                        })
                        isTimeToCloseModal = false;
                        return
                    }
                    const index = dataTrash.findIndex(trash => trash.id === trashId);
                    if (index !== -1) {
                        dataTrash[index].weight = weight;
                        dataTrash[index].minPrice = minPrice * weight;
                        dataTrash[index].maxPrice = maxPrice * weight;
                    } else {
                        let trash = {
                            id: trashId,
                            name: subTrash,
                            weight,
                            minPrice: minPrice * weight,
                            maxPrice: maxPrice * weight,
                        }
                        dataTrash.push(trash);
                    }
                    counterChecked++;
                } else {
                    dataTrash = dataTrash.filter(item => item.id !== trashId);
                }
            });
            if (isTimeToCloseModal) {
                document.getElementById('modal_' + trashCategoryId).close();
            }
            createTableTransactionList(dataTrash);
        }

        const createTableTransactionList = array => {
            if (array.length < 1) {
                $("#container_list").slideUp(200);
                return
            }
            let tempElement = ``;
            let counter = 0;
            let totalBerat = 0;
            let totalMinPrice = 0;
            let TotalMaxPrice = 0;
            array.forEach(val => {
                tempElement += `<tr>
                      <td>${val.name.toUpperCase()}</td>
                      <td class="text-center"><span class="text-xs bg-blue-100  border border-blue-500 text-blue-500 p-1 px-3 rounded-lg">${val.weight} Kg</span></td>
                      <td class="text-center"><span class="text-xs bg-red-100  border border-red-500 text-red-500 p-1 px-3 rounded-lg">Rp ${convertToRupiah(val.minPrice)}</span> - <span class="text-xs bg-green-100 border border-green-500 text-green-500 p-1 px-3 rounded-lg"> Rp${convertToRupiah(val.maxPrice)}</span></td>
                      <td>
                            <button onclick="deleteDataArrayById(${parseInt(val.id)})" class="p-2 rounded-lg bg-red-100 text-red-500">
                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                            </button>
                      </td>
                    </tr>`
                totalBerat += val.weight;
                totalMinPrice += val.minPrice;
                TotalMaxPrice += val.maxPrice;
            });
            tempElement += `
            <tr class="bg-zinc-100 rounded-xl">
                <td>Total </td>
                <td class="text-center"><span class="text-xs bg-blue-100  border border-blue-500 text-blue-500 p-1 px-3 rounded-lg">${totalBerat} Kg</span></td>
                <td class="text-center"><span class="text-xs bg-red-100  border border-red-500 text-red-500 p-1 px-3 rounded-lg">Rp ${convertToRupiah(totalMinPrice)}</span> - <span class="text-xs bg-green-100 border border-green-500 text-green-500 p-1 px-3 rounded-lg"> Rp${convertToRupiah(TotalMaxPrice)}</span></td>
                <td onclick="deleteAllData();"><button class="font-semibold text-xs text-red-500">Hapus Semua</button></td>
            </tr>`
            $("#body_table_list").html(tempElement);
            $("#container_list").slideDown(200);
        }

        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return rupiah.split('', rupiah.length - 1).reverse().join('');
        }

        const deleteDataArrayById = (id) => {
            dataTrash = dataTrash.filter(item => item.id != id);
            createTableTransactionList(dataTrash);
            $("#checked_trash" + id).prop("checked", false);
            $("#container_predict_weight_" + id).slideUp(200);
            $("#input_weight_" + id).val(0);
        }

        const deleteAllData = () => {
            dataTrash = [];
            $('input[type="checkbox"]').each(function() {
                $(this).prop("checked", false);
                let trashId = $(this).attr("data-trash-id");
                $("#container_predict_weight_" + trashId).slideUp(200);
                $("#input_weight_" + trashId).val(0);
            });
            createTableTransactionList(dataTrash);
        }

        const submitData = (self) => {
            if (!dataTrash.length) {
                vt.warn(`Maaf silahkan tambahkan jenis sampah yang ingin Anda serahkan...`, {
                    title: "Peringatan",
                    position: "top-right",
                    // position: toastPosition.TopCenter,
                    duration: 4000,
                    closable: false,
                    focusable: false,
                    callback: undefined
                })
                return
            }

            let files = pond.getFiles();
            if (!files.length) {
                vt.warn(`Maaf silahkan upload minimal 1 gambar sampah yang ingin diserahkan...`, {
                    title: "Peringatan",
                    position: "top-right",
                    // position: toastPosition.TopCenter,
                    duration: 4000,
                    closable: false,
                    focusable: false,
                    callback: undefined
                })
                return
            }

            let dataForm = new FormData();
            dataForm.append("trashes", JSON.stringify(dataTrash));
            dataForm.append("_token", "{{ csrf_token() }}")
            for (let i = 0; i < files.length; i++) {
                let file = files[i].file
                dataForm.append("image_" + i, file)
            }


            $.ajax({
                url: '{{ route('account.services.post') }}',
                type: "POST",
                contentType: false, // Tidak mengatur header konten
                processData: false, // Tidak memproses data
                async: true,
                dataType: "json",
                beforeSend: function() {
                    $(self).html(`<span class="loading loading-spinner loading-md"></span>`);
                },
                data: dataForm,
                success: function(res) {
                    // vt.success(res.message, {
                    //     title: "Pesan!",
                    //     position: "top-right",
                    //     // position: toastPosition.TopCenter,
                    //     duration: 4000,
                    //     closable: false,
                    //     focusable: false,
                    //     callback: undefined
                    // })
                    setTimeout(() => {
                        window.location.href = "{{ route('account.services.next.index') }}";
                    }, 2000);
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
@endsection
