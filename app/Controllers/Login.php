<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getPost('email_user');
        $password = $this->request->getPost('password_user');

        $user = $userModel->where('email_user', $email)->first();

        if ($user) {
            if ($password === $user['password_user']) { 
                $userData = [
                    'id_user' => $user['id_user'],
                    'nama_user' => $user['nama_user'],
                    'email_user' => $user['email_user'],
                    'alamat_user' => $user['alamat_user'],
                    'kode_role' => $user['kode_role'],
                    'logged_in' => true
                ];
                $session->set($userData);

                if ($user['kode_role'] == 1) {
                    return redirect()->to(base_url("home"));
                } elseif ($user['kode_role'] == 2) {
                    return redirect()->to(base_url("produk"));
                } else {
                    $session->setFlashdata('message', 'Role tidak dikenal.');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('message', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('message', 'Email tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}

