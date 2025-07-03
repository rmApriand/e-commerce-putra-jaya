<?php

namespace App\Models;
use CodeIgniter\Model;

class M_user extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'id_user';
    protected $orderBy          = 'id_user';
    protected $orderByType      = 'asc';

    protected $db="";

    function __construct(){
        parent::__construct();
        $this->db = \Config\Database::connect(); 
        $this->db = db_connect(); 
    }

    function list_all(){
        $builder = $this->db->table('tbl_user');
        $builder->select('tbl_user.*, tbl_role.nama_role');
        $builder->join('tbl_role', 'tbl_role.kode_role = tbl_user.kode_role', 'left');
        $builder->orderBy($this->orderBy, $this->orderByType);
        $query = $builder->get();
        $respon = $query->getResult();
        return $respon;
    }

    function getRoleList(){
        return $this->db->table('tbl_role')->get()->getResult();
    }

    function getData($iduser){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        $query = $db->query("SELECT * FROM tbl_user WHERE id_user='$iduser'; ");
        $respon = $query->getRow();
        return $respon;
    }

    function updateData($iduser, $namaUser, $alamatUser, $noHpUser, $emailUser, $PasswordUser){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        try {
            if(! $db->simpleQuery("UPDATE tbl_user SET nama_user = '$namaUser', alamat_user = '$alamatUser', no_hp_user = '$noHpUser', email_user = '$emailUser', password_user = '$PasswordUser' WHERE tbl_user.id_user = '$iduser';")){
                $message= $db->eror();
            }else{
                $message="success";
            }
        } catch(\Exception $e){
            $message=$e->getMessage();
        }
        return $message;
    }

    function deleteData($iduser){
        $message="";
        //koneksi menggunakan simple query
        $db = db_connect();
        try {
            if(! $db->simpleQuery("DELETE FROM tbl_user WHERE id_user = '$iduser';")){
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
