<?php
  include '../../controller/Barang.php';
  session_start();
  if (empty($_SESSION['username'])) {
    header("location:../login.php");
  }

  if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    deleteBarang($id);
  }

  include '../../controller/Login.php';
  $data = getHakAkses2($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Master | Barang</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
  </head>
  <body>
    <!-- kode untuk sidebar (awal) -->
    <div class="sidebar">
      <div class="logo text-center">
        <h2>Kasir<b style="color:#ffc107">Bro</b></h2>
      </div>
      <ul class="list-unstyled">
      <li class="side-link">
          <a href="../../index.php" class="dashboard-link">
            <i class="fas fa-chart-bar" style="margin-right: 10px;"></i>
            Dashboard
          </a>
        </li>
        <li class="side-link" style="margin-top:10px">
          Master
        </li>
        <?php
          if ($data[0]) {
            ?>
            <li class="side-link">
              <a href="../master/barang-main.php" class="dashboard-link">
              <i class="fas fa-box" style="margin-right: 12px;"></i>
                Barang
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-box" style="margin-right: 12px;"></i>
                Barang
              </a>
            </li>
            <?php
          }
          if ($data[1]) {
            ?>
            <li class="side-link">
              <a href="../master/karyawan-main.php" class="dashboard-link">
              <i class="fas fa-id-card-alt" style="margin-right: 11px;"></i>
                Karyawan
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-id-card-alt" style="margin-right: 11px;"></i>
                Karyawan
              </a>
            </li>
            <?php
          }
          if ($data[2]) {
            ?>
            <li class="side-link">
              <a href="../master/supplier-main.php" class="dashboard-link">
              <i class="fas fa-truck-loading" style="margin-right: 10px;"></i>
                Supplier
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-truck-loading" style="margin-right: 10px;"></i>
                Supplier
              </a>
            </li>
            <?php
          }
        ?>
        <li class="side-link" style="margin-top:10px">
          Transaksi
        </li>
        <?php
          if ($data[3]) {
            ?>
            <li class="side-link">
              <a href="../transaksi/penjualan-tabel.php" class="dashboard-link">
              <i class="fas fa-hand-holding-usd" style="margin-right: 12px;"></i>
                Penjualan
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-hand-holding-usd" style="margin-right: 12px;"></i>
                Penjualan
              </a>
            </li>
            <?php
          }
          if ($data[4]) {
            ?>
            <li class="side-link">
              <a href="../transaksi/pembelian-tabel.php" class="dashboard-link">
              <i class="fas fa-shopping-bag" style="margin-right: 15px;"></i>
                Pembelian
              </a>
            </li>
            <?php
          }else{
            ?>  
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-shopping-bag" style="margin-right: 15px;"></i>
                Pembelian
              </a>
            </li>
            <?php
          }
        ?>
        <li class="side-link" style="margin-top:10px">
          Laporan
        </li>
        <?php
          if ($data[5]) {
            ?>
            <li class="side-link">
              <a href="../laporan/laporan-stok.php" class="dashboard-link">
              <i class="fas fa-file-contract" style="margin-right: 17px;"></i>
                Stok
              </a>
            </li>
            <li class="side-link">
              <a href="../laporan/laporan-pembelian.php" class="dashboard-link">
              <i class="fas fa-file-download" style="margin-right: 15px;"></i>
                Pembelian
              </a>
            </li>
            <li class="side-link">
              <a href="../laporan/laporan-penjualan.php" class="dashboard-link" style="color:#fff;">
              <i class="fas fa-file-upload" style="margin-right: 15px;"></i>
                Penjualan
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-file-contract" style="margin-right: 17px;"></i>
                Stok
              </a>
            </li>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-file-download" style="margin-right: 15px;"></i>
                Pembelian
              </a>
            </li>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-file-upload" style="margin-right: 15px;"></i>
                Penjualan
              </a>
            </li>
            <?php
          }
        ?>
      </ul>
          <a href="../../controller/Logout.php" style="position:absolute; bottom:0; margin-bottom:15px; " class="side-link dashboard-link">
          <i class="fas fa-sign-out-alt" style="margin-right: 15px;"></i>
            Logout
          </a>
    </div>
    <!-- kode untuk sidebar (akhir) -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto"></div>
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="#">Selamat datang Denandra</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid kontent">
      <div class="row">
        <div class="col-md-12">
          <h2 class="judul">Laporan Penjualan</h2>
          <h6 class="breadcumb-sub">Laporan / <a href="">Penjualan</a></h6>
        </div>
        <div class="col-md-7">
          <a href="barang-tambah.html">
            <button type="button" class="btn btn-outline-primary">
                <i class="fas fa-print"></i>&nbsp;&nbsp; Print Laporan
            </button>
          </a>
        </div>
        <div class="col-md-5">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fas fa-search"></i></div>
            </div>
            <input
              type="date"
              class="form-control"
              placeholder="Tulis untuk mencari laporan"
            />
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:1%;">
        <div class="col-md-12">
          <table class="table table-hover shadow-sm">
            <thead>
              <tr class="bg-dark" style="color: #fff">
                <th scope="col" width="50">#</th>
                <th scope="col" width="200">Kode Penjualan</th>
                <th scope="col" width="200">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah Dibeli</th>
                <th scope="col">Tanggal Transaksi</th>
              </tr>
            </thead>
            <tbody style="color:rgb(102, 102, 102);">
              <tr>
                <th scope="row">1</th>
                <td>P07052019</td>
                <td>Keju</td>
                <td>Rp 200.000</td>
                <td>340</td>
                <td>5 Mei 2019</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>P07052019</td>
                <td>Coklat</td>
                <td>Rp 60.000</td>
                <td>200</td>
                <td>5 Mei 2019</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>P07052019</td>
                <td>Dompet</td>
                <td>Rp 20.000</td>
                <td>100</td>
                <td>5 Mei 2019</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>P07052019</td>
                <td>Korek</td>
                <td>Rp 90.000</td>
                <td>200</td>
                <td>5 Mei 2019</td> 
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <h5 class="judul">Hasil : 4/4</h4>
        </div>
        <div class="col-md-4">
          <nav aria-label="Page navigation example" style="float:right">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script>
      function tombol() {
        alert("Hapus?");
      }
    </script>
  </body>
</html>
