<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'no_hp'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'nama' => 'required|min_length[3]',
        'jenis_kelamin' => 'required|in_list[L,P]',
        'tanggal_lahir' => 'required|valid_date',
        'alamat' => 'required',
        'no_hp' => 'required|numeric|min_length[10]'
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama pasien harus diisi',
            'min_length' => 'Nama pasien minimal 3 karakter'
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin harus dipilih',
            'in_list' => 'Jenis kelamin tidak valid'
        ],
        'tanggal_lahir' => [
            'required' => 'Tanggal lahir harus diisi',
            'valid_date' => 'Format tanggal lahir tidak valid'
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi'
        ],
        'no_hp' => [
            'required' => 'Nomor HP harus diisi',
            'numeric' => 'Nomor HP harus berupa angka',
            'min_length' => 'Nomor HP minimal 10 digit'
        ]
    ];
}
