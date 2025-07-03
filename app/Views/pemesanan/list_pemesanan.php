<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 70px; margin-bottom: 440px;">
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="fw-light" style="margin-left: -290px;">Pemesanan</h1>
    </div>

    <?php 
    $total_harga_akhir = 0;

    foreach ($groupedPemesanan as $id_user => $pemesananByDateTime): 
        foreach ($pemesananByDateTime as $tanggal_pemesanan => $pemesananList): 
            $nomor = 1;
            $sub_total_harga = 0;
            // Ambil bukti pembayaran dari item pertama dalam daftar pemesanan
            $bukti_pembayaran = $pemesananList[0]->bukti_pembayaran;
            $isFirstRow = true;
    ?>
            <div class="table-responsive small" style="background-color: white; border: 1px solid #ccc; margin-left: -225px; border-radius: 5px; margin-bottom: 40px;">
                <h5 class="text-center" style="margin-top:5px; margin-bottom:20px;">Tanggal Pemesanan: <?= date('d-m-Y H:i:s', strtotime($tanggal_pemesanan)) ?></h5>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <!-- <th scope="col">No</th> -->
                            <!-- <th scope="col">Kode Pesanan</th> -->
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Alamat Pemesan</th>
                            <th scope="col">Status Pesanan</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Gambar Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>               
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemesananList as $apemesanan): 
                            $sub_total_harga += $apemesanan->total_harga;
                            $total_harga_akhir += $apemesanan->total_harga;
                        ?>
                            <tr>
                                <!-- <td><?=$nomor?></td> -->
                                <!-- <td><?= $isFirstRow ? $apemesanan->kode_pesanan : '' ?></td> -->
                                <td><?= $isFirstRow ? $apemesanan->nama_user : '' ?></td>
                                <td><?= $isFirstRow ? $apemesanan->alamat_user : '' ?></td>
                                <td><?= $isFirstRow ? $apemesanan->status_pesanan : '' ?></td>
                                <td><?= $isFirstRow ? $apemesanan->nama_pembayaran : ''?></td>
                                <td><?=$apemesanan->nama_barang?></td> 
                                <td><img src="<?= base_url('./asset/'.$apemesanan->gambar_barang) ?>" alt="Gambar Barang" style="max-width: 100px; max-height: 100px;"></td> 
                                <td>Rp. <?= number_format($apemesanan->total_harga, 0, ',', '.') ?></td>
                                <td>
                                    <?php if ($isFirstRow): ?>
                                        <div class="d-flex flex-column">
                                            <a href="<?php echo base_url("edit-pemesanan/".$apemesanan->kode_pesanan)?>" class="btn btn-sm btn-info mb-1">Bayar</a>
                                            <a href="<?= base_url("delete-pemesanan/".$apemesanan->kode_pesanan) ?>" class="btn btn-sm btn-danger">Cancel</a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $isFirstRow = false; $nomor++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center" style="margin-top:10px; margin-right:10px; margin-left:10px; margin-bottom:10px;">
                    <div class="text-center">
                        <h5>Bukti Pembayaran:</h5>
                        <img src="<?= base_url('./bukti/'.$bukti_pembayaran) ?>" alt="Belum dibayar/sampai" style="max-width: 100px; max-height: 100px;">
                    </div>
                    <div>
                        <h5>Sub Total Harga: Rp. <?= number_format($sub_total_harga, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</main>
