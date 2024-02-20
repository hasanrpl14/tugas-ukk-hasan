<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$TotalHarga = $_POST['TotalHarga'];
$PelangganID = $_POST['idpel'];
$idp = $_POST['idp'];

// menginput data ke database

$insert = mysqli_query($c,"update penjualan set TotalHarga='$TotalHarga' where PenjualanID='$idp'");

// mengalihkan halaman kembali ke detail_pembelian.php
// header("location:detail_pembelian.php?PelangganID=$PelangganID");
if($insert){
    header('location:../view.php?idp='.$idp);
} else {
    echo '
    <script>alert("gagal simpan");
    window.location.href="../view.php?idp='.$idp.'"
    </script>
    ';
}
?>