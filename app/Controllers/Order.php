<?php

namespace App\Controllers;

use App\Models\M_pemesanan;

class Order extends BaseController
{
    protected $mPemesanan;

    public function __construct(){
        $this->mPemesanan = new M_pemesanan();
    }
    
    public function index(): string
    {
        $dataPemesanan = $this->mPemesanan->list_all_admin();
        $groupedPemesanan = [];
        
        foreach ($dataPemesanan as $pemesanan) {
            // Ubah format tanggal menjadi format yang sesuai dengan format tanggal pemesanan Anda
            $tanggal_pemesanan = date('Y-m-d H:i:s', strtotime($pemesanan->tanggal_pemesanan));
            
            // Kelompokkan pemesanan berdasarkan id_user dan tanggal pemesanan
            $groupedPemesanan[$pemesanan->id_user][$tanggal_pemesanan][] = $pemesanan;
        }

        $data["groupedPemesanan"] = $groupedPemesanan;

        return view('template/header')
            .view('order/list_order.php', $data)
            .view('template/footer');
    }

    public function tambah(): string
    {
        if ($this->request->getMethod() == 'post') {
            // Ambil data dari tbl_keranjang
            $keranjanglist = $this->mPemesanan->getKeranjangListAdmin();
            $addedKodeKeranjang = []; // Array asosiatif untuk menyimpan kode_keranjang yang sudah ditambahkan

            // Loop untuk setiap item di keranjang
            foreach ($keranjanglist as $item) {
                // Cek apakah kode_keranjang sudah ada dalam array $addedKodeKeranjang
                if (!array_key_exists($item->kode_keranjang, $addedKodeKeranjang)) {
                    // Cek apakah kode_keranjang sudah ada dalam tabel pemesanan
                    if (!$this->mPemesanan->isKodeKeranjangExist($item->kode_keranjang)) {
                        // Buat array untuk data yang akan dimasukkan ke tbl_pesanan
                        $dataPost = [
                            'kode_pesanan' => $this->request->getVar('kode_pesanan'),
                            'nama_pemesan' => $this->request->getVar('nama_pemesan'),
                            'alamat_pemesan' => $this->request->getVar('alamat_pemesan'),
                            'kode_keranjang' => $item->kode_keranjang,
                            'kode_barang' => $item->kode_barang,
                            'id_pembayaran' => $this->request->getVar('id_pembayaran'),
                            'status_pesanan' => 'Sedang disiapkan penjual',
                            'bukti_pembayaran' => 'Belum dibayar'
                        ];

                        // foreach ($keranjanglist as $item) {
                        //     $gambar = $this->request->getFile('bukti_pembayaran');
                        //     if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                        //         $newName = $gambar->getRandomName();
                        //         $gambar->move(FCPATH . 'bukti', $newName); 
                        //         $dataPost['bukti_pembayaran'] = $newName;
                        //     } else {
                        //         $dataPost['bukti_pembayaran'] = $newName;
                        //     }

                        // Tambahkan data ke tbl_pesanan
                        $tambah = $this->mPemesanan->add($dataPost);

                        // Tandai kode_keranjang sebagai sudah ditambahkan dalam array $addedKodeKeranjang
                        $addedKodeKeranjang[$item->kode_keranjang] = true;
                    }
                }
            }
        }

        $data['keranjanglist'] = $this->mPemesanan->getKeranjangListAdmin();
        $data['baranglist'] = $this->mPemesanan->getBarangList();
        $data['pembayaranlist'] = $this->mPemesanan->getPembayaranList();
        return view('template/header')
            .view('order/tambah_pemesanan.php', $data)
            .view('template/footer');
    }

    public function edit($kdpemesanan): string
    {
        if ($this->request->getMethod() == 'post') {
            // Tangani pengubahan status pesanan
            $dataPost['status_pesanan'] = $this->request->getPost('status_pesanan');
            $this->mPemesanan->updateStatusPesanan($kdpemesanan, $dataPost);
        }
    
        $getData = $this->mPemesanan->getData($kdpemesanan);
        $data["pemesanan"] = $getData;
        return view('template/header')
            .view('order/edit_pemesanan.php', $data)
            .view('template/footer');
    }
    
    public function delete($kdpemesanan)
    {
        $delete = $this->mPemesanan->deleteData($kdpemesanan);
        return redirect()->to(base_url("pemesanan"));
    }
}
