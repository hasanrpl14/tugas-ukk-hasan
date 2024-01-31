<?php 
// hapus produk pesanan
include "../koneksi.php";

if(isset($_POST['hapusprodukpesanan'])){
    $idp = $_POST['idp'];//id detail penjualan
    $idpr = $_POST['idpr'];// id produk
    $idorder = $_POST['idorder'];// id penjualan/pesanan

    // cek jumlah sekarang
    $cek1 = mysqli_query($c, "SELECT * FROM detailpenjualan WHERE DetailID='$idp'");
    $cek2 = mysqli_fetch_array($cek1);
    $qtysekarang = $cek2['JumlahProduk'];

    // cek stok sekarang
    $cek3 = mysqli_query($c, "SELECT * FROM produk WHERE ProdukID='$idpr'");
    $cek4 = mysqli_fetch_array($cek3);
    $stocksekarang = $cek4['Stok'];

    $hitung = $stocksekarang+$qtysekarang;

    $update = mysqli_query($c, "UPDATE produk SET Stok='$hitung' WHERE ProdukID='$idpr'"); // stok
    $hapus = mysqli_query($c, "DELETE FROM detailpenjualan WHERE ProdukID='$idpr' AND DetailID='$idp'");// hapus

    if($update && $hapus){
        // header('location:../view.php?idp='.$idp);
        header('location:../view.php?idp='.$idorder);

    } else {
        echo '
        <script>alert("gagal menghapus barang");
        window.location.href="../view.php?idp='.$idorder.'"
        </script>
        ';
    }
}


?>