<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?= $title; ?></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Buah Sayurta Store" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="<?= base_url() ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap css -->
    <link href="<?= base_url() ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="<?= base_url() ?>/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="<?= base_url() ?>/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <!-- <link href="/css/keranjang.css" rel="stylesheet" type="text/css" media="all" /> -->
    <!-- menu style -->
    <!-- //Custom-Files -->

    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //web fonts -->
    <style>
        .eky {
            font-size: 13px;
            color: #fff;
            background: #0879c9;
            text-decoration: none;
            border: none;
            border-radius: 0;
            width: 100%;
            text-transform: uppercase;
            padding: 13px;
            outline: none;
            letter-spacing: 1px;
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.45);
            font-weight: 600;
            cursor: pointer;
            border-radius: 4px;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
            -ms-transition: 0.5s all;
        }
    </style>
</head>

<body>
    <!-- top-header -->

    <div class="agile-main-top">
        <div class="container-fluid">
            <div class="row main-top-w3l py-2">
                <div class="col-lg-4 header-most-top">
                    <p class="text-white text-lg-left text-center">Buah Sayurta Store <em class="fas fa-shopping-cart ml-1"></em> </p>
                </div>
                <div class="header-right mt-lg-0 mt-2 col-lg-8">
                    <!-- header lists -->

                    <ul>
                        <li class="text-center border-right text-white">
                            <a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
                                <em class="fas fa-fw fa-map-marker mr-2"></em> Pilih Lokasi
                            </a>
                        </li>
                        <?php if (session()->has('email')) : ?>
                            <li class="text-center border-right text-white">
                                <a href="<?= base_url('profile') ?>" class="text-white">
                                    <i class="fas fa-fw fa-user"></i> Hy, <?= $user['nama']; ?> </a>
                            </li>
                            <li class="text-center text-white">
                                <a href="<?= base_url('/Auth/logout') ?>" style="color: aliceblue;">
                                    <i class="fas fa-fw fa-sign-out-alt mr-2"></i>Log Out</a>
                            </li>
                        <?php else : ?>
                            <li class="text-center border-right text-white">
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                                    <i class="fas fa-fw fa-sign-in-alt mr-2"></i> Log In </a>
                            </li>
                            <li class="text-center text-white">
                                <a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
                                    <i class="fas fa-fw fa-plus-square"></i> Register </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <!-- //header lists -->
                </div>
            </div>
        </div>
    </div>


    <!-- Button trigger modal(select-location) -->
    <div id="small-dialog1" class="mfp-hide">
        <div class="select-city">
            <h3>
                <i class="fas fa-map-marker"></i> Pilih Lokasimu</h3>
            <select class="list_of_cities">
                <optgroup label="Provinsi">
                    <option selected style="display:none;color:#eee;">Pilih Provinsi</option>
                    <option>Sultra</option>
                    <option>Sulsel</option>
                </optgroup>

            </select>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //shop locator (popup) -->

    <!-- modals -->
    <!-- register -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('/Auth/registration') ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label class="col-form-label">Your Name</label>
                            <input type="text" class="form-control" placeholder=" " id="name" name="name" required value="<?= old('name'); ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder=" " id="email" name="email" required value="<?= old('email'); ?>">
                            <div class="invalid-feedback">Email sudah ada cok</div>

                        </div>
                        <div class="col-form-label">
                            Mendaftar Sebagai
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="level" class="custom-control-input" value="1" required>
                            <label class="custom-control-label" for="customRadioInline1">Penjual</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="level" class="custom-control-input" value="2" required>
                            <label class="custom-control-label" for="customRadioInline2">Pembeli</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " id="password1" name="password1" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder=" " id="password2" name="password2" required>
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing2" required>
                                <label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
                            </div>
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="minicarts-empty-text">
                            Login dulu bossqu!
                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal" role="button">Log In</a>
                        </p><br>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- log in -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('/Auth/login') ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " id="email" name="email" required value="<?= old('email'); ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " id="password" name="password" required>
                        </div>
                        <div class="right-w3l">
                            <form action="#" method="POST">
                                <input type="submit" class="form-control" value="Log in">
                                <input type="hidden" name="id_user" value="<?= $user['id'] ?>" />
                            </form>
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                            </div>
                        </div>
                        <p class="text-center dont-do mt-3">Don't have an account?
                            <a href="#" data-toggle="modal" data-target="#exampleModal2">
                                Register Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal -->
    <!-- //top-header -->

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="container alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('order')) : ?>
        <div class="container alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('order'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('berhasil')) : ?>
        <div class="container alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('berhasil'); ?>
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal" role="button">Log In</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- header-bottom-->
    <div class="header-bot">
        <div class="container">
            <div class="row header-bot_inner_wthreeinfo_header_mid">
                <!-- logo -->
                <div class="col-md-3 logo_agile col-lg-12">
                    <h1 class="text-center"> <a href="<?= base_url() ?>" class="font-weight-bold font-italic">~ Buah Sayurta ~</a></h1>
                </div>
                <!-- //logo -->
                <!-- header-bot -->
                <!-- <div class="col-md-9 header mt-4 mb-md-0 mb-4 col-lg-1">
                <div class="row"> -->
                <!-- search -->
                <!-- <div class="col-10 agileits_search  offset-lg-0 col-lg-10">
                        <form class="form-inline" action="#" method="post">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>
                            <button class="btn my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div> -->
                <!-- //search -->
                <!-- cart details -->
                <!-- //cart details -->
                <!-- </div>
            </div> -->
            </div>
        </div>
    </div>
    <!-- shop locator (popup) -->
    <!-- //header-bottom -->
    <?php if ($user['level_id'] == 1) : ?>
        <hr>
    <?php else : ?>
        <!-- navigation -->
        <div class="navbar-inner">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="agileits-navi_search">
                        <a style="color: black;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" style="width: 200px;">
                            <div class="agile_inner_drop_nav_info p-3">
                                <div class="row">
                                    <div class="col-sm-6 multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            <!-- Tulis Option disini Bangsat -->
                                            <li>
                                                <a href="<?= base_url() ?>/produk">All Categories</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url() ?>/produk/buah">BUAH</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url() ?>/produk/sayur">SAYUR</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto text-center mr-xl-5">
                            <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                                <a class="nav-link" style="color: black;" href="<?= base_url() ?>">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                                <a class="nav-link" style="color: black;" href="<?= base_url() ?>/Produk">Produk
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li></li>

                        </ul>
                        <?php if (session()->has('email')) : ?>
                            <div class="top_nav_right text-center mt-sm-0 mt-2">
                                <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                                    <form action="<?= base_url() ?>/produk/checkout" method="post" class="last">
                                        <button class="btn" type="submit" name="submit" value="">
                                            <i class="fas fa-cart-arrow-down fa-2x"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php else : ?>
                            <button data-toggle="modal" data-target="#exampleModal3" class="btn" type="button">
                                <i class="fas fa-cart-arrow-down fa-2x"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </div>
        <!-- //navigation -->
    <?php endif; ?>

    <?= $this->renderSection('content'); ?>

    <!-- footer -->
    <footer>
        <div class="footer-top-first"> </div>
        <!-- footer third section -->
        <div class="w3l-middlefooter-sec">
            <div class="container py-md-5 py-sm-4 py-3">
                <div class="row footer-info w3-agileits-info">
                    <!-- footer categories -->
                    <div class="col-md-3 col-sm-6 footer-grids col-lg-6">
                        <h3 class="text-white font-weight-bold mb-3">Categories</h3>
                        <ul>
                            <li class="mb-3">
                                <a href="product.html">Buah </a>
                            </li>
                            <li class="mb-3">
                                <a href="product.html">Sayur</a>
                            </li>
                            <li class="mb-3">
                                <a href="product.html">Alat-Pertanian</a>
                            </li>
                        </ul>
                    </div>
                    <!-- //footer categories -->
                    <!-- quick links -->


                    <div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4 col-lg-6">
                        <!-- newsletter -->

                        <form action="#" method="post">
                        </form>
                        <!-- //newsletter -->
                        <!-- social icons -->
                        <div class="footer-grids  w3l-socialmk mt-3">
                            <h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
                            <div class="social">
                                <ul>
                                    <li>
                                        <a class="icon fb" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="icon tw" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="icon gp" href="#">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- //social icons -->
                    </div>
                </div>
                <!-- //quick links -->
            </div>
        </div>
        <!-- //footer third section -->

        <!-- footer fourth section -->

        </div>
        <!-- //footer fourth section (text) -->
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="copy-right py-3">
        <div class="container">
            <p class="text-center text-white">© 2020 Buah Sayurta Store. All rights reserved | Design by
                <a href="http://w3layouts.com"> PNUP</a>
            </p>
        </div>
    </div>
    <!-- //copyright -->

    <!-- js-files -->
    <!-- jquery -->
    <script src="<?= base_url() ?>/js/jquery-3.4.1.min.js"></script>
    <!-- //jquery -->

    <!-- nav smooth scroll -->

    <!-- <script>
    function delkeranjang() {
        load('/template/delkeranjang');
    }
