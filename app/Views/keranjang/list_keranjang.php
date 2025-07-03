<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 70px; margin-bottom: 440px;">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="fw-light" style="margin-left: -290px;">Keranjang</h1>
    </div>
    <div class="table-responsive small" style="background-color: white; border: 1px solid #ccc; margin-left: -205px; border-radius: 5px; width:1260px;">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Jumlah Order</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Gambar Barang</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Action</th>               
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor = 1;
                $total_harga_akhir = 0;           
                foreach($keranjang as $aKeranjang) { 
                    $total_harga_akhir += $aKeranjang->total_harga;
                ?>
                    <tr>
                        <td><?=$nomor?></td>
                        <td><?=$aKeranjang->jumlah_order?></td>
                        <td><?=$aKeranjang->nama_barang?></td> 
                        <td><img src="<?= base_url('./asset/'.$aKeranjang->gambar_barang) ?>" alt="Gambar Barang" style="max-width: 100px; max-height: 100px;"></td> 
                        <td>Rp. <?= number_format($aKeranjang->harga_barang, 0, ',', '.') ?></td>
                        <td>Rp. <?= number_format($aKeranjang->total_harga, 0, ',', '.') ?></td>
                        <td>
                            <a href="<?= base_url("edit-keranjang/".$aKeranjang->kode_keranjang) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit" style="margin-right: 5px;"></i>edit jumlah</a>
                            <a href="<?= base_url("delete-keranjang/".$aKeranjang->kode_keranjang) ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt" style="margin-right: 5px;"></i>cancel</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end" style="margin-top:10px; margin-right:10px; ">
            <h5>Total Harga: Rp. <?= number_format($total_harga_akhir, 0, ',', '.') ?></h5>
        </div>
        <div class="d-flex justify-content-end" style="margin-bottom:10px; margin-right:10px; ">
            <a href="<?= base_url("tambah-pemesanan") ?>" class="btn btn-danger"><i class="fas fa-check" style="margin-right: 5px;"></i>Check Out</a>
        </div>
    </div>
</main>
