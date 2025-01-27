<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Edit Dokter</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('dokter/update/' . $dokter['id']) ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="<?= old('nama', $dokter['nama']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="spesialisasi" class="form-label">Spesialisasi</label>
                        <input type="text" class="form-control" id="spesialisasi" name="spesialisasi"
                            value="<?= old('spesialisasi', $dokter['spesialisasi']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                            value="<?= old('no_hp', $dokter['no_hp']) ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('dokter') ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>