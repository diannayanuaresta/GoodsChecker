<?php
require 'functions.php';
$dataBarangMasuk = query("SELECT * FROM barang_in");
$dataBarangKeluar = query("SELECT * FROM barang_out");
$bahanMentah = mysqli_query($conn, "SELECT * FROM barang_in WHERE 'kode_barang' = 'bahan mentah'");
$produkJadi = mysqli_query($conn, "SELECT * FROM barang_in WHERE 'kode_barang' = 'produk jadi'");

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
  <nav>
    <ul>
      <li><a href="#1"><img src="assets/images/icon-1.png" alt=""> <em>Homepage</em></a></li>
      <li><a href="#2"><img src="assets/images/icon-2.png" alt=""> <em>Controlling</em></a></li>
    </ul>
  </nav>

  <div class="slides">
    <div class="slide" id="1">
      <div class="content second-content">
        <div class="row">
          <div class="col-lg-4 text-white">
            <h1 style="font-size: 55px "><b>Sistem <br>Pengecekan Barang</b></h1><br>
          </div>
          <div class="col-lg-8 col-sm-d-none">
            <div id='tabs'>
              <ul>
                <li><a href='#tabs-1'><span class='fa fa-users'></span></a></li>
                <li><a href='#tabs-2'><span class='fa fa-send'></span></a></li>
              </ul>
              <section class='tabs-content'>
                <article id='tabs-1'>
                  <h2>Administrator</h2>
                  <p><b> Name        : Felix Christian Santoso</b></p>
                  <p><b> NIM         : E12.2020.01430</b></p>
                  <p><b> Kelompok    : 	E125307</b></p>
                  <p><b> Mata Kuliah : 	Programa Komputer </b></p>
                </article>
                <article id='tabs-2'>
                  <h2>Fungsional</h2>
                  <p><b>- Penambahan barang masuk</b></p>
                  <p><b>- Pengeditan barang masuk</b></p>
                  <p><b>- Penghapusan barang masuk</b></p>
                  <p><b>- Pencatatan pengeluaran barang sudah tercatat masuk</b></p>
                  <p><b>- Penghapusan history barang keluar sekaligus memulihkan catatan barang yang masuk sebelumnya</b></p>
                </article>


              </section>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="slide" id="2">
      <div id="slider-wrapper">
        <div id="image-slider">
          <ul>
            <li class="active-img">
              <div class="container" style="margin-left:15%; max-width: 90%; width: 80%;">
                <h2 style="font-size: 40px; color: white; padding-top: 5%; margin-left: 15%;">Barang Masuk</h2>
                <a href="tambahData.php">
                  <button type="button" class="btn btn-warning" style="margin-left: 15%;">Tambahkan Data
                    Barang Masuk </button>
                </a>
                <br>
                <table class="table table-hover table-dark" style="margin-top: 3%;">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Type</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataBarangMasuk as $in) : ?>
                      <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $in['nama_barang']; ?></td>
                        <td><?= $in['kode_barang']; ?></td>
                        <td><?= $in['quantity']; ?></td>
                        <td><?= $in['price']; ?></td>
                        <td><?= $in['keterangan']; ?></td>
                        <td><a href="tambahDataKeluar.php?id=<?= $in['id'] ?>">Barang Keluar |</a><a href="EditData.php?id=<?= $in['id'] ?>"> Edit |</a> <a href="hapusData.php?id=<?= $in['id'] ?>"> Hapus</a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </li>
            <li>
              <div class="container" style="margin-left:15%; max-width: 90%; width: 80%;">
                <h2 style="font-size: 40px; color: white; padding-top: 5%; margin-left: 15%;">Barang Keluar</h2>
                <br>
                <br>
                <table class="table table-hover table-dark" style="margin-top: 3%;">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Type</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataBarangKeluar as $out) : ?>
                      <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $out['nama_barang']; ?></td>
                        <td><?= $out['kode_barang']; ?></td>
                        <td><?= $out['quantity']; ?></td>
                        <td><?= $out['price']; ?></td>
                        <td><?= $out['keterangan']; ?></td>
                        <td><a href="hapusDataKeluar.php?id=<?= $out['id'] ?>"> Hapus</a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </li>
          </ul>
        </div>
        <div id="thumbnail">
          <ul>
            <li class="active"><img src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/64/000000/external-box-logistics-delivery-icongeek26-linear-colour-icongeek26-1.png" />
            </li>
            </li>
            <li><img src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/64/000000/external-goods-airport-icongeek26-linear-colour-icongeek26.png" />
            </li>
          </ul>
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