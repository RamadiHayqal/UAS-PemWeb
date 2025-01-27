<?php

namespace App\Controllers;

use App\Models\PasienModel;
use App\Models\DokterModel;
use App\Models\RekamMedisModel;

class Dashboard extends BaseController
{
    protected $pasienModel;
    protected $dokterModel;
    protected $rekamMedisModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->dokterModel = new DokterModel();
        $this->rekamMedisModel = new RekamMedisModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('login');
        }

        $data = [
            'title' => 'Dashboard - Sistem Klinik',
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];

        return view('dashboard/index', $data);
    }

    private function getRekamMedisPerBulan()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT DATE_FORMAT(tanggal, '%Y-%m') as bulan, COUNT(*) as total
            FROM rekam_medis
            WHERE tanggal >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
            GROUP BY DATE_FORMAT(tanggal, '%Y-%m')
            ORDER BY bulan ASC
        ");

        return $query->getResultArray();
    }
}
