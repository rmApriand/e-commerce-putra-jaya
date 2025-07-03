<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px; margin-bottom:330px;">
    <div class="col-md-7 col-lg-8" style="margin-left: 60px;">
      <div class="judul" style=" display:flex;">
        <a href="<?=base_url('keranjang')?>" class="btn btn-sm" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
          </svg>
        </a>
        <h4 class="mb-3">Edit Jumlah</h4>
      </div>
      <form class="needs-validation" method="POST" action="<?= base_url(uri_string()) ?>" enctype="multipart/form-data" novalidate style="padding:10px; border: 1px solid #000000;">
          <?= csrf_field() ?>
          <div class="row g-3">
            <div class="col-sm-12">
                <label for="jumlahOrder" class="form-label">Jumlah Order</label>
                <input type="number" class="form-control" id="jumlahOrder" placeholder="" value="<?=$keranjang->jumlah_order?>" name="jumlah_order" min="1" max="<?= isset($selectedBarang) ? $selectedBarang->stok_barang : '' ?>" required>
                <div class="invalid-feedback">
                    Jumlah order required.
                </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
        </form>
      </div>
</main>