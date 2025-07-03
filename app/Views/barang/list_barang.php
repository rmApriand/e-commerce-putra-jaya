    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Barang</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="<?php echo base_url("tambah-barang")?>" type="button" class="btn btn-primary ">Tambah</a>
          </div>
        </div>
      </div>

      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Gambar Barang</th>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Stok</th>
              <th scope="col">Harga Satuan</th>
              <th scope="col">Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($barang as $aBarang){?>
            <tr>
                <td><img src="<?= base_url('./asset/'.$aBarang->gambar_barang) ?>" alt="Gambar Barang" style="max-width: 100px; max-height: 100px;"></td>
                <td><?=$aBarang->kode_barang?></td>
                <td><?=$aBarang->nama_barang?></td>
                <td><?=$aBarang->desc_barang?></td>
                <td><?=$aBarang->stok_barang?></td>
                <td>Rp. <?=$aBarang->harga_barang?></td>
                <td><?=$aBarang->nama_kategori?></td>
                <td>
                <a href="<?php echo base_url("edit-barang/".$aBarang->kode_barang)?>" class="btn btn-sm btn-info">Edit</a>
                <a href="<?php echo base_url("delete-barang/".$aBarang->kode_barang)?>" class="btn btn-sm btn-danger">delete</a>
                </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </main>

            
