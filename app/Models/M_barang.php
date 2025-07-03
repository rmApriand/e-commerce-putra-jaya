<?php

namespace App\Models;
use CodeIgniter\Model;

class M_barang extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_barang';
    protected $primaryKey       = 'kode_barang';
    protected $orderBy          = 'nama_barang';
    protected $orderByType      = 'asc';

    protected $db="";

    function __construct(){
        parent::__construct();
        $this->db = \Config\Database::connect(); 
        $this->db = db_connect(); 
    }

    function list_all(){
        $builder = $this->db->table('tbl_barang');
        $builder->select('tbl_barang.*, tbl_kategori.nama_kategori');
        $builder->join('tbl_kategori', 'tbl_kategori.kode_kategori = tbl_barang.kode_kategori', 'left');
        $builder->orderBy($this->orderBy, $this->orderByType);
        $query = $builder->get();
        $respon = $query->getResult();
        return $respon;
    }
    

    function add($data){
        if($this->db->table($this->table)->insert($data)){
            return "success";
        }else{
            return "failed";
        }
    }

    function getKategoriList(){
        return $this->db->table('tbl_kategori')->get()->getResult();
    }

    function getData($idorder){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        $query = $db->query("SELECT * FROM tbl_barang WHERE kode_barang='$idorder'; ");
        $respon = $query->getRow();
        return $respon;
    }

    public function updateData($idorder,  $kodeBarang, $namaBarang, $descBarang, $stokBarang, $hargaBarang, $kodeKategori)
    {
        $message = "";
        // Koneksi menggunakan simple query
        $db = db_connect();
        try {
            if (!$db->simpleQuery("UPDATE tbl_barang SET  kode_barang = '$kodeBarang', nama_barang = '$namaBarang', desc_barang = '$descBarang', stok_barang = '$stokBarang', harga_barang = '$hargaBarang', kode_kategori = '$kodeKategori' WHERE kode_barang = '$idorder';")) {
                $message = $db->error();
            } else {
                $message = "success";
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }
        return $message;
    }
    
    function deleteData($idorder){
        $message="Delete Data Berhasil";
        $db = db_connect();

        // Mengambil informasi gambar sebelum menghapus data
        $query = $db->query("SELECT gambar_barang FROM tbl_barang WHERE kode_barang = '$idorder'");
        $respon = $query->getRow();

        if ($respon) {
            $gambarPath = FCPATH . 'asset/' . $respon->gambar_barang;

            // Menghapus data barang
            try {
                if (!$db->simpleQuery("DELETE FROM tbl_barang WHERE kode_barang = '$idorder';")) {
                    $message = $db->error();
                } else {
                    // Menghapus file gambar jika data barang berhasil dihapus
                    if (file_exists($gambarPath)) {
                        unlink($gambarPath);
                    }
                    $message = "success";
                }
            } catch(\Exception $e){
                $message = $e->getMessage();
            }
        } else {
            $message = "Barang tidak ditemukan";
        }
        
        return $message;
    }

}
