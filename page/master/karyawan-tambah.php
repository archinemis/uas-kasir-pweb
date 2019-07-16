<!DOCTYPE html>
<?php
  include '../../controller/Karyawan.php';
  session_start();
  if (empty($_SESSION['username'])) {
    header("location:../login.php");
  }

  if(isset($_POST['nama_kar'])){
    $nik          = $_POST['nik'];
    $nama_kar     = $_POST['nama_kar'];
    $alamat_kar   = $_POST['alamat_kar'];
    $nomor_telp   = $_POST['nomor_telp'];
    $tgl_lahir    = $_POST['tgl_lahir'];
    if ($_POST['jk'] == "Laki") {
      $jk = "Laki - Laki";
    }else{
      $jk = "Perempuan";
    }
    $pendidikan   = $_POST['pendidikan'];
    $jabatan      = $_POST['jabatan'];
    $uname        = $_POST['uname'];
    $pass         = $_POST['pass'];
    $m1           = 0;
    $m2           = 0;
    $m3           = 0;
    $t1           = 0;
    $t2           = 0;
    $l1           = 0;
    if (isset($_POST['M1'])) {
      $m1 = 1;
    }else{
      $m1 = 0;
    }
    if (isset($_POST['M2'])) {
      $m2 = 1;
    }else{
      $m2 = 0;
    }
    if (isset($_POST['M3'])) {
      $m3 = 1;
    }else{
      $m3 = 0;
    }
    if (isset($_POST['T1'])) {
      $t1 = 1;
    }else{
      $t1 = 0;
    }
    if (isset($_POST['T2'])) {
      $t2 = 1;
    }else{
      $t2 = 0;
    }
    if (isset($_POST['L1'])) {
      $l1 = 1;
    }else{
      $l1 = 0;
    }
   

    insertKaryawan($nik,$nama_kar,$alamat_kar,$nomor_telp,$tgl_lahir,$jk,$pendidikan,$jabatan,$uname,$pass,$m1,$m2,$m3,$t1,$t2,$l1);
  }

  include '../../controller/Login.php';
  $a = getHakAkses2($_SESSION['username']);
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Master | Tambah Karyawan</title>

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
              <a href="karyawan-main.php" class="dashboard-link" style="color:#fff;">
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
              <a href="supplier-main.php" class="dashboard-link">
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
          <h2 class="judul">Tambah Karyawan</h2>
          <h6 class="breadcumb-sub">
            Master / <a href="karyawan-main.php">Karyawan</a> /
            <a href="">Tambah Karyawan</a>
          </h6>
        </div>
        <div class="col-md-8">
          <div class="card isi-tambah" style="padding-top:30px; padding-bottom:30px">
            <form action="" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">NIK</label>
                  <input
                    type="text"
                    name="nik"
                    class="form-control"
                    placeholder="Masukkan NIK"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="">Nama Karyawan</label>
                  <input
                    type="text"
                    name="nama_kar"
                    class="form-control"
                    placeholder="Nama Karyawan"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">Alamat Karyawan</label>
                  <input
                    type="text"
                    name="alamat_kar"
                    class="form-control"
                    placeholder="Alamat Karyawan"
                  />
                </div>
                <div class="form-group col-md-4">
                  <label for="">Nomor Telepon</label>
                  <input
                    type="text"
                    name="nomor_telp"
                    class="form-control"
                    placeholder="Nomor Telepon"
                  />
                </div>
                <div class="form-group col-md-4">
                <label for="">Tanggal lahir</label>
                <input
                    type="date"
                    name="tgl_lahir"
                    class="form-control"
                    placeholder="Nama Barang"
                />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="">Jenis Kelamin</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="r1" value="Laki">
                    <label class="form-check-label" for="r1">Laki - Laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="r2" value="Perempuan">
                    <label class="form-check-label" for="r2">Perempuan</label>
                  </div>
                </div>
                <div class="form-group col-md-5">
                  <label for="">Pendidikan</label>
                  <select class="form-control" name="pendidikan" required>
                    <option selected disabled>Pilih Pendidikan</option>
                    <?php
                      $kat = array("SD", "SMP", "SMA/SMK", "S1", "S2", "S3");
                      for ($i=0; $i < count($kat); $i++) { 
                        ?>
                          <option value="<?php echo $kat[$i] ?>"><?php echo $kat[$i] ?></option>
                        <?php
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                <label for="">Jabatan</label>
                <select class="form-control" name="jabatan" required>
                    <option selected disabled>Pilih Jabatan</option>
                    <?php
                      $kat = array("Karyawan", "Direktur", "CEO", "CTO", "CMO", "COO");
                      for ($i=0; $i < count($kat); $i++) { 
                        ?>
                          <option value="<?php echo $kat[$i] ?>"><?php echo $kat[$i] ?></option>
                        <?php
                      }
                    ?>
                  </select>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card isi-tambah" style="padding-top:30px; padding-bottom:30px">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Username</label>
                  <input
                    type="text"
                    name="uname"
                    class="form-control"
                    placeholder="Username"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="">Password</label>
                  <input
                    type="password"
                    name="pass"
                    class="form-control"
                    placeholder="Password"
                  />
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group col-md-2">
                  <div class="form-check">
                    <input class="form-check-input" name="M1" type="checkbox" id="M1">
                    <label class="form-check-label" for="M1">
                      M1
                    </label>
                  </div>
                </div>
                <div class="form-group col-md-2">
                  <div class="form-check">
                    <input class="form-check-input" name="M2" type="checkbox" id="M2">
                    <label class="form-check-label" for="M2">
                      M2
                    </label>
                  </div>
                </div>
                <div class="form-group col-md-2">
                  <div class="form-check">
                    <input class="form-check-input" name="M3" type="checkbox" id="M3">
                    <label class="form-check-label" for="M3">
                      M3
                    </label>
                  </div>
                </div>
                <div class="form-group col-md-2">
                  <div class="form-check">
                    <input class="form-check-input" name="T1" type="checkbox" id="T1">
                    <label class="form-check-label" for="T1">
                      T1
                    </label>
                  </div>
                </div>
                <div class="form-group col-md-2">
                  <div class="form-check">
                    <input class="form-check-input" name="T2" type="checkbox" id="T2">
                    <label class="form-check-label" for="T2">
                      T2
                    </label>
                  </div>
                </div>
                <div class="form-group col-md-2">
                  <div class="form-check">
                    <input class="form-check-input" name="L1" type="checkbox" id="L1">
                    <label class="form-check-label" for="L1">
                      L1
                    </label>
                  </div>
                </div>
              </div>
              <button
                type="submit"
                class="btn btn-primary"
                style="width: 60%; height: 40px; margin-top: 20px;"
              >
                <i class="fas fa-plus"></i> Tambah Karyawan
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
