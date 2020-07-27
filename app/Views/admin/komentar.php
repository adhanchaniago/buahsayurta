<?= $this->extend('admin/template'); ?>

<?= $this->section('admin'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= (session()->get('level') == 1) ? 'Komentar Produk' : 'Komentar Anda' ?></h1>
    <?php if ($komentar) : ?>
        <?php foreach ($komentar as $k) : ?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4 mb-3 mt-3 ml-3">
                        <img src="<?= base_url() ?>/images/foto_produk/<?= $k['nama_file'] ?>" alt="" class="card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="card-title">
                                <h5><?= $k['nama_produk'] ?></h5>
                            </div>
                            <hr>
                            <small>Komentar <?= $k['username'] ?> :</small>
                            <p class="card-text"><?= $k['komentar'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <?php if (session()->get('level') == 1) : ?>
            <h3 class="h3 mb-4 text-gray-800">Tidak ada komentar untuk orderan ini</h3>
        <?php else : ?>
            <h3 class="h3 mb-4 text-gray-800">Anda tidak menilai produk dari orderan ini</h3>
        <?php endif; ?>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->

<?= $this->endsection() ?>