<?php

namespace App\Models;
use CodeIgniter\Model;

class M_pemesanan extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_pesanan';
    protected $primaryKey       = 'kode_pesanan';
    protected $orderBy          = 'kode_pesanan';
    protected $orderByType      = 'asc';

    protected $db="";

    function __construct(){
        parent::__construct();
        $this->db = \Config\Database::connect(); 
        $this->db = db_connect(); 
    }

    function list_all_admin(){
        $builder = $this->db->table('tbl_pesanan');
        $builder->select('tbl_pesanan.*, tbl_keranjang.*, tbl_barang.*, tbl_pembayaran.*, tbl_user.nama_user, tbl_user.alamat_user, (tbl_keranjang.jumlah_order * tbl_barang.harga_barang) as total_harga');
        $builder->join('tbl_keranjang', 'tbl_keranjang.kode_keranjang = tbl_pesanan.kode_keranjang', 'left');
        $builder->join('tbl_barang', 'tbl_barang.kode_barang = tbl_keranjang.kode_barang', 'left');
        $builder->join('tbl_pembayaran', 'tbl_pembayaran.id_pembayaran = tbl_pesanan.id_pembayaran', 'left');
        $builder->join('tbl_user', 'tbl_user.id_user = tbl_pesanan.id_user', 'left');
        $builder->orderBy($this->orderBy, $this->orderByType);
        $query = $builder->get();
        $respon = $query->getResult();
        return $respon;
    }

    function list_all($id_user){
        $builder = $this->db->table('tbl_pesanan');
        $builder->select('tbl_pesanan.*, tbl_keranjang.*, tbl_barang.*, tbl_pembayaran.*, tbl_user.nama_user, tbl_user.alamat_user, (tbl_keranjang.jumlah_order * tbl_barang.harga_barang) as total_harga');
        $builder->join('tbl_keranjang', 'tbl_keranjang.kode_keranjang = tbl_pesanan.kode_keranjang', 'left');
        $builder->join('tbl_barang', 'tbl_barang.kode_barang = tbl_keranjang.kode_barang', 'left');
        $builder->join('tbl_pembayaran', 'tbl_pembayaran.id_pembayaran = tbl_pesanan.id_pembayaran', 'left');
        $builder->join('tbl_user', 'tbl_user.id_user = tbl_pesanan.id_user', 'left');
        $builder->where('tbl_pesanan.id_user', $id_user); // Filter by user ID
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

    function getKeranjangListAdmin(){
        return $this->db->table('tbl_keranjang')->get()->getResult();
    }

    public function getItemsByNoOrder($no_order)
    {
        $builder = $this->db->table('tbl_keranjang');
        $builder->select('*');
        $builder->where('no_order', $no_order);
        $query = $builder->get();
        return $query->getResult();
    }

    function getKeranjangList($id_user){
        return $this->db->table('tbl_keranjang')
                        ->where('id_user', $id_user) // Filter by user ID
                        ->get()
                        ->getResult();
    }

    function getBarangList(){
        return $this->db->table('tbl_barang')->get()->getResult();
    }

    function getPembayaranList(){
        return $this->db->table('tbl_pembayaran')->get()->getResult();
    }

    function getData($kdpemesanan){
        $message="";
        $db = db_connect();
        $query = $db->query("SELECT * FROM tbl_pesanan WHERE kode_pesanan='$kdpemesanan'; ");
        $respon = $query->getRow();
        return $respon;
    }

    public function updateBuktiPembayaran($kdpemesanan, $dataPost)
    {
        $db = db_connect();
        $builder = $db->table('tbl_pesanan');
        $builder->where('kode_pesanan', $kdpemesanan);
        $builder->update($dataPost);
    }


    public function updateStatusPesanan($kdpemesanan, $dataPost)
    {
        $db = db_connect();
        $builder = $db->table('tbl_pesanan');
        $builder->where('kode_pesanan', $kdpemesanan);
        $builder->update(['status_pesanan' => $dataPost['status_pesanan']]);
    }

    function deleteData($kdpemesanan){
        $message="Delect Data Berhasil";
        $db = db_connect();
        try {
            if(! $db->simpleQuery("DELETE FROM tbl_pesanan WHERE kode_pesanan = '$kdpemesanan';")){
                $message= $db->eror();
            }else{
                $message="success";
            }
        } catch(\Exception $e){
            $message=$e->getMessage();
        }
        return $message;
    }

    public function isKodeKeranjangExist($kode_keranjang)
    {
        $builder = $this->db->table('tbl_pesanan');
        $builder->select('*');
        $builder->where('kode_keranjang', $kode_keranjang);
        $query = $builder->get();

        return ($query->getNumRows() > 0);
    }

    function getUserData($id_user){
        $builder = $this->db->table('tbl_user');
        $builder->select('*');
        $builder->where('id_user', $id_user);
        $query = $builder->get();
        return $query->getRow();
    }
}

