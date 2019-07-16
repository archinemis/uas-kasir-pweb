<!DOCTYPE html>
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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Master | Barang</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
    <script>
        var datako = [];
        var datana = [];
        var datasa = [];
        var dataha = [];
        var dataju = [];
        var datato = [];
        function uang(num) {
            return 'Rp' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
        function openini() {

        }
        function addRecord(i) {
            var a, b, c;
            a = document.getElementById('ko' + i).innerHTML;
            b = document.getElementById('na' + i).innerHTML;
            c = document.getElementById('sa' + i).innerHTML;
            d = document.getElementById('ha' + i).innerHTML;
            //window.alert(datako.length);
            document.getElementById('ko').value = a;
            document.getElementById('na').value = b;
            document.getElementById('sa').value = c;
            document.getElementById('ha').value = d;
        }
        function deleteBarang(x) {
            datako.splice(x, 1);
            datana.splice(x, 1);
            datasa.splice(x, 1);
            dataha.splice(x, 1);
            dataju.splice(x, 1);
            datato.splice(x, 1);

            var x="";
            var i;
            for (i = 0; i < datako.length; i++) {
                x += "<tr><td><button type=\"Button\" class=\"btn btn-danger\" data-dismiss=\"modal\" onclick=\"deleteBarang(" + i + ")\"><i class=\"fas fa-trash-alt\"></i></button></td><td>" + datako[i] + "</td><td>" + datana[i] + "</td><td>" + datasa[i] + "</td><td>" + dataha[i] + "</td><td>" + dataju[i] + "</td><td>" + datato[i] + "</td></tr>";
            }

            document.getElementById("isi").innerHTML = "<table class=\"table table-hover\"><thead>" + "<tr><th>Action</th><th>Kode</th><th>Nama</th><th>Satuan</th><th>Jumlah</th><th>Harga Jual</th><th>Total</th></tr>" + "</thead><tbody>" + x + "</tbody></table>";
        }
        function ubahppn() {
            var tot = document.getElementById('total').value;
            var dis = document.getElementById('diskon').value;
            var ppn = document.getElementById('ppn').value;

            if (dis == "") {
                dis = 0;
            }
            var hasil;
            hasil = (Number(tot) * (1 - (Number(dis) / 100))) * (1 + (Number(ppn) / 100));
            document.getElementById('grandtotal').value = Number(hasil);
        }
        function ubahdiskon() {
            var tot = document.getElementById('total').value;
            var dis = document.getElementById('diskon').value;
            var ppn = document.getElementById('ppn').value;
            if (ppn == "") {
                ppn = 0;
            }
            var hasil;
            hasil = (Number(tot) * (1 - (Number(dis) / 100))) * (1 + (Number(ppn) / 100));
            document.getElementById('grandtotal').value = Number(hasil);
        }
        function ubahbayar() {
            var tot = document.getElementById('total').value;
            var dis = document.getElementById('diskon').value;
            var ppn = document.getElementById('ppn').value;
            var bayar = document.getElementById('bayar').value;

            if (dis == "") {
                dis = 0;
            }
            var hasil;
            hasil = (Number(tot) * (1 - (Number(dis) / 100))) * (1 + (Number(ppn) / 100));
            document.getElementById('grandtotal').value = hasil;

            var kembalinya;
            kembalinya = Number(bayar) - hasil;
            document.getElementById('kembalian').value = kembalinya;
        }
        function addBarang() {
            var jum = datako.length;
            var ko1 = document.getElementById('ko').value;
            var na1 = document.getElementById('na').value;
            var sa1 = document.getElementById('sa').value;
            var ha1 = document.getElementById('ha').value;
            var ju1 = document.getElementById('ju').value;
            if (ko1 != "" && na1 != "" && sa1 != "" && ha1 != "" && ju1 != "") {
                datako[jum] = document.getElementById('ko').value;
                datana[jum] = document.getElementById('na').value;
                datasa[jum] = document.getElementById('sa').value;
                dataha[jum] = document.getElementById('ha').value;
                dataju[jum] = document.getElementById('ju').value;

                datato[jum] = Number(document.getElementById('ha').value) * Number(document.getElementById('ju').value);

                var x = "";
                var i;
                var total;
                total = 0;
                for (i = 0; i < datako.length; i++) {
                    x += "<tr><td><button type=\"button\" class=\" btn btn-danger\" data-dismis=\" modal\" onclick=\" deleteBarang(" + i + ")\"><i class=\"fas fa-trash-alt\"></i></button></td><td>" + datako[i] + "</td><td>" + datana[i] + "</td><td>" + datasa[i] + "</td><td>" + dataju[i] + "</td><td>" + dataha[i] + "</td><td>" + datato[i] + "</td></tr>";
                    total = total + datato[i];
                }
                document.getElementById("total").value = total;
                if ((document.getElementById('diskon').value == "0") || (document.getElementById('diskon').value == "")) {
                    document.getElementById('diskon').value == "0";
                }
                if ((document.getElementById('ppn').value == "0") || (document.getElementById('ppn').value == "")) {
                    document.getElementById('ppn').value == "0";
                }
                ubahdiskon();
                ubahppn();
                ubahbayar();

                document.getElementById("isi").innerHTML = "<table class=\"table table-hover\"><thead>" + "<tr><th>Action</th><th>Kode</th><th>Nama</th><th>Satuan</th><th>Jumlah</th><th>Harga Jual</th><th>Total</th></tr>"+"</thead></tbody>"+x+"</tbody></table>";
                document.getElementById("ko").value = "";
                document.getElementById("na").value = "";
                document.getElementById("sa").value = "";
                document.getElementById("ha").value = "";
                document.getElementById("ju").value = "";
                // window.alert(datako);
                document.getElementById("isitabel1").value = datako;
                document.getElementById("isitabel2").value = datana;
                document.getElementById("isitabel3").value = datasa;
                document.getElementById("isitabel4").value = dataha;
                document.getElementById("isitabel5").value = dataju;
                document.getElementById("isitabel6").value = datato;
            } else {
                window.alert("Ada element yang kosong");
            }
        }
    </script>
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
              <a href="penjualan-tabel.php" class="dashboard-link" style="color:#fff;">
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
              <a href="pembelian-tabel.php" class="dashboard-link">
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
          <a class="nav-item nav-link" href="#">Selamat datang  <b><?php echo $_SESSION['nama_kar']; ?></b></a>
        </div>
      </div>
    </nav>

    <div class="container-fluid kontent">
      <div class="row">
        <div class="col-md-12">
          <h2 class="judul">Transaksi Penjualan</h2>
          <h6 class="breadcumb-sub">Master / <a href="">Transaksi Penjualan</a></h6>
        </div>
        </div>
      <div class="row" style="margin-top:1%;">
        <div class="col-md-12">
            <form action="../../controller/Transaksi_penjualan.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <div class="row">
                          <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="tanggan">Tanggal: </label>
                                    <?php
                                        date_default_timezone_set("Asia/Bangkok");
                                    ?>
                                    <input type="date" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal"
                                        value=<?php echo date('Y-m-d');?> required>
                                </div>
                            </div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="kode">Nama</label>
                                    <input type="text" class="form-control" id="namakonsumen" placeholder="Enter nama" name="nama"
                                        require>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="kode">Telp :</label>
                                    <input type="text" class="form-control" id="telp" placeholder="Enter Telp" name="telp" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="kode">Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Enter Alamat" name="alamat"
                                        required>
                                </div>
                            </div>
                            <!-- <div class="col-sm-3"></div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" placeholder="Enter Keterangan" name="keterangan" required>
                                </div>
                            </div>
                            
                            <!-- <div class="col-sm-9"></div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top: 2%; margin-bottom: 2%">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body shadow-sm">
                          <div class="row">
                              <div class="col-sm-1">
                              <div class="form-group">
                                  <button type="button" class="form-control btn btn-primary" data-toggle="modal" data-target="#modalbarang">+</button>
                              </div>
                          </div>

                          <div class="col-sm-2">
                              <div class="form-group">
                                  <input type="text" class="form-control" id="ko" placeholder="Kode" name="ko">

                              </div>
                          </div>

                          <div class="col-sm-2">
                              <div class="form-group">
                                  <input type="text" class="form-control" id="na" placeholder="Nama" name="na">
                              </div>
                          </div>

                          <div class="col-sm-2">
                              <div class="form-group">
                                  <input type="text" class="form-control" id="sa" placeholder="Satuan" name="sa">
                              </div>
                          </div>

                          <div class="col-sm-2">
                              <div class="form-group">
                                  <input type="text" class="form-control" id="ha" placeholder="Harga" name="ha">
                              </div>
                          </div>

                          <div class="col-sm-2">
                              <div class="form-group">
                                  <input type="text" class="form-control" id="ju" placeholder="Jumlah" name="ju">
                              </div>
                          </div>

                          <div class="col-sm-1">
                              <div class="form-group">
                                  <button type="button" class="form-control btn btn-primary" onclick="addBarang()">Add</button>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12" id="isi">

                        <table class="table table-hoover">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>...</th>
                                    <th>...</th>
                                    <th>...</th>
                                    <th>...</th>
                                    <th>...</th>
                                    <th>...</th>
                                    <th>...</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
                  
                  <div class="row" style="margin-bottom:1%">
                    <div class="col-md-12">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="kode">PPN:</label>
                                    <input type="number" class="form-control" id="ppn" placeholder="Enter PPN" name="ppn"
                                        onchange="ubahppn()" required>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="kode">Diskon:</label>
                                    <input type="number" class="form-control" id="diskon" placeholder="Enter Diskon" name="diskon"
                                        onchange="ubahdiskon()" required>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="kode">Total:</label>
                                    <input type="number" class="form-control" id="total" placeholder="Total" data-a-sign="Rp."
                                        data-a-dec="," data-a-sep="." name="total" readonly>
                                </div>
                            </div>
                            <!-- <div class="col-sm-8"></div> -->
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="kode">Grand Total</label>
                                    <input type="number" class="form-control" id="grandtotal" placeholder="Grand Total" name="grandtotal" readonly>
                                </div>
                            </div>
                            <div class="col-sm-5"></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="kode">Bayar</label>
                                    <input type="number" class="form-control" id="bayar" placeholder="Enter Bayar" name="bayar"
                                        onchange="ubahbayar()" required>
                                </div>
                            </div>
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="kode">Kembali</label>
                                    <input type="number" class="form-control" id="kembalian" placeholder="Kembalian"
                                        name="kembalian" readonly>
                                </div>
                            </div>

                            <div class="col-sm-8"></div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <a href="http://localhost/kasir/welcome/masterpenjualan">
                                        <input type="button" class="form-control btn btn-success" id="cancel" name="cancel"
                                            value="Cancel">
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="submit" targer="_blank" class="form-control btn btn-primary" id="save" onclick="saveini()"
                                        name="save" value="Save">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    
                    <input type="text" class="form-control" id="isitabel1" name="isitabel1" readonly hidden>
                    <input type="text" class="form-control" id="isitabel2" name="isitabel2" readonly hidden>
                    <input type="text" class="form-control" id="isitabel3" name="isitabel3" readonly hidden>
                    <input type="text" class="form-control" id="isitabel4" name="isitabel4" readonly hidden>
                    <input type="text" class="form-control" id="isitabel5" name="isitabel5" readonly hidden>
                    <input type="text" class="form-control" id="isitabel6" name="isitabel6" readonly hidden>
            </form>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-md-8">
          <h5 class="judul">Hasil : 4 data</h4>
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
      </div> -->
    </div>

    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <div class="modal fade" id="modalbarang">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Harga Jual</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // $serverName = "localhost";
                                // $username = "root";
                                // $password = "";
                                // $dbname = "kasir";

                                // //Create connection
                                // $conn = mysqli_connect($serverName, $username, $password, $dbname);
                                include '../../config/koneksi.php';
                                $sql = "select * from tb_barang";
                                $result = mysqli_query($con, $sql);
                                $rec = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td id=ko".$rec.">".$row["kode_barang"]."</td>";
                                    echo "<td id=na".$rec.">".$row["nama_barang"]."</td>";
                                    echo "<td id=sa".$rec.">".$row["satuan"]."</td>";
                                    echo "<td id=ha".$rec.">".$row["harga_jual"]."</td>";
                                    echo "<td><button type=\"button\" class=\"btn btn-info\" data-dismiss=\"modal\" onclick=\"addRecord($rec)\">Add</button><td>";
                                    $rec++;
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/popper.min.js"></script>
  </body>
</html>
