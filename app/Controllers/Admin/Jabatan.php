<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\JabatanModel;

class Jabatan extends BaseController
{
    public function index()
    {
        $jabatanModel = new JabatanModel();
        $data = [
            'title' => 'Data Jabatan',
            'jabatan' => $jabatanModel->findAll()
        ];
        return view('admin/jabatan/jabatan', $data);
    }

    public function create()
    {
        $jabatanModel = new JabatanModel();
        $data = [
            'title' => 'Data Jabatan',
        ];
        return view('admin/jabatan/create', $data);
    }
}
