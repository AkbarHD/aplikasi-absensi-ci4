<?php

namespace App\Controllers\Admin;

use App\Models\JabatanModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

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
            // validation harus seperti ini
            'validation' => \Config\Services::validation()
        ];
        return view('admin/jabatan/create', $data);
    }

    public function store()
    {
        $rules = [
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Tambah Jabatan',
                'validation' => $this->validator,
            ];
            return view('admin/jabatan/create', $data);
        } else {
            $jabatanModel = new JabatanModel();
            // pake insert juga bsa, cuman tampilannya kaya error
            $jabatanModel->save([
                'jabatan' => $this->request->getVar('jabatan')
            ]);

            session()->setFlashdata('berhasil', 'Jabatan baru berhasil ditambahkan');
            return redirect()->to('/admin/jabatan');
        }
    }
}
