    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-7 col-lg-8">
    <div class="judul" style="display: flex;" style="margin-bottom:10px">
        <a href="<?=base_url('barang')?>" class="btn btn-sm" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
          </svg>
        </a>
        <h4 class="mb-3">Edit User</h4>
      </div>
        <form class="needs-validation" method="post" action="<?php echo base_url().urI_string()?>" novalidate>
        <?= csrf_field() ?>
          <div class="row g-3">

            <div class="col-sm-12">
              <label for="nama_user" class="form-label">Nama User</label>
              <input type="text" class="form-control" id="nama_user" placeholder="" value="<?=$user->nama_user?>" name="nama_user" required>
              <div class="invalid-feedback">
                nama required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="alamat_user" class="form-label">Alamat User</label>
              <input type="text" class="form-control" id="alamat_user" placeholder="" value="<?=$user->alamat_user?>" name="alamat_user" required>
              <div class="invalid-feedback">
                Nama Barang required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="no_hp_user" class="form-label">No Hp User</label>
              <input type="text" class="form-control" id="no_hp_user" placeholder="" value="<?=$user->no_hp_user?>" name="no_hp_user" required>
              <div class="invalid-feedback">
                Deskripsi required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="email_user" class="form-label">Email User</label>
              <input type="text" class="form-control" id="email_user" placeholder="" value="<?=$user->email_user?>" name="email_user" required>
              <div class="invalid-feedback">
                Stok required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="password_user" class="form-label">Password User</label>
              <input type="text" class="form-control" id="password_user" placeholder="" value="<?=$user->password_user?>" name="password_user" required>
              <div class="invalid-feedback">
                password required.
              </div>
            </div>
          </div>
            
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
        </form>
      </div>
    </main>