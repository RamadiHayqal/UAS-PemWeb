<?php

namespace App\Controllers;

use App\Models\DokterModel;
use App\Models\UserModel;

class Dokter extends BaseController
{
    protected $dokterModel;
    protected $userModel;

    public function __construct()
    {
        $this->dokterModel = new DokterModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Dokter',
            'dokter' => $this->dokterModel->findAll()
        ];

        return view('dokter/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Dokter'
        ];

        return view('dokter/create', $data);
    }

    public function store()
    {
        if (!$this->validate($this->dokterModel->validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'spesialisasi' => $this->request->getPost('spesialisasi'),
            'no_hp' => $this->request->getPost('no_hp')
        ];

        try {
            $this->dokterModel->insert($data);
            return redirect()->to('dokter')->with('success', 'Data dokter berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data dokter');
        }
    }

    public function edit($id)
    {
        $dokter = $this->dokterModel->find($id);
        if (!$dokter) {
            return redirect()->to('dokter')->with('error', 'Data dokter tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Dokter',
            'dokter' => $dokter
        ];

        return view('dokter/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->dokterModel->validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'spesialisasi' => $this->request->getPost('spesialisasi'),
            'no_hp' => $this->request->getPost('no_hp')
        ];

        try {
            $this->dokterModel->update($id, $data);
            return redirect()->to('dokter')->with('success', 'Data dokter berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupdate data dokter');
        }
    }

    public function delete($id)
    {
        try {
            $this->dokterModel->delete($id);
            return redirect()->to('dokter')->with('success', 'Data dokter berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->to('dokter')->with('error', 'Gagal menghapus data dokter');
        }
    }
}
