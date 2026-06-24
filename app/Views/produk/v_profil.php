<?= $this->extend('layout') ?> <?= $this->section('content') ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Profil Pengguna</h1>
    </div>

    <section class="section profile">
        <div class="card">
            <div class="card-body pt-3">
                <h5 class="card-title">Detail Informasi Session</h5>
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8"><?= $username ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Role</div>
                    <div class="col-lg-9 col-md-8"><span class="badge bg-primary"><?= $role ?></span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $emaill ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Waktu Login</div>
                    <div class="col-lg-9 col-md-8"><?= $waktu_login ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Status Login</div>
                   <div class="col-lg-9 col-md-8 text-success"><strong><?= $status ?></strong></div>
                </div>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection() ?>
