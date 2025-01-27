<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Tambah Rekam Medis</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('rekam-medis/store') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="<?= old('tanggal', date('Y-m-d')) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="pasien_id" class="form-label">Pasien</label>
                        <select class="form-select" id="pasien_id" name="pasien_id" required>
                            <option value="">Pilih Pasien</option>
                            <?php foreach ($pasien as $p): ?>
                                <option value="<?= $p['id'] ?>" <?= old('pasien_id') == $p['id'] ? 'selected' : '' ?>>
                                    <?= $p['nama'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dokter_id" class="form-label">Dokter</label>
                        <select class="form-select" id="dokter_id" name="dokter_id" required>
                            <option value="">Pilih Dokter</option>
                            <?php foreach ($dokter as $d): ?>
                                <option value="<?= $d['id'] ?>" <?= old('dokter_id') == $d['id'] ? 'selected' : '' ?>>
                                    <?= $d['nama'] ?> - <?= $d['spesialisasi'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="diagnosa" class="form-label">Diagnosa</label>
                        <textarea class="form-control" id="diagnosa" name="diagnosa" rows="3"
                            required><?= old('diagnosa') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tindakan" class="form-label">Tindakan</label>
                        <textarea class="form-control" id="tindakan" name="tindakan" rows="3"
                            required><?= old('tindakan') ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('rekam-medis') ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>