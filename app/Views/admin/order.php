<?= $this->extend('admin/template'); ?>

<?= $this->section('admin'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-8">
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        </div>
        <?php if (session()->get('level') == 2) : ?>
            <div class="col-4">
                <a href="<?= base_url() ?>/produk" class="btn btn-primary" style="float: right;">Back to Shopping</a>
            </div>
        <?php endif; ?>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= (session()->get('level') == 1) ? 'Data Orderan' : 'Riwayat Orderan' ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <?php $i = 1 ?>
                    <?php if (session()->get('level') == 1) : ?>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">Kode Order</th>
                                <th scope="col">Total Item</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Status Order</th>
                                <th scope="col">Diorder pada</th>
                                <th scope="col">Lainnya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $p['nama'] ?></td>
                                    <td><?= $p['code'] ?></td>
                                    <td><?= $p['total_item'] ?></td>
                                    <td>Rp. <?= $p['total_biaya'] ?></td>
                                    <td><?= $p['payment_method'] ?></td>
                                    <td><?= $p['status_order'] ?></td>
                                    <td><?= $p['created_at'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>/Penjual/detail/<?= $p['code'] ?>">
                                            <button type="button" class="btn btn-info">Detail</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php elseif (session()->get('level') == 2) : ?>
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Order</th>
                                    <th scope="col">Total Item</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Metode Pembayaran</th>
                                    <th scope="col">Status Order</th>
                                    <th scope="col">Diorder pada</th>
                                    <th scope="col">Lainnya</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php foreach ($order as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $p['code'] ?></td>
                                    <td><?= $p['total_item'] ?></td>
                                    <td>Rp. <?= $p['total_biaya'] ?></td>
                                    <td><?= $p['payment_method'] ?></td>
                                    <td><?= $p['status_order'] ?></td>
                                    <td><?= $p['created_at'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>/produk/detail/<?= $p['code'] ?>">
                                            <button type="button" class="btn btn-info">Detail</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endsection() ?>