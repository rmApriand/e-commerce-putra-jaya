<?php

namespace App\Controllers;

use App\Models\M_pemesanan;

class Pemesanan extends BaseController
{
    protected $mPemesanan;

    public function __construct(){
        $this->mPemesanan = new M_pemesanan();
    }
    
    public function index(): string
    {
        $session = session();
        $id_user = $session->get('id_user');
        
        $dataPemesanan = $this->mPemesanan->list_all($id_user); 
        $groupedPemesanan = [];

        foreach ($dataPemesanan as $pemesanan) {
            $tanggal_pemesanan = $pemesanan->tanggal_pemesanan; 
            $groupedPemesanan[$id_user][$tanggal_pemesanan][] = $pemesanan;
        }

        $data["groupedPemesanan"] = $groupedPemesanan;

        return view('template-user/header')
            .view('pemesanan/list_pemesanan.php', $data)
            .view('template-user/footer');
    }

    public function tambah()
    {
        $session = session();
        $userData = $session->get();

        if ($this->request->getMethod() == 'post') {
            $keranjanglist = $this->mPemesanan->getKeranjangList($userData['id_user']); // Filter items by user
            $addedKodeKeranjang = [];

            foreach ($keranjanglist as $item) {
                if (!array_key_exists($item->kode_keranjang, $addedKodeKeranjang)) {
                    if (!$this->mPemesanan->isKodeKeranjangExist($item->kode_keranjang)) {
                        $dataPost = [
                            'kode_pesanan' => $this->request->getVar('kode_pesanan'),
                            'kode_keranjang' => $item->kode_keranjang,
                            'kode_barang' => $item->kode_barang,
                            'id_pembayaran' => $this->request->getVar('id_pembayaran'),
                            'status_pesanan' => $this->getStatusPesanan($this->request->getVar('id_pembayaran')),
                            'bukti_pembayaran' => 'Belum dibayar',
                            'id_user' => $userData['id_user'] // Include id_user
                        ];

                        $tambah = $this->mPemesanan->add($dataPost);
                        $addedKodeKeranjang[$item->kode_keranjang] = true;
                    }
                }
            }

            return redirect()->to(base_url("pemesanan"));
        }

        $user = $this->mPemesanan->getUserData($userData['id_user']);

        $data['keranjanglist'] = $this->mPemesanan->getKeranjangList($userData['id_user']); // Filter items by user
        $data['baranglist'] = $this->mPemesanan->getBarangList();
        $data['pembayaranlist'] = $this->mPemesanan->getPembayaranList();
        $data['user'] = $user;

        return view('template-user/header')
            .view('pemesanan/tambah_pemesanan', $data)
            .view('template-user/footer');
    }

    private function getStatusPesanan($id_pembayaran)
    {
        switch ($id_pembayaran) {
            case 1:
                return 'Sedang disiapkan';
            case 2:
                return 'Bayar terlebih dahulu';
            default:
                return 'Bayar terlebih dahulu'; // Default status
        }
    }

    public function edit($kdpemesanan)
    {
        if ($this->request->getMethod() == 'post') {
            $gambar = $this->request->getFile('bukti_pembayaran');
            if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                $newName = $gambar->getRandomName();
                $gambar->move(FCPATH . 'bukti', $newName); 

                $dataPost['bukti_pembayaran'] = $newName;
                $dataPost['status_pesanan'] = 'Validasi pembayaran';
                $this->mPemesanan->updateBuktiPembayaran($kdpemesanan, $dataPost);
            }
            return redirect()->to(base_url("pemesanan"));
        }

        $getData = $this->mPemesanan->getData($kdpemesanan);
        $data["pemesanan"] = $getData;
        return view('template-user/header')
            .view('pemesanan/edit_pemesanan.php', $data)
            .view('template-user/footer');
    }

    public function editAdmin($kdpemesanan)
    {
        if ($this->request->getMethod() == 'post') {
            $gambar = $this->request->getFile('bukti_pembayaran');
            if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                $newName = $gambar->getRandomName();
                $gambar->move(FCPATH . 'bukti', $newName); 

                $dataPost['bukti_pembayaran'] = $newName;
                $dataPost['status_pesanan'] = 'Validasi pembayaran';
                $this->mPemesanan->updateBuktiPembayaran($kdpemesanan, $dataPost);
            }
            return redirect()->to(base_url("order"));
        }

        $getData = $this->mPemesanan->getData($kdpemesanan);
        $data["pemesanan"] = $getData;
        return view('template-user/header')
            .view('pemesanan/edit_pemesanan.php', $data)
            .view('template-user/footer');
    }

    public function delete($kdpemesanan)
    {
        $delete = $this->mPemesanan->deleteData($kdpemesanan);
        return redirect()->to(base_url("pemesanan"));
    }
}
