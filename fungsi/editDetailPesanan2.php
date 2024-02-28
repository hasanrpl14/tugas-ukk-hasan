<?php 
// edit data detail pesanan

include "../koneksi.php";

if(isset($_POST['editdetailpesanan2'])){
    $qty = $_POST['qty'];  // id detail penjualan
    $idpr = $_POST['idpr'];  // id produk
    $idp = $_POST['idp'];  // id penjualan / order

    //cari tau qty / jumlah produknya berapa sekarang
    $caritahu = mysqli_query($c, "SELECT * FROM transaksi WHERE TransaksiID='$idp'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $qtysekarang = $caritahu2['JumlahProduk'];

    //cari stok sekarang berapa
    $caristock = mysqli_query($c, "SELECT * FROM produk WHERE ProdukID='$idpr'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['Stok'];

    if($qty > $qtysekarang){
        // Jika jumlah produk yang dimasukkan lebih besar dari jumlah yang sebelumnya

        // Periksa apakah stok mencukupi
        $selisih = $qty - $qtysekarang;
        if($selisih > $stocksekarang) {
            // Jika stok tidak mencukupi, berikan pesan kesalahan
            echo "<script>alert('Stok tidak mencukupi untuk mengubah jumlah produk');</script>";
            echo "<script>window.location.href='../order2.php';</script>";
            exit; // Hentikan eksekusi lebih lanjut
        }

        $newstock = $stocksekarang - $selisih;

    } else {
        // Jika jumlah produk yang dimasukkan lebih kecil dari jumlah yang sebelumnya
        $selisih = $qtysekarang - $qty;
        $newstock = $stocksekarang + $selisih;
    }

    // Update jumlah produk dan stok
    $query1 = mysqli_query($c, "UPDATE transaksi SET JumlahProduk='$qty' WHERE TransaksiID='$idp'");
    $query2 = mysqli_query($c, "UPDATE produk SET Stok='$newstock' WHERE ProdukID='$idpr'");

    if($query1 && $query2){
        header('location:../order2.php');
    } else {
        echo "<script>alert('Gagal mengedit barang');</script>";
        echo "<script>window.location.href='../order2.php';</script>";
    }
}
?>
