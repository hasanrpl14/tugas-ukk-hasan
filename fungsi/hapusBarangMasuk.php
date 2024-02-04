<?php 
// hapus data barang masuk
include "../koneksi.php";

if(isset($_POST['hapusdatabarangmasuk'])){
    $idp = $_POST['idp'];// id produk
    $idm = $_POST['idm'];// id masuk

    //cari tau qty / jumlah produknya berapa sekarang
    $caritahu = mysqli_query($c, "SELECT * FROM masuk WHERE IDMasuk='$idm'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $qtysekarang = $caritahu2['JumlahProduk'];

    //cari stok sekarang berapa
    //cari tau qty / jumlah produknya berapa sekarang
    $caristock = mysqli_query($c, "SELECT * FROM produk WHERE ProdukID='$idp'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['Stok'];


    // else {
        // kalau lebih kecil 
        //hitung selisih
        // $selisih = $qtysekarang-$qty;
        $newstock = $stocksekarang-$qtysekarang;

        $query1 = mysqli_query($c, "DELETE FROM masuk WHERE IDMasuk='$idm'"); // stok
        $query2 = mysqli_query($c, "UPDATE produk SET Stok='$newstock' WHERE ProdukID='$idp'"); // stok
        // $hapus = mysqli_query($c, "DELETE FROM detailpenjualan WHERE ProdukID='$idpr' AND DetailID='$idp'");// hapus
    
            if($query1&&$query2){
                // header('location:../view.php?idp='.$idp);
                header('location:../masuk.php');
    
            } else {
                echo '
                <script>alert("gagal edit barang");
                window.location.href="../masuk.php"
                </script>
                ';
            }
}

?>