<?php
require 'functions.php';
if (isset($_POST['tambahBarang'])) {
    if (tambahIn($_POST) > 0) {
        echo "<script>
        alert('Data telah ditambahkan');
        document.location.href = 'index.php#2';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan');
        </script>";
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Goods Checker</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>
<!--
Tooplate 2113 Earth
https://www.tooplate.com/view/2113-earth
-->

<body style="background-color: 	rgb(139,69,19);">


    <div class="sequence">

        <div class="seq-preloader">
            <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator">
                <g fill="#F96D38">
                    <path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z" />
                    <path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z" />
                    <path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z" />
                </g>
            </svg>
        </div>

    </div>

    <div class="logo">
        <h1>Goods<br>Checker</h1>
        <h2>GC</h2>
    </div>
    <div class="slides">
        <div class="slide" id="2">
            <div id="slider-wrapper">
                <div id="image-slider">
                    <ul>
                        <li class="active-img">
                            <div class="container" style="margin-left:15%; max-width: 90%; width: 80%;">
                                <br>
                                <form id="contact" action="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>Tambah Barang Masuk</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input name="nama_barang" type="text" class="form-control" placeholder="Nama Barang..." required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <select class="form-control" id="exampleFormControlSelect1" name="kode_barang">
                                                    <option selected disabled>Pilih Jenis Barang :</option>
                                                    <option value="bahan mentah">Bahan Mentah</option>
                                                    <option value="produk jadi">Produk Jadi</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input name="harga_barang" type="number" class="form-control" placeholder="Harga Barang..." required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input name="jumlah_barang" type="number" class="form-control" placeholder="Jumlah Barang..." required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                <textarea name="keterangan" rows="6" class="form-control" id="message" placeholder="Your message..."></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="button" name="tambahBarang">Tambah</button>
                                            </fieldset>
                                        </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="thumbnail">
                    <ul>
                        <li class="active"><img src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/64/000000/external-box-logistics-delivery-icongeek26-linear-colour-icongeek26-1.png" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="slide" id="3">
            <div id="slider-wrapper">
                <div id="image-slider">
                    <div class="container" style="margin-left:15%; max-width: 90%; width: 80%;">
                        <h2 style="font-size: 40px; color: white; padding-top: 5%; margin-left: 15%;">Stock Barang</h2>
                        <br>
                        <table class="table table-hover table-dark" style="margin-top: 3%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Total Quantity</th>
                                    <th scope="col">Harga Masuk Rata-rata</th>
                                    <th scope="col">Harga Keluar Rata-rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>A12</td>
                                    <td>Sepeda Lipat</td>
                                    <td>32</td>
                                    <td>725.000</td>
                                    <td>900.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>A12</td>
                                    <td>Sepeda Lipat</td>
                                    <td>32</td>
                                    <td>725.000</td>
                                    <td>900.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>A12</td>
                                    <td>Sepeda Lipat</td>
                                    <td>32</td>
                                    <td>725.000</td>
                                    <td>900.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>






    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/accordations.js"></script>
    <script src="assets/js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            // navigation click actions 
            $('.scroll-link').on('click', function(event) {
                event.preventDefault();
                var sectionID = $(this).attr("data-id");
                scrollToID('#' + sectionID, 750);
            });
            // scroll to top action
            $('.scroll-top').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            });
            // mobile nav toggle
            $('#nav-toggle').on('click', function(event) {
                event.preventDefault();
                $('#main-nav').toggleClass("open");
            });
        });
        // scroll function
        function scrollToID(id, speed) {
            var offSet = 0;
            var targetOffset = $(id).offset().top - offSet;
            var mainNav = $('#main-nav');
            $('html,body').animate({
                scrollTop: targetOffset
            }, speed);
            if (mainNav.hasClass("open")) {
                mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                mainNav.removeClass("open");
            }
        }
        if (typeof console === "undefined") {
            console = {
                log: function() {}
            };
        }
    </script>

</body>

</html>