<?php

namespace App\Controllers;

use App\Models\RekamMedisModel;
use App\Models\PasienModel;
use App\Models\DokterModel;

class RekamMedis extends BaseController
{
    protected $rekamMedisModel;
    protected $pasienModel;
    protected $dokterModel;

    public function __construct()
    {
        $this->rekamMedisModel = new RekamMedisModel();
        $this->pasienModel = new PasienModel();
        $this->dokterModel = new DokterModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Rekam Medis',
            'rekam_medis' => $this->rekamMedisModel->getRekamMedis()
        ];

        return view('rekam_medis/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Rekam Medis',
            'pasien' => $this->pasienModel->findAll(),
            'dokter' => $this->dokterModel->findAll()
        ];

        return view('rekam_medis/create', $data);
    }

    public function store()
    {
        if (!$this->validate($this->rekamMedisModel->validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'pasien_id' => $this->request->getPost('pasien_id'),
            'dokter_id' => $this->request->getPost('dokter_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'diagnosa' => $this->request->getPost('diagnosa'),
            'tindakan' => $this->request->getPost('tindakan')
        ];

        try {
            $this->rekamMedisModel->insert($data);
            return redirect()->to('rekam-medis')->with('success', 'Data rekam medis berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data rekam medis');
        }
    }

    public function edit($id)
    {
        $rekamMedis = $this->rekamMedisModel->getRekamMedis($id);
        if (!$rekamMedis) {
            return redirect()->to('rekam-medis')->with('error', 'Data rekam medis tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Rekam Medis',
            'rekam_medis' => $rekamMedis,
            'pasien' => $this->pasienModel->findAll(),
            'dokter' => $this->dokterModel->findAll()
        ];

        return view('rekam_medis/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->rekamMedisModel->validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'pasien_id' => $this->request->getPost('pasien_id'),
            'dokter_id' => $this->request->getPost('dokter_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'diagnosa' => $this->request->getPost('diagnosa'),
            'tindakan' => $this->request->getPost('tindakan')
        ];

        try {
            $this->rekamMedisModel->update($id, $data);
            return redirect()->to('rekam-medis')->with('success', 'Data rekam medis berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupdate data rekam medis');
        }
    }

    public function delete($id)
    {
        try {
            $this->rekamMedisModel->delete($id);
            return redirect()->to('rekam-medis')->with('success', 'Data rekam medis berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->to('rekam-medis')->with('error', 'Gagal menghapus data rekam medis');
        }
    }
}
