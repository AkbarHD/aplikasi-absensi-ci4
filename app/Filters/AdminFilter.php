<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // stelah kita konfiguras disini, harus di daftarakan di Routes.php dan app/config/Filters.php

        if (!session()->get('logged_in')) { // jika user belum login
            // Set flashdata atau pesan
            session()->setFlashdata('pesan', 'Silahkan Login Terlebih Dahulu');
            // Redirect ke halaman login
            return redirect()->to('/');
        }

        if (session()->get('role_id') !== 'admin') {
            // Set flashdata atau pesan 403 forbidden
            session()->setFlashdata('pesan', 'Anda tidak memiliki akses ke halaman ini.');
            return redirect()->to('/');

            // Mengembalikan respons 403 Forbidden
            // return \Config\Services::response()
            //     ->setStatusCode(403)
            //     ->setBody('403 Forbidden: Anda tidak memiliki hak akses ke halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}