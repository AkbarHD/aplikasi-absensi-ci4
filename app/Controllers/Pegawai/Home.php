<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index()
    {
        // echo "Halaman pegawai";
        $data = [
            'title' => 'Home',
        ];
        return view('pegawai/home', $data);
    }
}
