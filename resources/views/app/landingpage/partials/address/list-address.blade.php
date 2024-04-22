<div id="list_address_{{ $data->id }}"
    class="relative px-4 my-3 py-6 shadow cursor-pointer {{ $data->status ? 'border-blue-600 bg-blue-50 text-blue-600' : 'hover:bg-gray-100' }} border rounded-lg">
    <div class="flex items-center">
        <p class="font-bold text-gray-500 text-sm">
            {{ $data->title }}
        </p>
        @if ($data->status)
            <div class="ml-2 p-1 px-3 bg-slate-400 text-white rounded-full text-xs font-semibold">
                Utama
            </div>
        @endif
    </div>
    <div class="my-2 text-sm font-normal text-justify">
        {{ $data->detail_address }}

    </div>
    <p class="text-xs mb-6 font-ligt italic font-bold">(Note: {{ $data->notes }})</p>
    @if ($data->longitude)
        <div class="my-4 mb-6 flex font-bold items-center text-xs">
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <span class="ml-1">Sudah Di Pinpoint</span>
        </div>
    @endif
    <div class="flex absolute bottom-3 right-5 text-xs justify-end w-full">
        <button class="mx-1" onclick="openModalEditAddress({{ json_encode($data) }});">Ubah</button>
        @if (!$data->status)
            <button class="mx-1" onclick="deleteAddress({{ $data->id }}, '{{ $data->title }}')">Hapus</button>
            <button class="mx-1" onclick="selectAddress(this, {{ $data->id }})">Pilih</button>
        @endif
    </div>
</div>
