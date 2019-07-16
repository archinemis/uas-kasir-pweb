<!DOCTYPE html>
<?php
  include '../../controller/Supplier.php';
  session_start();
  if (empty($_SESSION['username'])) {
    header("location:../login.php");
  }

  $id = $_GET['id'];

  $data = getDataSupplier($id);

  if (isset($_POST['nm_supp'])) {
    $kd_supp = $_POST['kd_supp'];
    $nm_supp = $_POST['nm_supp'];
    $nm_per = $_POST['nm_per'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $no_telp = $_POST['no_telp'];
    $no_hand = $_POST['no_hand'];
    $email = $_POST['email'];
    $keterangan = $_POST['keterangan'];

    updateSupplier($kd_supp,$nm_supp,$nm_per,$alamat,$kota,$no_telp,$no_hand,$email,$keterangan);
  }

  include '../../controller/Login.php';
  $a = getHakAkses2($_SESSION['username']);
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Master | Tambah Barang</title>

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
          if ($a[0]) {
            ?>
            <li class="side-link">
              <a href="barang-main.php" class="dashboard-link">
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
          if ($a[1]) {
            ?>
            <li class="side-link">
              <a href="karyawan-main.php" class="dashboard-link">
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
          if ($a[2]) {
            ?>
            <li class="side-link">
              <a href="supplier-main.php" class="dashboard-link" style="color:#fff;">
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
          if ($a[3]) {
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
          if ($a[4]) {
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
          if ($a[5]) {
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
              <a href="../laporan/laporan-penjualan.php" class="dashboard-link">
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
          <a href="../../controller/Logout.php" style="position:absolute; bottom:0; margin-bottom:15px;" class="side-link dashboard-link">
          <i class="fas fa-sign-out-alt" style="margin-right: 15px;"></i>
            Logout
          </a>
    </div>
    <!-- kode untuk sidebar (akhir) -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto"></div>
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="#">Selamat datang  <b><?php echo $_SESSION['nama_kar']; ?></b></a>
        </div>
      </div>
    </nav>

    <div class="container-fluid kontent">
      <div class="row">
        <div class="col-md-12">
          <h2 class="judul">Tambah Supplier</h2>
          <h6 class="breadcumb-sub">
            Master / <a href="supplier-main.php">Supplier</a> /
            <a href="">Tambah Supplier</a>
          </h6>
        </div>
        <div class="col-md-12">
          <div class="card isi-tambah" style="padding-top:30px; padding-bottom:30px">
            <form action="" method="POST">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">Kode Supplier</label>
                  <input
                    type="text"
                    name="asd"
                    class="form-control"
                    placeholder="Kode Supplier"
                    value="<?php echo kode_sup() ?>"
                    disabled
                  />
                  <input 
                    type="hidden"
                    name="kd_supp"
                    value="<?php echo $data[0] ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                  <label for="">Nama Supplier</label>
                  <input
                    type="text"
                    name="nm_supp"
                    class="form-control"
                    placeholder="Nama Supplier"
                    value="<?php echo $data[1] ?>"
                  />
                </div>
                <div class="form-group col-md-4">
                  <label for="">Nama Perusahaan</label>
                  <input
                    type="text"
                    name="nm_per"
                    class="form-control"
                    placeholder="Nama Perusahaan"
                    value="<?php echo $data[2] ?>"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Alamat</label>
                  <input
                    type="text"
                    name="alamat"
                    class="form-control"
                    placeholder="Alamat Supplier"
                    value="<?php echo $data[3] ?>"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="">Kota</label>
                  <input
                    type="text"
                    name="kota"
                    class="form-control"
                    placeholder="Kota Supplier"
                    value="<?php echo $data[4] ?>"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">Nomor Telepon</label>
                  <input
                    type="text"
                    name="no_telp"
                    class="form-control"
                    placeholder="Nomor Telepon"
                    value="<?php echo $data[5] ?>"
                  />
                </div>
                <div class="form-group col-md-4">
                  <label for="">Nomor Handphone</label>
                  <input
                    type="text"
                    name="no_hand"
                    class="form-control"
                    placeholder="Nomor Handphone"
                    value="<?php echo $data[6] ?>"
                  />
                </div>
                <div class="form-group col-md-4">
                  <label for="">Email</label>
                  <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Email Supplier"
                    value="<?php echo $data[7] ?>"
                  />
                </div>
              </div>
              <div class="form-group">
                <label for="">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="" cols="5" rows="5" placeholder="Keterangan Supplier"><?php echo $data[8] ?></textarea>
              </div>
              <button
                type="submit"
                class="btn btn-primary"
                style="width: 20%; height: 40px; margin-top: 20px;"
              >
                <i class="fas fa-plus"></i> Edit Supplier
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/popper.min.js"></script>
  </body>
</html>
