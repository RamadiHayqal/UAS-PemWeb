<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Data Rekam Medis</h4>
                <a href="<?= base_url('rekam-medis/create') ?>" class="btn btn-primary">Tambah Rekam Medis</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Diagnosa</th>
                                <th>Tindakan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rekam_medis as $key => $row): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= date('d/m/Y', strtotime($row['tanggal'])) ?></td>
                                    <td><?= $row['nama_pasien'] ?></td>
                                    <td><?= $row['nama_dokter'] ?></td>
                                    <td><?= $row['diagnosa'] ?></td>
                                    <td><?= $row['tindakan'] ?></td>
                                    <td>
                                        <a href="<?= base_url('rekam-medis/edit/' . $row['id']) ?>"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?= base_url('rekam-medis/delete/' . $row['id']) ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (empty($rekam_medis)): ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>