<?php 
// koneksi database
include '../koneksi.php';

if(isset($_POST['prosesdetailpesanan'])){
    $idp = $_POST['idp'];
    $ProdukID = $_POST['idpr'];
    $JumlahProduk = $_POST['qty'];
    $Harga = $_POST['harga'];
    $iddp = $_POST['iddp'];
    $PelangganID = $_POST['idpel'];
    $Subtotal = $JumlahProduk * $Harga;
    $TotalHarga = $_POST['TotalHarga']; // Pastikan ini diambil dari input form

    // Update detailpenjualan
    $insert = mysqli_query($c, "UPDATE detailpenjualan SET Subtotal='$Subtotal', JumlahProduk='$JumlahProduk' WHERE DetailID='$iddp'");
    
    // Hitung kembali total harga dari seluruh detail penjualan
    $detailpenjualan = mysqli_query($c, "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE PenjualanID='$idp'");
    $hasil = mysqli_fetch_assoc($detailpenjualan);
    $totalHarga = $hasil['TotalHarga'];

    // Update penjualan dengan total harga baru
    $update = mysqli_query($c,"UPDATE penjualan SET TotalHarga='$totalHarga' WHERE PenjualanID='$idp'");

    if($insert && $update){
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
