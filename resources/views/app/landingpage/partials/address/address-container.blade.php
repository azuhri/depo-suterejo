<div class="flex items-center mb-2">
    <input type="hidden" id="default_address_id" value="{{$data->id}}">
    <p class="text-xs flex">
        <span
            class="font-normal items-center flex p-1 px-3 bg-blue-400 text-xs text-white rounded-full">
            {{ $data->title }}
        </span>
        @if ($data->longitude)
            <span
                class="flex items-center mx-2 p-2 px-3 bg-gray-500 text-white rounded-full font-normal">
                <svg class="mr-1" viewBox="0 0 24 24" width="15" height="15"
                    stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                Telah Di Pinpoint
            </span>
        @endif
    </p>
</div>
<div class="my-4">
    <p class="text-sm text-gray-500 font-semibold">
        {{ $data->detail_address }}
    </p>
    <p class="{{ !$data->notes ? 'hidden' : '' }} text-xs mt-2 font-normal italic">
        Note: {{$data->notes}}</p>
    <button onclick="modal_address.showModal();"
        class="mt-4 text-xs p-2 px-3 rounded-full bg-primary text-white font-normal"
        type="button">
        <span>Ganti Alamat</span>
    </button>
</div>