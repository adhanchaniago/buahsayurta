<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>

<?php if ($user['level_id'] == 1) : ?>
    <div class="container">
        <a href="<?= base_url() ?>/penjual" class="btn btn-primary" style="float: right;">Back to Produk</a>
    </div>
<?php endif; ?>
<div class="banner-bootom-w3-agileits py-5">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>S</span>ingle
            <span>P</span>age</h3>
        <!-- //tittle heading -->
        <div class="row">
            <div class="col-lg-5 col-md-8 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="<?= base_url() ?>/images/foto_produk/<?= $produk['nama_file'] ?>">
                                <div class="thumb-image">
                                    <img src="<?= base_url() ?>/images/foto_produk/<?= $produk['nama_file'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
                            </li>
                            <li data-thumb="<?= base_url() ?>/images/foto_produk/<?= $produk['nama_file'] ?>">
                                <div class="thumb-image">
                                    <img src="<?= base_url() ?>/images/foto_produk/<?= $produk['nama_file'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
                            </li>
                            <li data-thumb="<?= base_url() ?>/images/foto_produk/<?= $produk['nama_file'] ?>">
                                <div class="thumb-image">
                                    <img src="<?= base_url() ?>/images/foto_produk/<?= $produk['nama_file'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                <h3 class="mb-3"><?= $produk['nama_produk'] ?></h3>
                <p class="mb-3">
                    <span class="item_price"><?= $produk['harga_produk'] ?></span>
                    <!-- <del class="mx-2 font-weight-light">$280.00</del> -->
                    <!-- <label>Free delivery</label> -->
                </p>
                <div class="single-infoagile">
                    <p class="mb-3"><?= $produk['deskripsi_produk'] ?></p>
                </div>
                <div class="product-single-w3l">
                    <p class="my-3">
                        <i class="far fa-hand-point-right mr-2"></i>
                        <label><?= $produk['status_produk'] ?></label></p>
                    <p class="my-sm-4 my-3">
                        <i class="fas fa-shopping-basket"></i>
                        <label>STOK : <?= $produk['stok'] ?></label>
                    </p>
                </div>
                <?php if ($user['level_id'] == 2) : ?>
                    <div class="occasion-cart">
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <?php if (session()->has('email')) : ?>
                                <form action="#" method="post">
                                    <fieldset>
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="business" value=" " />
                                        <input type="hidden" name="id_user" value="<?= $user['id'] ?>" />
                                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>" />
                                        <input type="hidden" name="item_name" value="<?= $produk['nama_produk'] ?>" />
                                        <input type="hidden" name="amount" value="<?= $produk['harga_produk'] ?>" />
                                        <input type="hidden" name="discount_amount" value="" />
                                        <input type="hidden" name="currency_code" value="IDR" />
                                        <input type="hidden" name="return" value=" " />
                                        <input type="hidden" name="cancel_return" value=" " />
                                        <input type="submit" name="submit" value="Add to cart" class="button btn" />
                                    </fieldset>
                                </form>
                            <?php else : ?>
                                <button data-toggle="modal" data-target="#exampleModal3" class="eky" type="button">
                                    Add to cart
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Komentar Pembeli</h5>
            <div class="card-body">
                <?php foreach ($komentar as $k) : ?>
                    <h5 class="card-title"><?= $k['username'] ?></h5>
                    <p class="card-text"><?= $k['komentar'] ?></p>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- //Single Page -->


<?= $this->endsection(); ?>