</script> -->
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //nav smooth scroll -->

    <!-- popup modal (for location)-->
    <script src="<?= base_url() ?>/js/jquery.magnific-popup.js"></script>
    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });
    </script>
    <!-- //popup modal (for location)-->
    <!-- <script>
    $(document).ready(function getkuantitas() {
        for (let i = 0; i <= $("#count"); i++) {
            // var niali = "#value".i;
            alert(i);
        }

    });
    $(document).ready(
        alert("tesssss")
    );
</script> -->
    <!-- cart-js -->
    <script src="<?= base_url() ?>/js/minicart.js"></script>
    <script>
        paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

        paypals.minicarts.cart.on('checkout', function(evt) {
            var items = this.items(),
                len = items.length,
                total = 0,
                i;

            // Count the number of each item in the cart
            for (i = 0; i < len; i++) {
                total += items[i].get('quantity');
            }

            // if (total < 3) {
            //     alert('Anda belum memenuhi minimum order sebanyak 3');
            //     evt.preventDefault();
            // }

            this.destroy();
        });
    </script>
    <!-- //cart-js -->
    <script>
        $("#co-button").click(function() {
            if ($("#co-total_item").val() < 3) {
                alert("Belum memenuhi syaat checkout");
            }
        })
    </script>
    <!-- quantity -->
    <script>
        $('.rem1').ready(function() {
            $('.value-plus').on('click', function() {
                var divUpd = $(this).parent().find('.value'),
                    harga = $('#harga').text(),
                    newVal = parseInt(divUpd.text(), 10) + 1,
                    newHarga = newVal * harga;
                divUpd.text(newVal);
                $('#totHarga').text(newHarga);
                $('#kuantitas').val(newVal);
            });

            $('.value-minus').on('click', function() {
                var divUpd = $(this).parent().find('.value'),
                    harga = $('#harga').text(),
                    newVal = parseInt(divUpd.text(), 10) - 1,
                    newHarga = newVal * harga,
                    totHarga = $('#totHarga'),
                    inVal = $('#kuantitas');
                if (newVal >= 1) divUpd.text(newVal);
                if (newVal >= 1) totHarga.text(newHarga);
                if (newVal >= 1) inVal.val(newVal);
            });
        });
    </script>
    <!--quantity-->
    <!-- <script>
    $(document).ready(function(c) {
        $('.close1').on('click', function(c) {
            $('.rem1').fadeOut('slow', function(c) {
                $('.rem1').remove();
            });
        });
    });
