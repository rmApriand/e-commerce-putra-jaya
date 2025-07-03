<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 70px; margin-bottom:270px;">
    <div class="col-md-7 col-lg-8" style="border:2px; ">
        <h4 class="mb-3" style="text-align:center; margin-top:30px;">Tambah Keranjang</h4>

        <form class="needs-validation" method="POST" action="<?php echo base_url().urI_string()?>" enctype="multipart/form-data" novalidate>
        <?= csrf_field() ?>
          <div class="row g-3">

            <div class="col-sm-12">
                <label for="jumlahOrder" class="form-label">Jumlah Order</label>
                <input type="number" class="form-control" id="jumlahOrder" placeholder="" value="1" name="jumlah_order" min="1" max="<?= isset($selectedBarang) ? $selectedBarang->stok_barang : '' ?>" required>
                <div class="invalid-feedback">
                    Jumlah order required.
                </div>
            </div>
            
            <br>
            <div class="col-sm-12">
                <label for="barang" class="form-label">Barang</label>
                <input type="text" class="form-control" id="barang" value="<?= isset($selectedBarang) ? $selectedBarang->nama_barang : '' ?>" readonly>
                <input type="hidden" name="kode_barang" value="<?= isset($selectedBarang) ? $selectedBarang->kode_barang : '' ?>">
                <div class="invalid-feedback">
                    Nama barang harus dipilih.
                </div>
            </div>
        </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
        </form>
      </div>
</main>

