<?php

require '../koneksi.php';

if(isset($_POST['tambahpesanan'])){
    // $idpelanggan = $_POST['PelangganID'];
    $PelangganID = $_POST['PelangganID'];

    // $insert = mysqli_query($c, "INSERT INTO pesanan (PelangganID) VALUES ('$idpelanggan')");
    $insert = mysqli_query($c, "INSERT INTO Penjualan (PelangganID) VALUES (' $PelangganID')");

    if($insert){
        echo '
        <script>alert("Berhasil menambah pesanan baru");
        window.location.href="../order.php"
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal menambah pesanan baru");
        window.location.href="order.php"
        </script>
        ';
    }
}


?>