</script>
<script>
    $(document).ready(function(c) {
        $('.close2').on('click', function(c) {
            $('.rem2').fadeOut('slow', function(c) {
                $('.rem2').remove();
            });
        });
    });
</script> -->
    <!-- <script>
    $(document).ready(function(c) {
        $('.close3').on('click', function(c) {
            $('.rem3').fadeOut('slow', function(c) {
                $('.rem3').remove();
            });
        });
    });
</script> -->
    <!-- //quantity -->

    <!-- password-script -->
    <script>
        window.onload = function() {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- //password-script -->

    <!-- imagezoom -->
    <script src="<?= base_url() ?>/js/imagezoom.js"></script>
    <!-- //imagezoom -->

    <!-- flexslider -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/flexslider.css" type="text/css" media="screen" />

    <script src="<?= base_url() ?>/js/jquery.flexslider.js"></script>
    <script>
        // Can also be used with $(document).ready()
        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!-- //FlexSlider-->

    <!-- easy-responsive-tabs -->


    <!-- //credit-card -->

    <!-- scroll seller -->
    <script src="<?= base_url() ?>/js/scroll.js"></script>
    <!-- //scroll seller -->

    <!-- smoothscroll -->
    <script src="<?= base_url() ?>/js/SmoothScroll.min.js"></script>
    <!-- //smoothscroll -->

    <!-- start-smooth-scrolling -->
    <script src="<?= base_url() ?>/js/move-top.js"></script>
    <script src="<?= base_url() ?>/js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->

    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function() {
            /*
            var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear' 
            };
            */
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->

    <!-- for bootstrap working -->
    <script src="<?= base_url() ?>/js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- //js-files -->

    <script>
        $("#selectAddress").change(function() {
            var nilai = $("#selectAddress option:selected").text();
            // alert(nilai);
            $("#addressSelect").val(nilai);
        });
        $("#method").change(function() {
            var nilai = $("#method option:selected").text();
            // alert(nilai);
            $("#methodSelect").val(nilai);
        });
    </script>
</body>

</html>