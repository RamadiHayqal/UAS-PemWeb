<?php

namespace App\Controllers;

use App\Models\PasienModel;

class Pasien extends BaseController
{
    protected $pasienModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pasien',
            'pasien' => $this->pasienModel->findAll()
        ];

        return view('pasien/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pasien'
        ];

        return view('pasien/create', $data);
    }

    public function store()
    {
        if (!$this->validate($this->pasienModel->validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp')
        ];

        try {
            $this->pasienModel->insert($data);
            return redirect()->to('pasien')->with('success', 'Data pasien berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pasien');
        }
    }

    public function edit($id)
    {
        $pasien = $this->pasienModel->find($id);
        if (!$pasien) {
            return redirect()->to('pasien')->with('error', 'Data pasien tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Pasien',
            'pasien' => $pasien
        ];

        return view('pasien/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->pasienModel->validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp')
        ];

        try {
            $this->pasienModel->update($id, $data);
            return redirect()->to('pasien')->with('success', 'Data pasien berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupdate data pasien');
        }
    }

    public function delete($id)
    {
        try {
            $this->pasienModel->delete($id);
            return redirect()->to('pasien')->with('success', 'Data pasien berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->to('pasien')->with('error', 'Gagal menghapus data pasien');
        }
    }
}
