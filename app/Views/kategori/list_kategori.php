    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Kategori</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="<?php echo base_url("tambah-kategori")?>" type="button" class="btn btn-primary ">Tambah</a>
          </div>
        </div>
      </div>

      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($kategori as $aKategori){?>
            <tr>
                <td><?=$aKategori->nama_kategori?></td>
                <td>
                <a href="<?php echo base_url("edit-kategori/".$aKategori->kode_kategori)?>"class="btn btn-sm btn-info">Edit</a>
                <a href="<?php echo base_url("delete-kategori/".$aKategori->kode_kategori)?>" class="btn btn-sm btn-danger">delete</a>
                </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="./public/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="./public/bootstrap-examples/dashboard/dashboard.js"></script></body>
</html>
