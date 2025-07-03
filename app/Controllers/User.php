<?php

namespace App\Controllers;

use App\Models\M_user;

class User extends BaseController
{
    protected $mUser;

    public function __construct(){
        $this->mUser = new M_user();
    }
    
    public function index(): string
    {
        return view('template-user/header')
        .view ('user/beranda')
        .view ('template-user/footer');
    }

    public function list(): string
    {
        $dataUser = $this->mUser->list_all();
        $data["user"] = $dataUser;
        return view('template/header')
        .view('user-admin/list_user.php', $data)
        .view ('template/footer');
    }

    public function edit($iduser)
    {
        //cek apakah ada post data atau tidak
        if($_POST){
            $dataPost["nama_user"] = $this->request->getVar("nama_user");
            $dataPost["alamat_user"] = $this->request->getVar("alamat_user");
            $dataPost["no_hp_user"] = $this->request->getVar("no_hp_user");
            $dataPost["email_user"] = $this->request->getVar("email_user");
            $dataPost["password_user"] = $this->request->getVar("password_user");
            $tambah = $this->mUser->updateData($iduser, $dataPost["nama_user"], $dataPost["alamat_user"], $dataPost["no_hp_user"], $dataPost["email_user"], $dataPost["password_user"]);
            // print_r($dataPost);
        }
        $getData = $this->mUser->getData($iduser);
        $data["user"]= $getData;
        return view('template/header')
        .view('user-admin/edit_user.php', $data)
        .view ('template/footer');
    }

    public function delete($iduser)
    {
        $delete = $this->mUser->deleteData($idKategori);
        return redirect()->to(base_url("kategori"));
    }
}
