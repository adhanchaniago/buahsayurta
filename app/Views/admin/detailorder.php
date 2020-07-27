<?= $this->extend('admin/template'); ?>

<?= $this->section('admin'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        </div>
        <div class="col-6">
            <?php if ($alamat['status_order'] == 'Received') : ?>
                <a href="<?= base_url() ?>/<?= (session()->get('level') == 2) ? 'produk/review/' . $alamat['kode_order'] : 'penjual/review/' . $alamat['kode_order']; ?>" class="btn btn-primary" style="float: right;">Lihat penilaian</a>
            <?php endif; ?>
            <?php if (session()->get('level') == 2) : ?>
                <a href="<?= base_url() ?>/produk" class="btn btn-primary mr-3" style="float: right;">Kembali belanja</a>
            <?php endif; ?>
        </div>
    </div>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="container alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('warning')) : ?>
        <div class="container alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('warning'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <h5 class="card-header">Detail Produk</h5>
                <div class="card-body">
                    <?php foreach ($produk as $p) : ?>
                        <div class="card">
                            <div class="card-body">
                                <img src="<?= base_url('images/foto_produk') . '/' . $p['nama_file'] ?>" class="rounded float-left col-sm-6" alt="">
                                <h4 class="card-title"><?= $p['nama_produk'] ?></h4>
                                <p class="card-text">Kuantitas <?= $p['kuantitas'] ?></p>
                                <p class="card-text">Harga Rp.<?= $p['harga_produk'] ?></p>
                                <?php $total = $p['kuantitas'] * $p['harga_produk'] ?>
                                <p class="card-text">Total Rp.<?= $total ?></p>
                            </div>
                            <?php if (session()->get('level') == 2) : ?>
                                <?php if ($alamat['status_order'] == 'Received') : ?>
                                    <?php
                                    $tglOrder = new DateTime($alamat['updated_at']);
                                    $now = new DateTime();
                                    $selisih = date_diff($tglOrder, $now);
                                    ?>
                                    <?php if ($selisih->days < 1) : ?>
                                        <form action="<?= base_url('produk/komentar') . '/' . $p['slug'] ?>" class="container mb-3" method="POST">
                                            <input type="hidden" name="kode_order" id="kode_order" value="<?= $alamat['kode_order'] ?>">
                                            <input type="hidden" name="id_order" id="id_order" value="<?= $alamat['id_order'] ?>">
                                            <input type="hidden" name="id" id="id" value="<?= $p['id_produk'] ?>">
                                            <input type="hidden" name="username" id="username" value="<?= $user['nama'] ?>">
                                            <div class=" form-group">
                                                <label for="deskripsi">Tambahkan Review</label>
                                                <textarea class="form-control mb-3" id="komentar" name="komentar" rows=" 3"></textarea>
                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                <small class="col-sm-10 card-text-right" style="float: right;">Comment form will be expired in a day. You also can change your comment before expired</small>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div><br>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <div id='tesprint'>
                    <h5 class="card-header">Detail Pengiriman</h5>
                    <div class="card-body">
                        <h5 class="card-title"><?= $alamat['nama_penerima'] ?></h5>
                        <h6 class="card-title">No. Hp <?= $alamat['no_hp'] ?></h6>
                        <p class="card-text"><?= $alamat['tipe_alamat'] ?></p>
                        <p class="card-text"><?= $alamat['alamat_lengkap'] . ' - Kode Pos : ' . $alamat['kode_pos'] ?></p>
                        <p class="card-text"><?= 'Kelurahan ' . $alamat['kelurahan'] . ', Kecamatan ' . $alamat['kecamatan'] . ', Kab/Kota ' . $alamat['kota'] . ', Provinsi ' . $alamat['provinsi'] ?></p>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $alamat['payment_method'] ?></h5>
                    <hr>
                    <p class="card-text">Total Item : <?= $alamat['total_item'] ?></p>
                    <p class="card-text">Total Biaya : <?= $alamat['total_biaya'] ?></p>
                    <p class="card-text">Status Order : <?= $alamat['status_order'] ?></p>
                    <?php if (session()->get('level') == 1) : ?>
                        <?php if ($alamat['status_order'] == 'Ordered') : ?>
                            <form action="<?= base_url('penjual/statusorder') ?>" method="POST">
                                <input type="hidden" name="status" value="Preparing">
                                <input type="hidden" name="kode_order" value="<?= $alamat['kode_order'] ?>">
                                <button type="submit" class="btn btn-primary">Process</button>
                            </form>
                        <?php elseif ($alamat['status_order'] == 'Preparing') : ?>
                            <form action="<?= base_url('penjual/statusorder') ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="status" value="Sending">
                                <input type="hidden" name="id" value="<?= $alamat['id_order'] ?>">
                                <p>Pilih Gambar Verifikasi</p>
                                <div class="col-sm-5">
                                    <img src="" alt="" class="img-thumbnail img-preview">
                                </div><br>
                                <div class="custom-file col-sm-12 in-line mb-3">
                                    <input type="file" accept="image/*" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="imgPreview()">
                                    <label class="custom-file-label" for="foto"></label>
                                    <div class="invalid-feedback"><?= $validation->getError('foto') ?></div>
                                </div>
                                <input type="hidden" name="kode_order" value="<?= $alamat['kode_order'] ?>">
                                <button type="submit" class="btn btn-primary">Delivery</button>
                            </form>
                        <?php elseif ($alamat['status_order'] == 'Received') : ?>
                            <p class="card-text">Gambar Verifikasi Orderan :</p>
                            <img src="<?= base_url('images/gambar_verifikasi') . '/' . $foto['nama_file'] ?>" alt="" class="img-thumbnail rounded float-left mb-3"><br><br><br><br><br><br>
                            <div>The orders has received by buyer</div>
                        <?php else : ?>
                            <p class="card-text">Gambar Verifikasi Orderan :</p>
                            <img src="<?= base_url('images/gambar_verifikasi') . '/' . $foto['nama_file'] ?>" alt="" class="img-thumbnail rounded float-left mb-3"><br><br><br><br><br><br>
                            <div>The Orders are on shipping </div>
                        <?php endif; ?>
                    <?php elseif (session()->get('level') == 2) : ?>
                        <?php if ($alamat['status_order'] == 'Sending') : ?>
                            <p class="card-text">Gambar Verifikasi Orderan :</p>
                            <img src="<?= base_url('images/gambar_verifikasi') . '/' . $foto['nama_file'] ?>" alt="" class="img-thumbnail rounded float-left mb-3"><br><br><br><br><br><br>
                            <form action="<?= base_url('produk/statusorder') ?>" method="POST">
                                <input type="hidden" name="status" value="Received">
                                <input type="hidden" name="kode_order" value="<?= $alamat['kode_order'] ?>">
                                <button type="submit" class="btn btn-primary">Has Received</button>
                            </form>
                        <?php else : ?>
                            <p class="card-text">Gambar Verifikasi Orderan :</p>
                            <img src="<?= base_url('images/gambar_verifikasi') . '/' . $foto['nama_file'] ?>" alt="" class="img-thumbnail rounded float-left mb-3"><br><br><br><br><br><br>
                            <div>Your Orders are <?= $alamat['status_order'] ?> </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endsection() ?>