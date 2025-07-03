<main>

    <section class="py-5 text-center container">
    <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">OUR PRODUCT</h1>
            <p class="lead text-body-secondary">Here is a list of products that we provide in our store, please have a look and don't forget to buy.</p>
        <p>
            <a href="<?=base_url("pemesanan")?>" class="btn btn-primary my-2">View order history</a>
            <a href="<?=base_url("beranda")?>" class="btn btn-secondary my-2">About Us</a>
        </p>
    </div>
    </div>
    </section>
    
    <div class="album py-5 bg-body-tertiary">
    <div class="container">
    <!-- Container untuk kategori Sayur -->
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">Obat Rumput</h2>
                    <div class="d-flex flex-row flex-wrap">
                        <?php
                        foreach ($barang as $item) {
                            if ($item->kode_kategori == 1) {
                                echo '<div class="card shadow-sm m-2" style="width: 18rem;">
                                        <img class="card-img-top" src="' . base_url('asset/' . $item->gambar_barang) . '" alt="' . $item->nama_barang . '" style="border: 1px solid #ccc;" />
                                        <div class="card-body">
                                            <p class="card-text">' . $item->nama_barang . ' <b>(' . $item->stok_barang . ')</b></p>
                                            <p class="card-text" style=" font-size:14px;"><i><b>Desc: </b>' . $item->desc_barang .' </i></p>
                                            <p class="card-text"><b>Rp. ' . number_format($item->harga_barang, 0, ',', '.') . '/botol</b></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="' . base_url("tambah-keranjang/".$item->kode_barang) . '" type="button" class="btn btn-sm btn-outline-primary">+ keranjang</a>
                                                </div>
                                                <small class="text-body-secondary">&#9733;&#9733;&#9733;&#9733;&#9733;</small>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container untuk kategori Buah -->
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">Alat dan Bahan Bangunan</h2>
                    <div class="d-flex flex-row flex-wrap">
                        <?php
                        foreach ($barang as $item) {
                            if ($item->kode_kategori == 2) {
                                echo '<div class="card shadow-sm m-2" style="width: 18rem;">
                                        <img class="card-img-top" src="' . base_url('asset/' . $item->gambar_barang) . '" alt="' . $item->nama_barang . '" style="border: 1px solid #ccc;" />
                                        <div class="card-body">
                                            <p class="card-text">' . $item->nama_barang . ' <b>(' . $item->stok_barang . ')</b></p>
                                            <p class="card-text" style=" font-size:14px;"><i><b>Desc: </b>' . $item->desc_barang .' </i></p>
                                            <p class="card-text"><b>Rp. ' . number_format($item->harga_barang, 0, ',', '.') . '/satuan</b></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="' . base_url("tambah-keranjang/".$item->kode_barang) . '" type="button" class="btn btn-sm btn-outline-primary">+ keranjang</a>
                                                </div>
                                                <small class="text-body-secondary">&#9733;&#9733;&#9733;&#9733;&#9733;</small>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container untuk kategori Bumbu Dapur -->
    <!-- <div class="row mb-5">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">Bumbu Dapur</h2>
                    <div class="d-flex flex-row flex-wrap">
                        <?php
                        foreach ($barang as $item) {
                            if ($item->kode_kategori == 4) {
                                echo '<div class="card shadow-sm m-2" style="width: 18rem;">
                                        <img class="card-img-top" src="' . base_url('asset/' . $item->gambar_barang) . '" alt="' . $item->nama_barang . '" style="border: 1px solid #ccc;" />
                                        <div class="card-body">
                                            <p class="card-text">' . $item->nama_barang . ' <b>(' . $item->stok_barang . ')</b></p>
                                            <p class="card-text"><b>Rp. ' . number_format($item->harga_barang, 0, ',', '.') . '/buah</b></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="' . base_url("tambah-keranjang/".$item->kode_barang) . '" type="button" class="btn btn-sm btn-outline-primary">+ keranjang</a>
                                                </div>
                                                <small class="text-body-secondary">&#9733;&#9733;&#9733;&#9733;&#9733;</small>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </div>
    </div>

</main>  