<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Data Dokter</h4>
                <a href="<?= base_url('dokter/create') ?>" class="btn btn-primary">Tambah Dokter</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Spesialisasi</th>
                                <th>No. HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dokter as $key => $row): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['spesialisasi'] ?></td>
                                    <td><?= $row['no_hp'] ?></td>
                                    <td>
                                        <a href="<?= base_url('dokter/edit/' . $row['id']) ?>"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?= base_url('dokter/delete/' . $row['id']) ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (empty($dokter)): ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
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