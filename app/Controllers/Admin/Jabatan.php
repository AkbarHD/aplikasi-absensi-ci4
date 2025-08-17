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

    public function edit($id)
    {
        $jabatanModel = new JabatanModel();
        $data = [
            'title' => 'Edit Jabatan',
            'validation' => \Config\Services::validation(),
            'jabatan' => $jabatanModel->find($id)
        ];
        return view('admin/jabatan/edit', $data);
    }

    public function update($id)
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
            $jabatanModel = new JabatanModel();
            $data = [
                'title' => 'Edit Jabatan',
                'validation' => $this->validator,
                'jabatan' => $jabatanModel->find($id)
            ];
            return view('admin/jabatan/edit', $data);
        } else {
            $jabatanModel = new JabatanModel();
            $jabatanModel->update($id, [
                'jabatan' => $this->request->getVar('jabatan')
            ]);

            session()->setFlashdata('berhasil', 'Jabatan berhasil diupdate');
            return redirect()->to('/admin/jabatan');
        }
    }

    public function delete($id)
    {
        try {
            $jabatanModel = new JabatanModel();
            $jabatanModel->delete($id);

            session()->setFlashdata('berhasil', 'Jabatan berhasil dihapus');
            return redirect()->to('/admin/jabatan');
        } catch (\Exception $e) {
            // log error ke file log
            log_message('error', '[DELETE JABATAN] ' . $e->getMessage());

            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data');
            return redirect()->to('/admin/jabatan');
        }
    }
}
