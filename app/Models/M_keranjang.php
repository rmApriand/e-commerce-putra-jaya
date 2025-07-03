<?php

namespace App\Models;
use CodeIgniter\Model;

class M_keranjang extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_keranjang';
    protected $primaryKey       = 'kode_keranjang';
    protected $orderBy          = 'jumlah_order';
    protected $orderByType      = 'asc';

    protected $db;

    function __construct(){
        parent::__construct();
        $this->db = \Config\Database::connect(); 
    }

    function list_all($id_user) {
        $builder = $this->db->table('tbl_keranjang');
        $builder->select('tbl_keranjang.*, tbl_barang.*, (tbl_keranjang.jumlah_order * tbl_barang.harga_barang) as total_harga');
        $builder->join('tbl_barang', 'tbl_barang.kode_barang = tbl_keranjang.kode_barang', 'left');
        $builder->where('tbl_keranjang.id_user', $id_user); // Filter by user
        $builder->orderBy($this->orderBy, $this->orderByType);
        $query = $builder->get();
        return $query->getResult();
    }
    
    function add($data){
        return $this->db->table($this->table)->insert($data);
    }

    function getBarangList(){
        return $this->db->table('tbl_barang')->get()->getResult();
    }

    function getData($idkeranjang){
        $db = db_connect();
        $query = $db->query("SELECT * FROM tbl_keranjang WHERE kode_keranjang='$idkeranjang'; ");
        return $query->getRow();
    }
    
    public function updateStokBarang($kode_barang, $jumlah_order)
    {
        $db = db_connect();
        $db->query("UPDATE tbl_barang SET stok_barang = stok_barang - ? WHERE kode_barang = ?", [$jumlah_order, $kode_barang]);
    }

    function updateData($idkeranjang, $jumlah_order){
        $db = db_connect();
        return $db->simpleQuery("UPDATE tbl_keranjang SET jumlah_order = '$jumlah_order' WHERE tbl_keranjang.kode_keranjang = '$idkeranjang';");
    }

    function deleteData($idkeranjang){
        $db = db_connect();
        return $db->simpleQuery("DELETE FROM tbl_keranjang WHERE kode_keranjang = '$idkeranjang';");
    }

    function getItemsByNoOrder($no_order)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tbl_keranjang.*, tbl_barang.*, (tbl_keranjang.jumlah_order * tbl_barang.harga_barang) as total_harga');
        $builder->join('tbl_barang', 'tbl_barang.kode_barang = tbl_keranjang.kode_barang', 'left');
        $builder->where('tbl_keranjang.no_order', $no_order);
        $query = $builder->get();
        return $query->getResult();
    }

    function clearCartByNoOrder($no_order)
    {
        $this->db->table($this->table)->where('no_order', $no_order)->delete();
    }

    public function hapus_semua_data()
    {
        return $this->emptyTable($this->table);
    }
}
