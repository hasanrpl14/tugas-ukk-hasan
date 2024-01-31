<?php 
// edit data barang masuk

include "../koneksi.php";

if(isset($_POST['editdatabarangmasuk'])){
    $qty = $_POST['qty'];
    $idm = $_POST['idm'];  // id masuk
    $idp = $_POST['idp'];  // id produk

    //cari tau qty / jumlah produknya berapa sekarang
    $caritahu = mysqli_query($c, "SELECT * FROM masuk WHERE IDMasuk='$idm'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $qtysekarang = $caritahu2['JumlahProduk'];

    //cari stok sekarang berapa
    //cari tau qty / jumlah produknya berapa sekarang
    $caristock = mysqli_query($c, "SELECT * FROM produk WHERE ProdukID='$idp'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['Stok'];




    if($qty >= $qtysekarang){
        //kalau inputan lebih bessar daripada jumlah produk(qty) yang tercatat
        //hitung selisih
        $selisih = $qty-$qtysekarang;
        $newstock = $stocksekarang+$selisih;

        $query1 = mysqli_query($c, "UPDATE masuk SET JumlahProduk='$qty' WHERE IDMasuk='$idm'"); // stok
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

    } else {
        // kalau lebih kecil 
        //hitung selisih
        $selisih = $qtysekarang-$qty;
        $newstock = $stocksekarang-$selisih;

        $query1 = mysqli_query($c, "UPDATE masuk SET JumlahProduk='$qty' WHERE IDMasuk='$idm'"); // stok
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

    
}

?>