    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"  style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-7 col-lg-8">
      <div class="judul" style="display: flex;" style="margin-bottom:10px">
        <a href="<?=base_url('barang')?>" class="btn btn-sm" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
          </svg>
        </a>
        <h4 class="mb-3">Edit Barang</h4>
      </div>
        <form class="needs-validation" method="post" action="<?php echo base_url().urI_string()?>" novalidate>
        <?= csrf_field() ?>
          <div class="row g-3">
          <!-- <div class="col-sm-12">
            <label for="gambarBarang" class="form-label">Gambar Barang</label>
            <br>
            <img src="<?= base_url('./asset/'.$barang->gambar_barang) ?>" alt="Gambar Barang" style="max-width: 100px; max-height: 100px;">
            <input type="file" class="form-control" id="gambarBarang" name="gambar_barang">
            <div class="invalid-feedback">
              Gambar required.
            </div>
            <input type="hidden" name="existing_gambar_barang" value="<?=$barang->gambar_barang?>">
          </div> -->

            <div class="col-sm-12">
              <label for="kodeBarang" class="form-label">Kode Barang</label>
              <input type="text" class="form-control" id="kodeBarang" placeholder="" value="<?=$barang->kode_barang?>" name="kode_barang" required>
              <div class="invalid-feedback">
                Kode required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="namaBarang" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="namaBarang" placeholder="" value="<?=$barang->nama_barang?>" name="nama_barang" required>
              <div class="invalid-feedback">
                Nama Barang required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="desc_barang" class="form-label">Deskripsi Barang</label>
              <input type="text" class="form-control" id="desc_barang" placeholder="" value="<?=$barang->desc_barang?>" name="desc_barang" required>
              <div class="invalid-feedback">
                Deskripsi required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="stok_barang" class="form-label">Stok Barang</label>
              <input type="text" class="form-control" id="stok_barang" placeholder="" value="<?=$barang->stok_barang?>" name="stok_barang" required>
              <div class="invalid-feedback">
                Stok required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="harga_barang" class="form-label">Harga Barang</label>
              <input type="text" class="form-control" id="harga_barang" placeholder="" value="<?=$barang->harga_barang?>" name="harga_barang" required>
              <div class="invalid-feedback">
                Harga required.
              </div>
            </div>

            <div class="col-sm-12">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kode_kategori" required>
                <option value="">Pilih Program Studi</option>
                <?php foreach ($kategoriList as $bkategori) : ?>
                    <option value="<?= $bkategori->kode_kategori ?>" <?= ($barang->kode_kategori == $bkategori->kode_kategori) ? 'selected' : '' ?>><?= $bkategori->nama_kategori ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
                Program Studi harus dipilih.
            </div>
          </div>
            
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
        </form>
      </div>
    </main>