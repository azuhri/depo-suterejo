<!-- Modal Modal Center-->
<div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutTitle" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary" style="font-weight: bold" id="modalLogoutTitle">Konfirmasi!
                </h5>
                <button type="button" onclick="hideModal('modalLogout')" class="btn-close" data-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center flex-column align-items-center">
                <img class="img-fluid mb-4 w-75" src="{{ asset('admin/img/modals/modal-flightbooking.svg') }}"
                    alt="Flight Booking">
                <h5 class="font-weight-bold text-center text-secondary" style="font-weight: bold">Apakah Anda ingin
                    keluar aplikasi ?</h5>

            </div>
            <div class="modal-footer">
                <button type="button" onclick="hideModal('modalLogout')" class="btn btn-secondary"
                    data-dismiss="modal">BATAL</button>
                <form class="w-full flex" action="{{ route('admin.dashboard.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">IYA</button>
                </form>
            </div>
        </div>
    </div>
</div>