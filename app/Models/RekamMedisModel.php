<?php

namespace App\Models;

use CodeIgniter\Model;

class RekamMedisModel extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pasien_id', 'dokter_id', 'tanggal', 'diagnosa', 'tindakan'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'pasien_id' => 'required|numeric|is_not_unique[pasien.id]',
        'dokter_id' => 'required|numeric|is_not_unique[dokter.id]',
        'tanggal' => 'required|valid_date',
        'diagnosa' => 'required',
        'tindakan' => 'required'
    ];

    protected $validationMessages = [
        'pasien_id' => [
            'required' => 'Pasien harus dipilih',
            'is_not_unique' => 'Pasien tidak ditemukan'
        ],
        'dokter_id' => [
            'required' => 'Dokter harus dipilih',
            'is_not_unique' => 'Dokter tidak ditemukan'
        ],
        'tanggal' => [
            'required' => 'Tanggal harus diisi',
            'valid_date' => 'Format tanggal tidak valid'
        ],
        'diagnosa' => [
            'required' => 'Diagnosa harus diisi'
        ],
        'tindakan' => [
            'required' => 'Tindakan harus diisi'
        ]
    ];

    // Fungsi untuk mendapatkan data rekam medis dengan relasi
    public function getRekamMedis($id = null)
    {
        $builder = $this->db->table('rekam_medis rm');
        $builder->select('rm.*, p.nama as nama_pasien, d.nama as nama_dokter');
        $builder->join('pasien p', 'p.id = rm.pasien_id');
        $builder->join('dokter d', 'd.id = rm.dokter_id');

        if ($id !== null) {
            return $builder->where('rm.id', $id)->get()->getRowArray();
        }

        return $builder->get()->getResultArray();
    }
}
