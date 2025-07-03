<?php

namespace App\Controllers;

use App\Models\M_keranjang;
use App\Models\M_order;

class Keranjang extends BaseController
{
    protected $mKeranjang;
    protected $mOrder;

    public function __construct(){
        $this->mKeranjang = new M_keranjang();
        $this->mOrder = new M_order();
    }
    
    public function index(): string
    {
        $session = session();
        $id_user = $session->get('id_user');
        
        $dataBarang = $this->mKeranjang->list_all($id_user); 
        $dataPesanan = $this->mOrder->getKodeKeranjang();
        $existingKodeKeranjang = [];
        foreach ($dataPesanan as $pesanan) {
            $existingKodeKeranjang[] = $pesanan->kode_keranjang;
        }
        $filteredKeranjang = [];
        foreach ($dataBarang as $barang) {
            if (!in_array($barang->kode_keranjang, $existingKodeKeranjang)) {
                $filteredKeranjang[] = $barang;
            }
        }
        $data["keranjang"] = $filteredKeranjang;

        return view('template-user/header')
            . view('keranjang/list_keranjang.php', $data)
            . view('template-user/footer');
    }

    public function tambah($kode_barang = null)
    {
        $session = session();
        $id_user = $session->get('id_user');

        if ($kode_barang !== null) {
            $no_order = $session->get('no_order') ?? 1;

            $dataPost = [
                'kode_barang' => $kode_barang,
                'no_order' => $no_order,
                'jumlah_order' => 1,
                'id_user' => $id_user 
            ];
            
            $this->mKeranjang->add($dataPost);
            $this->mKeranjang->updateStokBarang($kode_barang, 1);

            $session->set('no_order', $no_order + 1);
            
            return redirect()->to(base_url('keranjang'));
        }
        
        return redirect()->to(base_url('keranjang'));
    }  

    public function edit($idkeranjang)
    {
        if($_POST){
            $dataPost['jumlah_order'] = $this->request->getVar('jumlah_order');
            $this->mKeranjang->updateData($idkeranjang, $dataPost["jumlah_order"]);

            return redirect()->to(base_url('keranjang'));
        }
        $getData = $this->mKeranjang->getData($idkeranjang);
        $data["keranjang"] = $getData;
        return view('template-user/header')
        .view('keranjang/edit_keranjang.php', $data)
        .view('template-user/footer');
    }

    public function delete($idkeranjang)
    {
        $this->mKeranjang->deleteData($idkeranjang);
        return redirect()->to(base_url("keranjang"));
    }

    public function hapus_semua()
    {
        $this->mKeranjang->hapusSemuaData();
        echo "success";
    }
    
}
