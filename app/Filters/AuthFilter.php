<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    //method ini dijalankan sebelum permintaan diproses:
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }
        //Memastikan pengguna telah login. Jika tidak, pengguna diarahkan ke halaman login.

        // Cek role untuk semua akses CRUD
        $role = session()->get('role');
        $uri = $request->uri->getPath();

        // Jika bukan admin, batasi akses ke semua CRUD
        if ($role !== 'admin' && (
            strpos($uri, 'dokter') === 0 ||
            strpos($uri, 'pasien') === 0 ||
            strpos($uri, 'rekam-medis') === 0
        )) {
            return redirect()->to('dashboard')->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses menu ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
