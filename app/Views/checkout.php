<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>

<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>heckout
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
                <span id="count">
                    <div id="countt" class="d-inline tes"><?= count($keranjang) ?></div>
                    Products
                </span>
            </h4>

            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php $totall = 0; ?>
                        <?php foreach ($keranjang as $k) : ?>
                            <tr class="rem1">
                                <td class="invert"><?= $i++ ?></td>
                                <td class="invert-image">
                                    <a href="<?= base_url() ?>/Produk/<?= $k['slug'] ?>">
                                        <img src="<?= base_url() ?>/images/foto_produk/<?= $k['nama_file'] ?>" alt=" " class="img-responsive" style="width: 300px;">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <!-- <div class="entry value-minus">&nbsp;</div> -->
                                            <div class="entry value">
                                                <span><?= $k['kuantitas'] ?></span>
                                            </div>
                                            <!-- <div class="entry value-plus active">&nbsp;</div> -->
                                        </div>
                                    </div>
                                </td>
                                <td class="invert"><?= $k['nama_produk'] ?></td>
                                <td class="invert">Rp.
                                    <div id="harga" class="d-inline">
                                        <span><?= $k['harga_produk'] ?></span>
                                    </div>
                                </td>
                                <?php $total = $k['harga_produk'] * $k['kuantitas'] ?>
                                <?php $totall += $total ?>
                                <td class="invert">Rp.
                                    <div class="d-inline" id="totHarga">
                                        <span><?= $total ?></span>
                                    </div>
                                </td>
                                <td class="invert">
                                    <div class="rem">
                                        <form action="<?= base_url() ?>/Produk/sure/<?= $k['kode'] ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name='_method' value="DELETE">
                                            <button type="submit" class="btn" style="color: crimson;">
                                                <i class="fas fa-trash-alt fa-2x"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table><br>
                <h4 class="mb-sm-4 mb-3">Price Detail :</h4>
                <div class="container col-7" style="float: left; font-weight: bold;">
                    <div class="row mb-4">
                        <div class="col-4"> Total Pembelian </div>
                        <div class="col-3">Rp. <?= $totall ?> </div><br>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4"> Ongkos Kirim </div>
                        <div class="col-3" style="color: dimgrey;"> Free </div><br>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4"> Diskon </div>
                        <div class="col-3">-</div><br>
                    </div>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-4"> Total Pembayaran </div>
                        <div class="col-3"><?= $totall ?></div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url() ?>/produk" class="btn btn-primary" style="float: right;">Back to Shopping</a>
            <div class="checkout-left">
                <div class="address_form_agile mt-sm-5 mt-4">
                    <h4 class="mb-sm-4 mb-3">
                        Add a new Details
                    </h4>
                    <form action="<?= base_url() ?>/produk/order" method="post" class="creditly-card-form agileinfo_form">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_user" id="co-id_user" value="<?= $user['id'] ?>">
                        <?php $i = 1; ?>
                        <?php $totitem = 0; ?>
                        <?php foreach ($keranjang as $k) : ?>
                            <?php $id = $i++ ?>
                            <input type="hidden" name="id_penjual_<?= $id ?>" id="co-id_penjual" value="<?= $k['id_user'] ?>">
                            <input type="hidden" name="id_produk_<?= $id ?>" id="co-id_produk" value="<?= $k['id_produk'] ?>">
                            <input type="hidden" name="kuantitas_<?= $id ?>" id="co-kuantitas" value="<?= $k['kuantitas'] ?>">
                            <?php $totitem += $k['kuantitas'] ?>
                        <?php endforeach; ?>
                        <input type="hidden" name="total_item" id="co-total_item" value="<?= $totitem ?>">
                        <input type="hidden" name="total_biaya" id="co-total_biaya" value="<?= $totall ?>">
                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row">
                                    <div class="controls form-group">
                                        <input class="billing-address-name form-control" type="text" name="nama_lengkap" placeholder="Nama Lengkap" required="">
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_hp" maxlength="13" required="">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat_lengkap" required="">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Kode POS" name="kode_pos" maxlength="5" required="">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Kelurahan" name="kelurahan" required="">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan" required="">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Kabupaten / Kota" name="kota" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls form-group">
                                        <input type="text" class="form-control" placeholder="Provinsi" name="provinsi" required="">
                                    </div>
                                    <div class="controls form-group">
                                        <select class="option-w3ls" id="selectAddress">
                                            <option>Select Address type</option>
                                            <option>Office</option>
                                            <option>Home</option>
                                            <option>Commercial</option>
                                        </select>
                                    </div>
                                    <input type="hidden" id="addressSelect" name="adrressSelect">
                                    <div class="controls form-group" id="method" required>
                                        <select class="option-w3ls">
                                            <option>Select Payment method</option>
                                            <option>Cash on Delivery</option>
                                            <option disabled>Bank Transfer</option>
                                            <option disabled>Virtual Account</option>
                                        </select>
                                    </div>
                                    <input type="hidden" id="methodSelect" name="methodSelect">
                                </div>
                                <button class="submit check_out btn" id="co-button">Check Out Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //checkout page -->


    <!-- <script>
    $(document).ready(function getkuantitas() {
        for (let i = 0; i <= $("count"); i++) {
            alert($("value".i).text());
        }

    });
    $(document).ready(
        alert("tesssss")
    )
</script> -->

    <?= $this->endsection(); ?>