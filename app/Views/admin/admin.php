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

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="container alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <a a class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambah" role="button">+ Produk</a>
    <hr>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Gambar Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Status Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Ditambahkan Pada</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($produk as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $p['nama_kategori'] ?></td>
                                <td class="invert-image">
                                    <a href="<?= base_url('penjual') . '/single/' . $p['slug'] ?>">
                                        <img src="<?= base_url() ?>/images/foto_produk/<?= $p['nama_file'] ?>" alt=" " class="img-responsive" style="width: 100px;">
                                    </a>
                                </td>
                                <td><?= $p['nama_produk'] ?></td>
                                <td><?= $p['harga_produk'] ?></td>
                                <td><?= $p['status_produk'] ?></td>
                                <td><?= $p['deskripsi_produk'] ?></td>
                                <td><?= $p['stok'] ?></td>
                                <td><?= $p['created_at'] ?></td>
                                <td>
                                    <a href="<?= base_url() ?>/penjual/edit/<?= $p['slug'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?= base_url() ?>/Penjual/sure/<?= $p['slug'] ?>" method="post" class="inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name='_method' value="DELETE">
                                        <button type="submit" class="btn" style="color: crimson;" onclick="return confirm('Sure to Delete?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Tambah Modal -->
<div class="modal" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>/penjual/tambah" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="iduser" value="<?= $user['id'] ?>">
                    <div class="col-form-label">
                        Pilih Jenis Produk
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="kategori" class="custom-control-input" value="1" required>
                        <label class="custom-control-label" for="customRadioInline1">Buah</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="kategori" class="custom-control-input" value="2" required>
                        <label class="custom-control-label" for="customRadioInline2">Sayur</label>
                    </div>
                    <div class="form-group">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" placeholder="Buah Sayuran" value="<?= old('namaProduk'); ?>" required>
                    </div>
                    <div class=" form-group">
                        <label for="hargProduk">Harga Produk</label>
                        <input type="text" class="form-control" id="hargaProduk" name="hargaProduk" placeholder="15000" value="<?= old('hargaProduk'); ?>" required>
                    </div>
                    <div class=" form-row">
                        <div class="form-group col-md-6">
                            <label for="statusProduk">Status Produk</label>
                            <input type="text" class="form-control" id="statusProduk" name="statusProduk" placeholder="Ready" value="<?= old('statusProduk'); ?>" required>
                        </div>
                        <div class=" form-group col-md-6">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="100" value="<?= old('stok'); ?>" required>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="deskripsi">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>" rows=" 3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Pilih Gambar Produk</label>
                        <input type="file" accept="image/*" class="form-control-file <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" required>
                        <div class="invalid-feedback"><?= $validation->getError('foto') ?></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
<?= $this->endsection() ?>