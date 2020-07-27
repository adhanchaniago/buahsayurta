<?= $this->extend('admin/template'); ?>

<?= $this->section('admin'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url() ?>/images/default.png" alt="" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Card Title</h5>
                    </div>
                    <p class="card-text"><?= $user['nama'] ?></p>
                    <p class="card-text"><?= $user['email'] ?></p>
                    <?php $date = date("d-m-Y", strtotime($user['created_at'])) ?>
                    <p class="card-text"><small class="text-muted">Member since <?= $date ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endsection() ?>