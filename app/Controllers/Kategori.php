<?php

namespace App\Controllers;

use App\Models\M_kategori;


class Kategori extends BaseController
{
    protected $mKategori;

    function __construct(){
        $this->mKategori = new M_Kategori();
    }
    
    public function index(): string
    {
        $dataKaegori = $this->mKategori->list_all();
        $data["kategori"] = $dataKaegori;
        return view('template/header')
        .view('kategori/list_kategori.php', $data)
        .view ('template/footer');
    }

    public function tambah(): string
    {
        If($_POST){
            $dataPost["nama_kategori"] = $this->request->getVar("nama_kategori");
            // print_r($dataPost);
            $tambah = $this->mKategori->add($dataPost);
        }
        return view('template/header')
        .view('kategori/tambah_kategori.php')
        .view ('template/footer');
    }

    //butuh id kategori untuk ubah data
    public function edit($idKategori)
    {
        //cek apakah ada post data atau tidak
        if($_POST){
            $dataPost["nama_kategori"] = $this->request->getVar("nama_kategori");
            $tambah = $this->mKategori->updateData($idKategori, $dataPost["nama_kategori"]);
            // print_r($dataPost);
        }
        $getData = $this->mKategori->getData($idKategori);
        $data["kategori"]= $getData;
        return view('template/header')
        .view('kategori/edit_kategori.php', $data)
        .view ('template/footer');
    }

    public function delete($idKategori)
    {
        $delete = $this->mKategori->deleteData($idKategori);
        return redirect()->to(base_url("kategori"));
    }
}
