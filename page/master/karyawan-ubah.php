<!DOCTYPE html>
<?php
  include '../../controller/Karyawan.php';
  session_start();
  if (empty($_SESSION['username'])) {
    header("location:../login.php");
  }
  $nik = $_GET['nik'];
  
  $data = getDataKaryawan($nik);

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

    updateKaryawan($nik,$nama_kar,$alamat_kar,$nomor_telp,$tgl_lahir,$jk,$pendidikan,$jabatan);
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
              <a href="transaksi-penjualan.php" class="dashboard-link">
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
              <a href="transaksi-pembelian.php" class="dashboard-link">
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
              <a href="laporan-stok.php" class="dashboard-link">
              <i class="fas fa-file-contract" style="margin-right: 17px;"></i>
                Stok
              </a>
            </li>
            <li class="side-link">
              <a href="laporan-pembelian.php" class="dashboard-link">
              <i class="fas fa-file-download" style="margin-right: 15px;"></i>
                Pembelian
              </a>
            </li>
            <li class="side-link">
              <a href="laporan-penjualan.php" class="dashboard-link">
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
          <a class="nav-item nav-link" href="#">Selamat datang Denandra</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid kontent">
      <div class="row">
        <div class="col-md-12">
          <h2 class="judul">Ubah Karyawan</h2>
          <h6 class="breadcumb-sub">
            Master / <a href="karyawan-main.html">Karyawan</a> /
            <a href="">Ubah Karyawan</a>
          </h6>
        </div>
        <div class="col-md-12">
          <div class="card isi-tambah" style="padding-top:30px; padding-bottom:30px">
          <form action="" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">NIK</label>
                  <input
                    type="text"
                    name="aaa"
                    class="form-control"
                    placeholder="Masukkan NIK"
                    value="<?php echo $nik ?>"
                    disabled
                  />
                  <input type="hidden"
                    name="nik"
                    value="<?php echo $nik ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Nama Karyawan</label>
                  <input
                    type="text"
                    name="nama_kar"
                    class="form-control"
                    placeholder="Nama Karyawan"
                    value="<?php echo $data[1] ?>"
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
                    value="<?php echo $data[2] ?>"
                  />
                </div>
                <div class="form-group col-md-4">
                  <label for="">Nomor Telepon</label>
                  <input
                    type="text"
                    name="nomor_telp"
                    class="form-control"
                    placeholder="Nomor Telepon"
                    value="<?php echo $data[3] ?>"
                  />
                </div>
                <div class="form-group col-md-4">
                <label for="">Tanggal lahir</label>
                <input
                    type="date"
                    name="tgl_lahir"
                    class="form-control"
                    value="<?php echo $data[4] ?>"
                />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <?php
                    if ($data[5] == "L") {
                      ?>
                        <label for="">Jenis Kelamin</label>
                        <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jk" id="r1" value="Laki" checked>
                          <label class="form-check-label" for="r1">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jk" id="r2" value="Perempuan">
                          <label class="form-check-label" for="r2">Perempuan</label>
                        </div>
                      <?php
                    }else{
                      ?>
                        <label for="">Jenis Kelamin</label>
                        <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jk" id="r1" value="Laki">
                          <label class="form-check-label" for="r1">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jk" id="r2" value="Perempuan" checked>
                          <label class="form-check-label" for="r2">Perempuan</label>
                        </div>
                      <?php
                    }
                  ?>
                </div>
                <div class="form-group col-md-5">
                  <label for="">Pendidikan</label>
                  <select class="form-control" name="pendidikan" required>
                    <!-- <option selected disabled>Pilih Pendidikan</option> -->
                    <?php
                      $kat = array("SD", "SMP", "SMA/SMK", "S1", "S2", "S3");
                      for ($i=0; $i < count($kat); $i++) { 
                        if ($kat[$i] == $data[6]) {
                          ?>
                            <option selected value="<?php echo $kat[$i] ?>"><?php echo $kat[$i] ?></option>
                          <?php
                        }else{
                          ?>
                            <option value="<?php echo $kat[$i] ?>"><?php echo $kat[$i] ?></option>
                          <?php
                        }
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
                        if ($kat[$i] == $data[7]) {
                          ?>
                            <option selected value="<?php echo $kat[$i] ?>"><?php echo $kat[$i] ?></option>
                          <?php
                        }else{
                          ?>
                            <option value="<?php echo $kat[$i] ?>"><?php echo $kat[$i] ?></option>
                          <?php
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <button
                type="submit"
                class="btn btn-primary"
                style="width: 20%; height: 40px; margin-top: 20px;"
              >
                <i class="fas fa-edit"></i> Tambah Karyawan
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
