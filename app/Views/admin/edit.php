<?= $this->extend('admin/template'); ?>

<?= $this->section('admin'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?php if (session()->getFlashdata('warning')) : ?>
        <div class="container alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('warning'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="col-sm-8">

        <form action="<?= base_url('Penjual/update') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $produk['id'] ?>">
            <input type="hidden" name="kategori" value="<?= $produk['id_kategori'] ?>">
            <input type="hidden" name="slug" value="<?= $produk['slug'] ?>">
            <input type="hidden" name="iduser" value="<?= $produk['id_user'] ?>">
            <input type="hidden" name="fileLama" value="<?= $produk['nama_file'] ?>">
            <div class="form-group row">
                <label for="namaProduk" class="col-sm-4 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="<?= $produk['nama_produk'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="hargaProduk" class="col-sm-4 col-form-label">Harga Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="hargaProduk" name="hargaProduk" value="<?= $produk['harga_produk'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="statusProduk" class="col-sm-4 col-form-label">Status Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="statusProduk" name="statusProduk" value="<?= $produk['status_produk'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-sm-4 col-form-label">Stok Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="stok" name="stok" value="<?= $produk['stok'] ?>" required>
                </div>
            </div>
            <div class=" form-group">
                <label for="deskripsi">Deskripsi Produk</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows=" 3"><?= $produk['deskripsi_produk'] ?></textarea>
            </div>
            <p>Ubah Gambar </p>
            <div class="col-sm-10">
                <div class="col-sm-5">
                    <img src="<?= base_url('images/foto_produk') . "/" . $produk['nama_file'] ?>" alt="" class="img-thumbnail img-preview">
                </div><br>
                <div class="custom-file col-sm-12 in-line">
                    <input type="file" accept="image/*" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="imgPreview()">
                    <label class="custom-file-label" for="foto"><?= $produk['nama_file'] ?></label>
                    <div class="invalid-feedback"><?= $validation->getError('foto') ?></div>
                </div>
            </div><br><br>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endsection() ?>