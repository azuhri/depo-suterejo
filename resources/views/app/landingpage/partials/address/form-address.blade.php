<div id="container_map" class="my-2">
    <input type="hidden" id="address_id">
    <div id="map" class="maps border-2 min-h-[300px] border-slate-500 rounded-lg w-full">
    </div>
    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">
    <button id="showMapButton" onclick="showMap(this);"
        class="p-3 my-2 w-full px-4 bg-primary text-white rounded-lg font-bold text-xs">
        Tambahkan Pinpoint Alamat Anda
    </button>
    <button id="closeMapButton" style="display: none" onclick="closeMap(this);"
        class="p-3 my-2 px-4 bg-primary text-white rounded-lg font-bold text-xs">
        Batalkan Pinpoint
    </button>
</div>
<div class="my-2">
    <div class="flex flex-col my-3">
        <label class="text-slate-600 text-sm font-semibold">Label Alamat</label>
        <input type="text" id="label_address" placeholder="Masukan label alamat..."
            class="mt-2 w-full border p-3 rounded-lg bg-transparent">
    </div>
    <div class="flex flex-col my-3">
        <label class="text-slate-600 text-sm font-semibold">
            Detail Alamat
        </label>
        <textarea class="mt-2 w-full border p-3 rounded-lg bg-transparent" name="detail_address" id="detail_address"
            cols="20" rows="5"></textarea>
    </div>
    <div class="flex flex-col my-3">
        <label class="text-slate-600 text-sm font-semibold">
            Catatan
        </label>
        <textarea class="mt-2 w-full border p-3 rounded-lg bg-transparent" name="notes_address" id="notes_address"
            cols="20" rows="5"></textarea>
    </div>
    <button id="buttonSubmitAddress" onclick="createNewAddress(this);" data-location="false"
        class="p-4 my-2 w-full px-4 bg-primary text-white rounded-lg font-bold text-xs">
        Simpan
    </button>
</div>