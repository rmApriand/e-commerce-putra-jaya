<?php

namespace App\Models;
use CodeIgniter\Model;

class M_order extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_order';
    protected $primaryKey       = 'kode_order';
    protected $orderBy          = 'jumlah_order';
    protected $orderByType      = 'asc';

    protected $db="";

    function __construct(){
        parent::__construct();
        $this->db = \Config\Database::connect(); 
        $this->db = db_connect(); 
    }

    function list_all(){
        $builder = $this->db->table('tbl_order');
        $builder->select('tbl_order.*, tbl_pembayaran.nama_pembayaran, tbl_barang.*, (tbl_order.jumlah_order * tbl_barang.harga_barang) as total_harga');
        $builder->join('tbl_pembayaran', 'tbl_pembayaran.id_pembayaran = tbl_order.id_pembayaran', 'left');
        $builder->join('tbl_barang', 'tbl_barang.kode_barang = tbl_order.kode_barang', 'left');
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

    public function getKodeKeranjang()
    {
        return $this->db->table('tbl_pesanan')
            ->select('kode_keranjang')
            ->get()
            ->getResult();
    }

    function getBarangList(){
        return $this->db->table('tbl_barang')->get()->getResult();
    }

    function getUserList(){
        return $this->db->table('tbl_user')->get()->getResult();
    }
    
    function getPembayaranList(){
        return $this->db->table('tbl_pembayaran')->get()->getResult();
    }

    function getData($idorder){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        $query = $db->query("SELECT * FROM tbl_order WHERE kode_order='$idorder'; ");
        $respon = $query->getRow();
        return $respon;
    }

    // public function updateData($idorder, $buktiPembayaran, $kodeOrder, $jumlahOrder, $idPembayaran, $kodeBarang)
    public function updateData($idorder, $jumlahOrder, $idPembayaran, $statusOrder, $kodeBarang)
    {
        $message = "";
        // Koneksi menggunakan simple query
        $db = db_connect();
        try {
            if (!$db->simpleQuery("UPDATE tbl_order SET jumlah_order = '$jumlahOrder', id_pembayaran = '$idPembayaran', kode_barang = '$kodeBarang', status_order = '$statusOrder' WHERE kode_order = '$idorder';")) {
                $message = $db->error();
            } else {
                $message = "success";
            }
        } catch (\Exception $e) {
            $message = "Error updating data: " . $e->getMessage();
        }
        return $message;
    }
    

    
    function deleteData($idorder){
        $message="Delete Data Berhasil";
        $db = db_connect();

        // Mengambil informasi gambar sebelum menghapus data
        $query = $db->query("SELECT bukti_pembayaran FROM tbl_order WHERE kode_order = '$idorder'");
        $respon = $query->getRow();

        if ($respon) {
            $gambarPath = FCPATH . 'bukti/' . $respon->bukti_pembayaran;

            // Menghapus data barang
            try {
                if (!$db->simpleQuery("DELETE FROM tbl_order WHERE kode_order = '$idorder';")) {
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
