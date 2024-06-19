@foreach ($datas as $data)
    @php
        $badge = '';
        if ($data->status_transaction == 'PENDING') {
            $badge = '<div class="badge text-xs badge-primary">diproses</div>';
        } elseif ($data->status_transaction == 'PICKUP') {
            $badge = '<div class="badge text-xs badge-neutral">dijemput</div>';
        } elseif ($data->status_transaction == 'FINISHED' && $data->is_paid) {
            $badge = '<div class="badge text-xs badge-success text-white">dibayar</div>';
        } else {
            $badge = '<div class="badge text-xs badge-ghost">selesai</div>';
        }
    @endphp
    <div class="card card-compact w-full bg-base-100 shadow-xl border border-gray-300 shadow mb-3">
        <div class="card-body">
            <div class="flex md:flex-row flex-col gap-2 items-center text-xs font-light text-gray-500">
                <span class="text-xs font-semibold">{{ date('d F Y H:i', strtotime($data->created_at)) }} </span>
                {!! $badge !!}
                <span class="">{{ $data->order_number }} </span>
                <p class="font-bold"><span class="font-light hidden md:inline-block	">|</span> Tanggal dijemput:
                    <span>{{ $data->order_date }}
                        {{ $data->range_time }}</span>
                </p>
            </div>
            <div class="my-4">
                <div class="flex flex-col w-full lg:flex-row">
                    <div class="grid w-full md:w-3/4">
                        <div class="flex flex-col">
                            @foreach ($data->detail as $detail)
                                <div class="flex justify-between my-1">
                                    <div class="flex flex-col">
                                        <p class="text-sm text-primary uppercase font-semibold">
                                            {{ $detail['trash']['name'] }}</p>
                                        <p class="text-[10px] font-bold my-2">
                                            <span
                                                class="border border-red-500 p-1 px-2 rounded-lg bg-red-100 text-red-500">Rp.{{ number_format($detail['trash']['minimum_price'], 0, '.', '.') }}
                                            </span>
                                            <span class="mx-1">s.d</span>
                                            <span
                                                class="border border-green-500 p-1 px-2 rounded-lg bg-green-100 text-green-500">Rp.1.500
                                            </span>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-xs font-normal">Berat: {{ $detail['final_weight_kg'] == 0 ? $detail['weight_kg'] : $detail['final_weight_kg'] }} kg</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div tabindex="0" class="collapse collapse-arrow border border-base-200 bg-base-500">
                            <div class="collapse-title text-xl font-medium">
                                <p class="text-xs mt-2 mb-4">List Dokumentasi: </p>
                            </div>
                            <div class="collapse-content">
                                <div class="flex gap-1">
                                    @foreach ($data->assets as $asset)
                                        <img class="w-1/3" src="{{ asset($asset['path_image']) }}" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider lg:divider-horizontal"></div>
                    <div class="grid flex-grow h-32 rounded-box place-items-center">
                        @if ($data->status_transaction == 'FINISHED' || $data->status_transaction == 'PAID')
                            <div class="text-center flex flex-col items-center">
                                <p class="text-xs font-semibold">Total Berat</p>
                                <p class="bg-base-300 text-xs rounded my-1 px-3 p-1 rounded">
                                    {{ $data->final_weight_kg }}kg
                            </div>
                            <div class="text-center flex flex-col items-center">
                                <p class="text-xs font-semibold">Total Harga</p>
                                <p class="bg-base-300 text-xs rounded my-1 px-3 p-1 rounded">
                                    Rp{{ number_format($data->final_amount, 0, '.', '.') }}</p>
                            </div>
                        @else
                            <div class="text-center flex flex-col items-center">
                                <p class="text-xs font-semibold">Estimasi Total Berat</p>
                                <p class="bg-base-300 text-xs rounded my-1 px-3 p-1 rounded">
                                    {{ $data->weight_kg }}kg
                            </div>
                            <div class="text-center flex flex-col items-center">
                                <p class="text-xs font-semibold">Estimasi Minimum Harga</p>
                                <p class="bg-base-300 text-xs rounded my-1 px-3 p-1 rounded">
                                    Rp{{ number_format($data->estimate_amount_minimum, 0, '.', '.') }}</p>
                            </div>
                            <div class="text-center flex flex-col items-center">
                                <p class="text-xs font-semibold">Estimasi Maksimum Harga</p>
                                <p class="bg-base-300 text-xs rounded my-1 px-3 p-1 rounded">
                                    Rp{{ number_format($data->estimate_amount_maximum, 0, '.', '.') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- <div class="card-actions justify-end">
                <button class="btn btn-md btn-primary">Buy Now</button>
            </div> --}}
        </div>
    </div>
@endforeach
