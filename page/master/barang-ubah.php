<!DOCTYPE html>
<?php
  include '../../controller/Barang.php';
  session_start();
  if (empty($_SESSION['username'])) {
    header("location:../login.php");
  }

  $id = $_GET['id_barang'];

  $data = getDataBarang($id);

  if (isset($_POST['nm_barang'])) {
    $kode = $_POST['kd_barang'];
    $nama = $_POST['nm_barang'];
    $kategori_brg = $_POST['kategori_brg'];
    $stok_barang = $_POST['stok_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    updateBarang($kode,$nama,$kategori_brg,$stok_barang,$harga_beli,$harga_jual);
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
              <a href="barang-main.php" class="dashboard-link" style="color:#fff;">
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
          <h2 class="judul">Ubah Barang</h2>
          <h6 class="breadcumb-sub">
            Master / <a href="barang-main.php">Barang</a> /
            <a href="">Ubah Barang</a>
          </h6>
        </div>
        <div class="col-md-12">
          <div class="card isi-tambah" style="padding-top:30px; padding-bottom:30px">
            <form action="" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Kode Barang</label>
                  <input
                    type="text"
                    name="kd_barang"
                    class="form-control"
                    value="<?php echo $id ?>"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="">Nama Barang</label>
                  <input
                    type="text"
                    name="nm_barang"
                    class="form-control"
                    placeholder="Nama Barang"
                    value="<?php echo $data[1] ?>"
                  />
                </div>
                <div class="form-group col-md-3">
                  <label>Kategori Barang</label>
                  <select class="form-control" name="kategori_brg" required>
                    <?php
                      $kat = array("Barang Elektronik", "Barang Rumah Tangga", "Komponen Komputer/Laptop", "Makanan", "Minuman", "Buku");
                      for ($i=0; $i < count($kat); $i++) { 
                        if ($kat[$i] == $data[3]) {
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
                <div class="form-group col-md-3">
                  <label for="">Satuan Barang</label>
                  <input
                    type="text"
                    name="stok_barang"
                    class="form-control"
                    placeholder="Satuan Barang"
                    value="<?php echo $data[2] ?>"
                    required
                  />
                </div>
                <div class="form-group col-md-3">
                  <label for="">Harga Beli</label>
                  <input
                    type="text"
                    name="harga_beli"
                    class="form-control"
                    placeholder="Harga Barang"
                    value="<?php echo $data[4] ?>"
                    required
                  />
                </div>
                <div class="form-group col-md-3">
                  <label for="">Harga Jual</label>
                  <input
                    type="text"
                    name="harga_jual"
                    class="form-control"
                    placeholder="Harga Barang"
                    value="<?php echo $data[5] ?>"
                    required
                  />
                </div>
              </div>
              <button
                type="submit"
                class="btn btn-primary"
                style="width: 20%; height: 40px; margin-top: 20px;"
              >
                <i class="fas fa-edit"></i> Ubah Barang
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
