<?php

namespace App\Models;
use CodeIgniter\Model;

class M_kategori extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_kategori';
    protected $primaryKey       = 'kode_kategori';
    //order
    protected $orderBy  = 'nama_kategori';
    protected $orderByType  = 'asc';

    protected $db="";

    function __construct(){
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->db = $this->db->table($this->table);
    }

    function list_all(){
        $query = $this->db->get();
        $this->db->orderBy($this->orderBy, $this->orderByType);
        $respon =$query->getResult();
        return $respon;
    }

    public function add($data){
        if($this->db->insert($data)){
            return "succes";
        }else{
            return "failed";
        }
    }

    function getData($idKategori){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        $query = $db->query("SELECT * FROM tbl_kategori WHERE kode_kategori='$idKategori'; ");
        $respon = $query->getRow();
        return $respon;
    }

    function updateData($idKategori, $namaKategori){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        try {
            if(! $db->simpleQuery("UPDATE tbl_kategori SET nama_kategori = '$namaKategori' WHERE tbl_kategori.kode_kategori = '$idKategori';")){
                $message= $db->eror();
            }else{
                $message="success";
            }
        } catch(\Exception $e){
            $message=$e->getMessage();
        }
        return $message;
    }

    function deleteData($idKategori){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        try {
            if(! $db->simpleQuery("DELETE FROM tbl_kategori WHERE kode_kategori = '$idKategori';")){
                $message= $db->eror();
            }else{
                $message="success";
            }
        } catch(\Exception $e){
            $message=$e->getMessage();
        }
        return $message;
    }
}
