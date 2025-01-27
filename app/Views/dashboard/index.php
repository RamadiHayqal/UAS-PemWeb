<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Dashboard Sistem Klinik</h4>
                </div>
                <div class="card-body">
                    <h5>Selamat datang, <?= $username ?></h5>
                    <p>Anda login sebagai: <?= ucfirst($role) ?></p>

                    <?php if ($role === 'admin'): ?>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h5>Manajemen User</h5>
                                        <a href="<?= base_url('users') ?>" class="btn btn-light">Kelola</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5>Data Pasien</h5>
                                        <a href="<?= base_url('pasien') ?>" class="btn btn-light">Kelola</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h5>Rekam Medis</h5>
                                        <a href="<?= base_url('rekam-medis') ?>" class="btn btn-light">Kelola</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>