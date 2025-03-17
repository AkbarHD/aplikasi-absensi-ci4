<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function login_action()
    {
        // dd($this->request->getVar('username'));
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('auth/login', $data);
        } else {
            $session = session();
            $loginModel = new LoginModel();
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $cekUsername = $loginModel->where('username', $username)->first();
            // dd($cekUsername);
            if ($cekUsername) {
                // pengecekan session untuk filter
                $session_data = [
                    'username' => $cekUsername['username'],
                    'logged_in' => TRUE,
                    'role_id' => $cekUsername['role'],
                ]
                $session->set($session_data);

                $password_db = $cekUsername['password'];
                -
                    $cek_password = password_verify($password, $password_db);
                if ($cek_password) {
                    switch ($cekUsername['role']) {
                        case "admin":
                            return redirect()->to('admin/home');
                        case "pegawai":
                            return redirect()->to('pegawai/home');
                        default:
                            $session->setFlashdata('pesan', 'Akun anda belum terdaftar');
                            return redirect()->to('/');
                    }
                } else {
                    $session->setFlashdata('pesan', 'password salah, silahkan coba lagi');
                    return redirect()->to('/');
                }

            } else {
                $session->setFlashdata('pesan', 'username salah, silahkan coba lagi');
                return redirect()->to('/');
            }
        }
        // dd($this->request->getVar('username'));
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
