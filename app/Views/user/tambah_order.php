<hr>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="col-md-7 col-lg-8" style="background-color: white; border: 1px solid #ccc; margin-top: 80px; margin-left:60px; padding: 30px; border-radius: 5px;">
        <h4 class="mb-3"><center>Tambah Order</center></h4>
        <br>
        <form class="needs-validation" method="POST" action="<?php echo base_url().urI_string()?>" enctype="multipart/form-data" novalidate>
        <?= csrf_field() ?>
          <div class="row g-3">

            <div class="col-sm-12">
              <label for="nama_user" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_user" placeholder="" value="" name="nama_user" required>
              <div class="invalid-feedback">
                Harga required.
              </div>
            </div>

            <div class="col-sm-12">
                <label for="jumlahOrder" class="form-label">Jumlah Order</label>
                <input type="number" class="form-control" id="jumlahOrder" placeholder="" value="1" name="jumlah_order" min="1" max="<?= isset($selectedBarang) ? $selectedBarang->stok_barang : '' ?>" required>
                <div class="invalid-feedback">
                    Jumlah order required.
                </div>
            </div>


            <div class="col-sm-12">
                <label for="barang" class="form-label">Barang</label>
                <input type="text" class="form-control" id="barang" value="<?= isset($selectedBarang) ? $selectedBarang->nama_barang : '' ?>" readonly>
                <input type="hidden" name="kode_barang" value="<?= isset($selectedBarang) ? $selectedBarang->kode_barang : '' ?>">
                <div class="invalid-feedback">
                    Nama barang harus dipilih.
                </div>
            </div>

            <div class="col-sm-12">
                <label for="jenisPembayaran" class="form-label">Jenis Pembayaran</label>
                <select class="form-select" id="jenisPembayaran" name="id_pembayaran" required>
                    <option value="">Pilih Jenis Pembayaran</option>
                    <?php foreach ($pembayaranList as $bpembayaran) : ?>
                        <option value="<?= $bpembayaran->id_pembayaran ?>"><?= $bpembayaran->nama_pembayaran ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    jenis pembayaran harus dipilih.
                </div>
            </div>

            <br>
            <div class="col-sm-12">
              <label for="buktiPembayaran" class="form-label">Bukti Pembayaran (jika memilih cash silahkan foto uangnya)</label>
              <input type="file" class="form-control" id="buktiPembayaran" name="bukti_pembayaran" required>
              <div class="invalid-feedback">
                Gambar required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="alamat_user" class="form-label">Alamat Jelasnya</label>
              <input type="text" class="form-control" id="alamat_user" placeholder="" value="" name="alamat_user" required>
              <div class="invalid-feedback">
                Harga required.
              </div>
            </div>
            </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Buat Pesanan</button>
        </form>
      </div>
    </main>
<br>