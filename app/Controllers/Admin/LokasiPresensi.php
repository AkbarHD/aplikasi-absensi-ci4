<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LokasiPresensiModel;
use CodeIgniter\HTTP\ResponseInterface;

class LokasiPresensi extends BaseController
{
    public function index()
    {
        $lokasiPresensiModel = new LokasiPresensiModel();
        $data = [
            'title' => 'Data Jabatan',
            'jabatan' => $lokasiPresensiModel->findAll()
        ];
        return view('admin/jabatan/jabatan', $data);
    }

    public function create()
    {
        $lokasiPresensiModel = new LokasiPresensiModel();
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
                'rules' => 'required|is_unique[jabatan.jabatan]',
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
            $lokasiPresensiModel = new LokasiPresensiModel();
            // pake insert juga bsa, cuman tampilannya kaya error
            $lokasiPresensiModel->save([
                'jabatan' => $this->request->getVar('jabatan')
            ]);

            session()->setFlashdata('berhasil', 'Jabatan baru berhasil ditambahkan');
            return redirect()->to('/admin/jabatan');
        }
    }

    public function edit($id)
    {
        $lokasiPresensiModel = new LokasiPresensiModel();
        $data = [
            'title' => 'Edit Jabatan',
            'validation' => \Config\Services::validation(),
            'jabatan' => $lokasiPresensiModel->find($id)
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
            $lokasiPresensiModel = new LokasiPresensiModel();
            $data = [
                'title' => 'Edit Jabatan',
                'validation' => $this->validator,
                'jabatan' => $lokasiPresensiModel->find($id)
            ];
            return view('admin/jabatan/edit', $data);
        } else {
            $lokasiPresensiModel = new LokasiPresensiModel();
            $lokasiPresensiModel->update($id, [
                'jabatan' => $this->request->getVar('jabatan')
            ]);

            session()->setFlashdata('berhasil', 'Jabatan berhasil diupdate');
            return redirect()->to('/admin/jabatan');
        }
    }

    public function delete($id)
    {
        try {
            $lokasiPresensiModel = new LokasiPresensiModel();
            $lokasiPresensiModel->delete($id);

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
