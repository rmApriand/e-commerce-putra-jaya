<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 70px;">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="fw-light" style="margin-left: -290px;">Riwayat Order</h1>
    </div>
    <div class="table-responsive small" style="background-color: white; border: 1px solid #ccc; margin-left: -225px; border-radius: 5px;">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Jumlah Order</th>
                    <th scope="col">Jenis Pembayaran</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Gambar Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Status Pesanan</th>
                    <th scope="col">Action</th>                </tr>
            </thead>
            <tbody>
            <?php 
            $nomor = 1;            
            foreach($order as $aOrder){ ?>
                <tr>
                    <td><?=$nomor?></td>
                    <td><?=$aOrder->jumlah_order?></td>
                    <td><?=$aOrder->nama_pembayaran?></td>
                    <td><img src="<?= base_url('./bukti/'.$aOrder->bukti_pembayaran) ?>" alt="Gambar Order" style="max-width: 100px; max-height: 100px;"></td>
                    <td><img src="<?= base_url('./asset/'.$aOrder->gambar_barang) ?>" alt="Gambar Barang" style="max-width: 100px; max-height: 100px;"></td>
                    <td><?=$aOrder->nama_barang?></td>
                    <td>Rp. <?= number_format($aOrder->harga_barang, 0, ',', '.') ?></td>
                    <td>Rp. <?= number_format($aOrder->total_harga, 0, ',', '.') ?></td>  
                    <td>                        <a class="btn btn-sm btn-info"><?=$aOrder->status_order?></a>
                    </td>
                    <td>
                        <a href="<?php echo base_url("delete-order-user/".$aOrder->kode_order)?>" class="btn btn-sm btn-danger">cancel    </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

            
