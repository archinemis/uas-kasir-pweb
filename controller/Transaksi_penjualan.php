<?php
    include '../config/koneksi.php';
    date_default_timezone_set("Asia/Bangkok");
    $kodetr=date("Ymd.His"); //kode tr
    $tanggal=$_POST['tanggal'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $keterangan=$_POST['keterangan'];
    $total=$_POST['total'];
    $diskon=$_POST['diskon'];
    $ppn=$_POST['ppn'];
    $grandtotal=$_POST['grandtotal'];
    $bayar=$_POST['bayar'];
    $kembalian=$_POST['kembalian'];
    $array1 = explode(",",$_POST['isitabel1']); //kode
    $array2 = explode(",",$_POST['isitabel2']); //nama
    $array3 = explode(",",$_POST['isitabel3']); //satuan
    $array4 = explode(",",$_POST['isitabel4']); //harga jual
    $array5 = explode(",",$_POST['isitabel5']); //jumlah
    $array6 = explode(",",$_POST['isitabel6']); //harga total
    $i = 0;
    // looping untuk detil penjualan
    foreach ($array1 as $key) {
        $query = "INSERT INTO tb_detail_penjualan VALUES(
            NULL,
            '$kodetr',
            '$array1[$i]',
            '$array2[$i]',
            '$array3[$i]',
            '$array5[$i]',
            '$array4[$i]',
            '$array6[$i]')";

        $insert_detil = mysqli_query($con, $query);
        $i++;
    }
    //insert ke tb_penjualan
    $query2 = "INSERT INTO tb_penjualan VALUES('$kodetr','$nama','$alamat','$telp','$keterangan','$total','$ppn','$diskon','$grandtotal')";
    $insert_penjualan = mysqli_query($con, $query2);

    if ($insert_detil && $insert_penjualan) {
        // echo "SUKSES";
    }else{
        echo mysqli_error($con);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .atas{
            /* background-color:#455a64; */
            text-align:center;
        }
        .judul-invoice{
            font-family: 'Pacifico', cursive;
        }
    </style>
</head>
<body>
    <div class="container atas">
        <!-- ======================================================================================= <br> -->
        <br>
        <h2 class="judul-invoice">Kasir<b style="color:#ffc107">Bro</b></h2>
        JL. SEMAMPIR TENGAH 8A NO 12<br>
        SURABAYA, 60119 <br>
        +62 8950 777 3113 <br>
        ============================================================= <br>
    </div>
    <div class="container" style="padding-left: 180px; padding-right: 60px;">
        <div class="row">
            <div class="col-md-8">
                10 Juli 2019 00:49:45
            </div>
            <div class="col-md-4">
                Kasir - Denandra
            </div>
        </div>
    </div>
    <div class="container">
        <center>=============================================================</center>
    </div>
    <div class="container" style="padding-left: 180px; padding-right: 60px; text-align:left">
        <div class="row">
            <?php
                $i = 0;
                foreach ($array1 as $k) {
            ?>
                <div class="col-md-4">
                    <?php echo $array2[$i] ?>
                </div>
                <div class="col-md-2">
                    <?php echo $array5[$i] ?>
                </div>
                <div class="col-md-2">
                    <?php echo $array4[$i] ?>
                </div>
                <div class="col-md-2">
                    <?php echo $array6[$i] ?>
                </div>
            <?php
                $i++;
                }
            ?>
        </div>
    </div>
    <div class="container">
        <center>=============================================================</center>
    </div>
    <div class="container" style="padding-left: 180px; padding-right: 60px; text-align:left">
        <div class="row">
            <div class="col-md-4">
                Total
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                <?php echo number_format($grandtotal) ?>
            </div>
            <div class="col-md-4">
                Tunai
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                <?php echo number_format($grandtotal) ?>
            </div>
            <div class="col-md-4">
                Kembali
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                Rp 850.000
            </div>
            <div class="col-md-4">
                Diskon
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                5%
            </div>
            <div class="col-md-4">
                PPN
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                2%
            </div>
        </div>
    </div>
    <div class="container">
        <br>
        <center>======= Terimakasih & Selamat Belanja Kembali =======</center>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>