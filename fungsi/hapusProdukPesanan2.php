<?php 
// hapus produk pesanan
include "../koneksi.php";

if(isset($_POST['hapusprodukpesanan2'])){
    // $idp = $_POST['idp'];//id detail penjualan
    $idpr = $_POST['idpr'];// id produk
    $idp = $_POST['idorder'];// id penjualan/pesanan

    // cek jumlah sekarang
    $cek1 = mysqli_query($c, "SELECT * FROM transaksi WHERE TransaksiID='$idp'");
    $cek2 = mysqli_fetch_array($cek1);
    $qtysekarang = $cek2['JumlahProduk'];

    // cek stok sekarang
    $cek3 = mysqli_query($c, "SELECT * FROM produk WHERE ProdukID='$idpr'");
    $cek4 = mysqli_fetch_array($cek3);
    $stocksekarang = $cek4['Stok'];

    $hitung = $stocksekarang+$qtysekarang;

    $update = mysqli_query($c, "UPDATE produk SET Stok='$hitung' WHERE ProdukID='$idpr'"); // stok
    $hapus = mysqli_query($c, "DELETE FROM transaksi WHERE ProdukID='$idpr' AND TransaksiID='$idp'");// hapus

    if($update && $hapus){
        // header('location:../view.php?idp='.$idp);
        header('location:../order2.php');

    } else {
        echo '
        <script>alert("gagal menghapus barang");
        window.location.href="../order2.php"
        </script>
        ';
    }
}


?>