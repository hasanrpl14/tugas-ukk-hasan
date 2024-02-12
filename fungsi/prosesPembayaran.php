<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
// $Stok = $_POST['Stok'];
// $idp = $_POST['PenjualanID'];
// $ProdukID = $_POST['idpr'];
// $JumlahProduk = $_POST['qty'];
// $Harga = $_POST['harga'];
// $DetailID = $_POST['iddp'];
// $PelangganID = $_POST['idpel'];
// $Subtotal = $JumlahProduk * $Harga;
// // $Stok_total = $Stok - $JumlahProduk;



// // menginput data ke database

// mysqli_query($c,"update detailpenjualan set Subtotal='$Subtotal', JumlahProduk='$JumlahProduk' where DetailID='$DetailID'");
// // mysqli_query($koneksi,"update produk set Stok='$Stok_total' where ProdukID='$ProdukID'");

// // mengalihkan halaman kembali ke detail penjualan.php
// header('location:../view.php?idp='.$idp);
// echo "DetailID: " . $DetailID;



if(isset($_POST['prosesdetailpesanan'])){
    $idp = $_POST['PenjualanID'];
    $ProdukID = $_POST['idpr'];
    $JumlahProduk = $_POST['qty'];
    $Harga = $_POST['harga'];
    $DetailID = $_POST['iddp'];
    $PelangganID = $_POST['idpel'];
    $Subtotal = $JumlahProduk * $Harga;

    $insert = mysqli_query($c, "UPDATE detailpenjualan SET Subtotal='$Subtotal', JumlahProduk='$JumlahProduk' where DetailID='$DetailID'");
    // mysqli_query($koneksi,"update produk set Stok='$Stok_total' where ProdukID='$ProdukID'");
    if($insert){
        header('location:../view.php?idp='.$idp);
    } else {
        echo '
        <script>alert("Stok barang tidak cukup");
        window.location.href="../view.php?idp='.$idp.'"
        </script>
        ';
    }
}


?>