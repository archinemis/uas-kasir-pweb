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
        session_start();
        $_SESSION['a'] = "a";
        header("location:../page/transaksi/penjualan-tabel.php");
    }else{
        echo mysqli_error($con);
    }

?>