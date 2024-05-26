@extends('app.template.master_landingpage')

@section('title')
    List Transaction
@endsection

@section('css')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="my-10 w-full flex flex-row items-center justify-center">
        <div class="w-full px-4 md:w-3/4 flex md:flex-row flex-col">
            <div class="m-1 w-full md:w-1/3">
                <div class="border border-slate-300 rounded-xl shadow p-4">
                    <div class="stats stats-vertical shadow w-full">
                        <div class="stat flex justify-center flex-col items-center">
                            <div class="stat-title">Total Transaksi</div>
                            <div class="stat-value">{{ count($all_transactions) }}</div>
                            <div class="stat-desc">Transaksi</div>
                        </div>

                        <div class="stat flex justify-center flex-col items-center">
                            <div class="stat-title">Total Transaksi Selesai</div>
                            <div class="stat-value">{{ count($finished_transactions) }}</div>
                            <div class="stat-desc">Transaksi</div>
                        </div>

                        <div class="stat flex justify-center flex-col items-center">
                            <div class="stat-title">Total Pendapatan</div>
                            <div class="stat-value">0</div>
                            <div class="stat-desc">Rupiah</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-1 w-full md:w-2/3 border border-slate-300 rounded-xl shadow p-4">
                <div class="flex p-3">
                    <label class="input input-bordered flex items-center w-1/2 mr-2">
                        <input onchange="searchOrderNumber(this);" type="text" class="grow"
                            placeholder="Masukan kode transaction..." />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </label>`
                    <div class="flex flex-col w-1/2 ml-2">
                        <label class="text-xs text-gray-400" for="datepicker">Pilih Tanggal Transaksi</label>
                        <input onchange="changeOrderDate(this)" class="datepicker w-full text-right text-xs" id="datepicker"
                            type="text">
                    </div>
                </div>
                <div class="status flex gap-2 px-1 md:px-4 my-2">
                    <div class="flex items-center">
                        <p class="ml-1 mr-2 text-sm">Status</p>
                        <div class="flex flex-wrap gap-2" id="changeStatusContainer">
                            <button onclick="changeStatusOrder(this, '*')"
                                class="text-[12px] md:text-md border font-bold border-blue-500 bg-blue-50 rounded-xl text-blue-500 p-2 px-4 text-sm">Semua</button>
                            <button onclick="changeStatusOrder(this, 'PENDING')"
                                class="text-[12px] md:text-md border border-gray-500 bg-gray-50 rounded-xl text-gray-500 p-2 px-4 text-sm">Diproses</button>
                            <button onclick="changeStatusOrder(this, 'PICKUP')"
                                class="text-[12px] md:text-md border border-gray-500 bg-gray-50 rounded-xl text-gray-500 p-2 px-4 text-sm">Dijemput</button>
                            <button onclick="changeStatusOrder(this, 'FINISHED')"
                                class="text-[12px] md:text-md border border-gray-500 bg-gray-50 rounded-xl text-gray-500 p-2 px-4 text-sm">Selesai</button>
                            <button onclick="changeStatusOrder(this, 'PAID')"
                                class="text-[12px] md:text-md border border-gray-500 bg-gray-50 rounded-xl text-gray-500 p-2 px-4 text-sm">Dibayar</button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col my-4">
                    <div class="w-full px-4" id="listTransaction">
                        {{-- <div class="flex gap-2">
                            <div class="skeleton w-3/4 h-52"></div>
                            <div class="skeleton w-1/4 h-52"></div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>

    <script>
        $('.datepicker').datepicker({
            format: 'dd mmmm yyyy', // Change the format here
        });

        let date, orderNumber, statusTransaction;

        const getDatatable = async (query) => {
            let loading = `<div class="flex flex-col">
                                <div class="flex gap-2 my-2">
                                    <div class="skeleton w-full md:w-3/4 h-52"></div>
                                    <div class="skeleton hidden md:block md:w-1/4 h-52"></div>
                                </div>
                                <div class="flex gap-2 my-2">
                                    <div class="skeleton w-full md:w-3/4 h-52"></div>
                                    <div class="skeleton hidden md:block md:w-1/4 h-52"></div>
                                </div>
                            </div>`;
            $("#listTransaction").html(loading);
            setTimeout(async () => {
                await fetch(`{{ route('account.transaction.list.json') }}?${query}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        $("#listTransaction").html(data.data);
                    })
                    .catch(error => {
                        console.error("Fetch error:", error);
                    });
            }, 1000);
        }

        getDatatable();

        const changeOrderDate = (self) => {
            date = $(self).val();
            getDatatable(`order_date=${date ?? ''}&order_number=${orderNumber ?? ''}&status=${statusTransaction}`);
        }

        const searchOrderNumber = (self) => {
            orderNumber = $(self).val();
            getDatatable(`order_date=${date ?? ''}&order_number=${orderNumber ?? ''}&status=${statusTransaction}`);
        }

        const changeStatusOrder = (self, val) => {
            statusTransaction = val;
            $("#changeStatusContainer .border-blue-500")
                .removeClass("border-blue-500 bg-blue-50 font-bold text-blue-500")
                .addClass("border-gray-500 bg-gray-50 text-gray-500");

            $(self).removeClass("border-gray-500 bg-gray-50 text-gray-500")
                .addClass("border-blue-500 bg-blue-50 font-bold text-blue-500");

            getDatatable(`order_date=${date ?? ''}&order_number=${orderNumber ?? ''}&status_transaction=${statusTransaction}`);
        }
    </script>
@endsection
