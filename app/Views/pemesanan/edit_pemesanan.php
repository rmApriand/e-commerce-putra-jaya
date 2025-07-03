<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px; margin-bottom:330px;">
    <div class="col-md-7 col-lg-8" style="margin-left: 60px;">
        <div class="judul" style="display:flex;">
            <a href="<?= base_url('pemesanan') ?>" class="btn btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                </svg>
            </a>
            <h4 class="mb-3">Pembayaran</h4>
        </div>
        <form class="needs-validation" method="POST" action="<?= base_url(uri_string()) ?>" enctype="multipart/form-data" novalidate>
        <?= csrf_field() ?>
            <div class="mb-3">
                <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
            </div>
            <button type="submit" class="btn btn-primary" style="">Submit</button>
        </form>
    </div>
</main>