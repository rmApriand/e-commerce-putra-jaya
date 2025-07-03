<?php

namespace App\Controllers;

use App\Models\M_barang;

class Barang extends BaseController
{
    protected $mBarang;

    public function __construct(){
        $this->mBarang = new M_barang();
    }
    
    public function index(): string
    {
        $dataBarang = $this->mBarang->list_all();
        $data["barang"] = $dataBarang;
        return view('template/header')
        .view('barang/list_barang.php', $data)
        .view ('template/footer');
    }

    public function tambah(): string
    {
        if ($this->request->getMethod() == 'post') {
            $dataPost = [];

            $gambar = $this->request->getFile('gambar_barang');
            if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                $newName = $gambar->getRandomName();
                $gambar->move(FCPATH . 'asset', $newName); // Mengubah direktori tujuan ke public/asset
                $dataPost['gambar_barang'] = $newName;
            } else {
                // Handle the error or use a default image name
                $dataPost['gambar_barang'] = 'default.png';
            }

            $dataPost['kode_barang'] = $this->request->getVar('kode_barang');
            $dataPost['nama_barang'] = $this->request->getVar('nama_barang');
            $dataPost['desc_barang'] = $this->request->getVar('desc_barang');
            $dataPost['stok_barang'] = $this->request->getVar('stok_barang');
            $dataPost['harga_barang'] = $this->request->getVar('harga_barang');
            $dataPost['kode_kategori'] = $this->request->getVar('kode_kategori');

            $tambah = $this->mBarang->add($dataPost);
        }

        $data['kategoriList'] = $this->mBarang->getKategoriList();
        return view('template/header')
            .view('barang/tambah_barang.php', $data)
            .view('template/footer');
    }

    public function edit($idbarang)
    {
        $data['kategoriList'] = $this->mBarang->getKategoriList();

        if ($this->request->getMethod() === 'post') {
            $dataPost = [];

            // $gambar = $this->request->getFile('gambar_barang');
            // if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            //     $newName = $gambar->getRandomName();
            //     $gambar->move(FCPATH . 'asset', $newName); // Mengubah direktori tujuan ke public/asset
            //     $dataPost['gambar_barang'] = $newName;
            // } else {
            //     // Use the existing image if no new image is uploaded
            //     $dataPost['gambar_barang'] = $this->request->getVar('existing_gambar_barang');
            // }

            $dataPost['kode_barang'] = $this->request->getVar('kode_barang');
            $dataPost['nama_barang'] = $this->request->getVar('nama_barang');
            $dataPost['desc_barang'] = $this->request->getVar('desc_barang');
            $dataPost['stok_barang'] = $this->request->getVar('stok_barang');
            $dataPost['harga_barang'] = $this->request->getVar('harga_barang');
            $dataPost['kode_kategori'] = $this->request->getVar('kode_kategori');

            $update = $this->mBarang->updateData(
                $idbarang,
                // $dataPost['gambar_barang'],
                $dataPost['kode_barang'],
                $dataPost['nama_barang'],
                $dataPost['desc_barang'],
                $dataPost['stok_barang'],
                $dataPost['harga_barang'],
                $dataPost['kode_kategori']
            );
        }

        $getData = $this->mBarang->getData($idbarang);
        $data['barang'] = $getData;
        return view('template/header')
            .view('barang/edit_barang.php', $data)
            .view('template/footer');
    }

    public function delete($idbarang)
    {
        $delete = $this->mBarang->deleteData($idbarang);
        return redirect()->to(base_url("barang"));
    }

    public function Produk(): string
    {
        $dataBarang = $this->mBarang->list_all();
        $data["barang"] = $dataBarang;
        return view('template-user/header')
        .view ('user/produk', $data)
        .view ('template-user/footer');
    }
}
