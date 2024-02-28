<?php 
include '../koneksi.php';

if(isset($_POST['prosesdetailpesanan2'])){
    $idp = $_POST['idp'];
    $ProdukID = $_POST['idpr'];
    $JumlahProduk = $_POST['qty'];
    $Harga = $_POST['harga'];
    $Subtotal = $JumlahProduk * $Harga;
    $TotalHarga = $_POST['TotalHarga'];

    $insert = mysqli_query($c, "UPDATE transaksi SET Subtotal='$Subtotal', JumlahProduk='$JumlahProduk' WHERE TransaksiID='$idp'");
    
    $transaksi = mysqli_query($c, "SELECT SUM(Subtotal) AS TotalHarga FROM transaksi WHERE TransaksiID='$idp'");
    $hasil = mysqli_fetch_assoc($transaksi);
    $totalHarga = $hasil['TotalHarga'];

    $update = mysqli_query($c,"UPDATE transaksi SET TotalHarga='$totalHarga' WHERE TransaksiID='$idp'");

    if($insert && $update){
        header('location:../order2.php');
    } else {
        echo '<script>alert("Terjadi kesalahan. Silakan coba lagi.");
              window.location.href="../order2.php";</script>';
    }
}
?>

