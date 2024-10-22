<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            session()->setFlashdata('pesan', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to('/');
        }

        if (session()->get('role_id') !== 'admin') {
            // Set flashdata atau pesan 403 forbidden
            session()->setFlashdata('pesan', 'Anda tidak memiliki akses ke halaman ini.');

            // Mengembalikan respons 403 Forbidden
            return \Config\Services::response()
                ->setStatusCode(403)
                ->setBody('403 Forbidden: Anda tidak memiliki hak akses ke halaman ini.');
        }
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param mixed             $arguments
     *
     * @return mixed
     */
    /******  e87c1b11-066e-454d-9bcf-7ca3c97eea92  *******/
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}