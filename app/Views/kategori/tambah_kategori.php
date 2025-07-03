
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="col-md-7 col-lg-8">
        <div class="judul" style="display: flex;">
            <a href="<?= base_url('kategori') ?>" class="btn btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                </svg>
            </a>
            <h4 class="mb-3">Tambah Kategori</h4>
        </div>
        <form class="needs-validation" method="POST" action="<?php echo base_url().urI_string()?>" novalidate>
        <?= csrf_field() ?>
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="kategori" class="form-label">Nama Kategori</label>
              <input type="text" class="form-control" id="kategori" placeholder="" value="" name="nama_kategori" required>
              <div class="invalid-feedback">
                Valid kategori name is required.
              </div>
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
        </form>
      </div>
    </main>