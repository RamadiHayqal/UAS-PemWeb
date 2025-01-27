<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'spesialisasi', 'no_hp'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validasi
    protected $validationRules = [
        'nama' => 'required|min_length[3]',
        'spesialisasi' => 'required',
        'no_hp' => 'required|numeric|min_length[10]'
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama dokter harus diisi',
            'min_length' => 'Nama dokter minimal 3 karakter'
        ],
        'spesialisasi' => [
            'required' => 'Spesialisasi harus diisi'
        ],
        'no_hp' => [
            'required' => 'Nomor HP harus diisi',
            'numeric' => 'Nomor HP harus berupa angka',
            'min_length' => 'Nomor HP minimal 10 digit'
        ]
    ];

    public function getDokterWithUser()
    {
        return $this->select('dokter.*, users.email, users.username')
            ->join('users', 'users.id = dokter.user_id')
            ->findAll();
    }
}
