<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 20px; margin-bottom:330px;">
    <div class="col-md-7 col-lg-8" style="margin-left: 10px;">
        <div class="judul" style="display:flex;">
            <a href="<?= base_url('order') ?>" class="btn btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                </svg>
            </a>
            <h4 class="mb-3">Edit</h4>
        </div>
        <form class="needs-validation" method="POST" action="<?= base_url(uri_string()) ?>" enctype="multipart/form-data" novalidate>
        <?= csrf_field() ?>
            <div class="col-sm-12">
                <label for="statusOrder" class="form-label">Status Order</label>
                <select class="form-select" id="statusOrder" name="status_pesanan" required>
                    <option value="" disabled selected><?= $pemesanan->status_pesanan ?></option>
                    <option value="Bayar terlebih dahulu" <?= $pemesanan->status_pesanan == 'Bayar terlebih dahulu' ? 'selected' : '' ?>>Bayar terlebih dahulu</option>
                    <option value="Validasi pembayaran" <?= $pemesanan->status_pesanan == 'Validasi pembayaran' ? 'selected' : '' ?>>Validasi pembayaran</option>
                    <option value="Sedang disiapkan" <?= $pemesanan->status_pesanan == 'Sedang disiapkan' ? 'selected' : '' ?>>Sedang disiapkan</option>
                    <option value="Menunggu pengiriman" <?= $pemesanan->status_pesanan == 'Menunggu pengiriman' ? 'selected' : '' ?>>Menunggu pengiriman</option>
                    <option value="Sedang diperjalanan" <?= $pemesanan->status_pesanan == 'Sedang diperjalanan' ? 'selected' : '' ?>>Sedang diperjalanan</option>
                    <option value="Ada kendala" <?= $pemesanan->status_pesanan == 'Ada kendala' ? 'selected' : '' ?>>Ada kendala</option>
                    <option value="Telah sampai" <?= $pemesanan->status_pesanan == 'Telah sampai' ? 'selected' : '' ?>>Telah sampai</option>
                </select>
                <div class="invalid-feedback">
                    Status pemesanan harus dipilih.
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top:10px;">Submit</button>
            </div>
        </form>
    </div>
</main>
