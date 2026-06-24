<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 

<div class="container mt-4">

    <?php if (session()->getFlashData('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashData('failed')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('failed') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="mb-3 d-flex gap-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
            Tambah Data
        </button>

        <a class="btn btn-success" target="_blank" href="<?= base_url('produk/download') ?>">
            Download Data
        </a>
    </div>

    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtcs as $index => $produk) : ?>
                <tr>
                    <th scope="row"><?php echo $index + 1 ?></th>
                    <td><?php echo $produk['nama'] ?></td>
                    <td><?php echo $produk['harga'] ?></td>
                    <td><?php echo $produk['jumlah'] ?></td>
                    <td>
                        <?php if ($produk['foto'] != '' and file_exists("img/" . $produk['foto'] . "")) : ?>
                            <img src="<?php echo base_url() . "img/" . $produk['foto'] ?>" width="100">
                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-<?= $produk['id'] ?>">
                            Ubah
                        </button>
                        <a href="<?= base_url('produk/delete/' . $produk['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>

<?= $this->include('produk/modal_add') ?>
<?= $this->include('produk/modal_edit') ?>

<?= $this->endSection() ?>