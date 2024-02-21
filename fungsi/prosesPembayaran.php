<?php 
// koneksi database
include '../koneksi.php';

if(isset($_POST['prosesdetailpesanan'])){
    $idp = $_POST['idp'];
    $ProdukID = $_POST['idpr'];
    $JumlahProduk = $_POST['qty'];
    $Harga = $_POST['harga'];
    $iddp = $_POST['iddp'];
    $idp = $_POST['idp']; // id penjualan
    $PelangganID = $_POST['idpel'];
    $Subtotal = $JumlahProduk * $Harga;

    $insert = mysqli_query($c, "UPDATE penjualan SET Subtotal='$Subtotal', JumlahProduk='$JumlahProduk' where DetailID='$iddp'");
    // mysqli_query($koneksi,"update produk set Stok='$Stok_total' where ProdukID='$ProdukID'");
    if($insert){
        header('location:../view.php?idp='.$idp);
    } else {
        // echo '
        // <script>alert("Stok barang tidak cukup");
        // window.location.href="../view.php?idp='.$idp.'"
        // </script>
        // ';

        header('location:../view.php?idp='.$idp);
    }
}


?>