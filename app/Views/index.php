<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>

<!-- banner -->
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>P</span>roduk
			<span>H</span>ari
			<span>I</span>ni</h3>
		<!-- //tittle heading -->
		<div class="row">
			<!-- product left -->
			<div class="agileinfo-ads-display col-lg-12">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
						<h3 class="heading-tittle text-center font-italic">Produk Buah Terbaru</h3>
						<?php if ($produkbuah) : ?>
							<div class="row">
								<?php foreach ($produkbuah as $pb) : ?>
									<div class="col-md-4 product-men mt-5">
										<div class="men-pro-item simpleCart_shelfItem">
											<div class="men-thumb-item text-center">
												<!-- tempat Input gambar -->
												<img class="card-img-top" src="<?= base_url() ?>/images/foto_produk/<?= $pb['nama_file'] ?>" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?= base_url() ?>/Produk/<?= $pb['slug'] ?>" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
											</div>
											<div class="item-info-product text-center border-top mt-4">
												<h4 class="pt-1">
													<a href="<?= base_url() ?>/Produk/<?= $pb['slug'] ?>"><?= $pb['nama_produk']; ?></a>
												</h4>
												<div class="info-product-price my-2">
													<span class="item_price"><?= $pb['harga_produk']; ?></span>
													<del>harga-diskon</del>
												</div>
												<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
													<?php if (session()->has('email')) : ?>
														<form action="#" method="post">
															<fieldset>
																<input type="hidden" name="cmd" value="_cart" />
																<input type="hidden" name="add" value="1" />
																<input type="hidden" name="business" value=" " />
																<input type="hidden" name="id_user" value="<?= $user['id'] ?>" />
																<input type="hidden" name="id_produk" value="<?= $pb['id_produk'] ?>" />
																<input type="hidden" name="item_name" value="<?= $pb['nama_produk'] ?>" />
																<input type="hidden" name="amount" value="<?= $pb['harga_produk'] ?>" />
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
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php else : ?>
							<div>
								<br>
								<h4 class="heading-tittle text-center">Tidak ada Buah hari ini</h4>
							</div>
						<?php endif; ?>
					</div>
					<!-- //first section -->
					<!-- second section -->
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
						<h3 class="heading-tittle text-center font-italic">Produk Sayur Terbaru</h3>
						<?php if ($produksayur) : ?>
							<div class="row">
								<?php foreach ($produksayur as $ps) : ?>
									<div class="col-md-4 product-men mt-5">
										<div class="men-pro-item simpleCart_shelfItem">
											<div class="men-thumb-item text-center">
												<img class="card-img-top" src="<?= base_url() ?>/images/foto_produk/<?= $ps['nama_file'] ?>" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?= base_url() ?>/Produk/<?= $ps['slug'] ?>" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
											</div>
											<div class="item-info-product text-center border-top mt-4">
												<h4 class="pt-1">
													<a href="<?= base_url() ?>/Produk/<?= $ps['slug'] ?>"><?= $ps['nama_produk']; ?></a>
												</h4>
												<div class="info-product-price my-2">
													<span class="item_price"><?= $ps['harga_produk']; ?></span>
													<del>harga-diskon</del>
												</div>
												<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
													<?php if (session()->has('email')) : ?>
														<form action="#" method="post">
															<fieldset>
																<input type="hidden" name="cmd" value="_cart" />
																<input type="hidden" name="add" value="1" />
																<input type="hidden" name="business" value=" " />
																<input type="hidden" name="id_user" value="<?= $user['id'] ?>" />
																<input type="hidden" name="id_produk" value="<?= $ps['id_produk'] ?>" />
																<input type="hidden" name="item_name" value="<?= $ps['nama_produk'] ?>" />
																<input type="hidden" name="amount" value="<?= $ps['harga_produk'] ?>" />
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
													</form>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php else : ?>
							<div>
								<br>
								<h4 class="heading-tittle text-center">Tidak ada Sayur hari ini</h4>
							</div>
						<?php endif; ?>
					</div>
					<!-- //second section -->
					<!-- third section -->
					<!-- sapa tahu mauko tambhakan iklan eki gaskan -->
					<!-- //third section -->
					<!-- fourth section -->
					<!-- //fourth section -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->

	<!-- middle section -->

	<!-- middle section -->

	<?= $this->endSection(); ?>