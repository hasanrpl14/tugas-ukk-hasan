<?php 
// edit data detail pesanan

include "../koneksi.php";

if(isset($_POST['editdetailpesanan'])){
    $qty = $_POST['qty'];
    $iddp = $_POST['iddp'];  // id detail penjualan
    $idpr = $_POST['idpr'];  // id produk
    $idp = $_POST['idp'];  // id penjualan / order

    //cari tau qty / jumlah produknya berapa sekarang
    $caritahu = mysqli_query($c, "SELECT * FROM detailpenjualan WHERE DetailID='$iddp'");
    $caritahu2 = mysqli_fetch_array($caritahu);
    $qtysekarang = $caritahu2['JumlahProduk'];

    //cari stok sekarang berapa
    //cari tau qty / jumlah produknya berapa sekarang
    $caristock = mysqli_query($c, "SELECT * FROM produk WHERE ProdukID='$idpr'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['Stok'];

    if($qty >= $qtysekarang){
        //kalau inputan lebih besar daripada jumlah produk(qty) yang tercatat
        //hitung selisih
        
        $selisih = $qty-$qtysekarang;
        $newstock = $stocksekarang-$selisih;

        $query1 = mysqli_query($c, "UPDATE detailpenjualan SET JumlahProduk='$qty' WHERE DetailID='$iddp'"); // stok
        $query2 = mysqli_query($c, "UPDATE produk SET Stok='$newstock' WHERE ProdukID='$idpr'"); // stok

        $insert = mysqli_query($c, "UPDATE penjualan SET Subtotal='$Subtotal', JumlahProduk='$JumlahProduk' where DetailID='$iddp'");

        if($query1 && $query2 && $insert){
            header('location:../view.php?idp='.$idp);

    } else {
        echo "
        <script>alert('gagal edit barang');
        window.location.href='../view.php?idp=".$idp."';
        </script>
        ";
    }
    
    } else {
        // kalau lebih kecil 
        //hitung selisih
        $selisih = $qtysekarang-$qty;
        $newstock = $stocksekarang+$selisih;

        $query1 = mysqli_query($c, "UPDATE detailpenjualan SET JumlahProduk='$qty' WHERE DetailID='$iddp'");// stok
        $query2 = mysqli_query($c, "UPDATE produk SET Stok='$newstock' WHERE ProdukID='$idpr'"); // stok
    
        if($query1 && $query2){
            header('location:../view.php?idp='.$idp);

        } else {
            echo '
            <script>alert("gagal edit barang");
            window.location.href="../view.php?idp='.$idp.'";
            </script>
            ';
        }
    
    }
}
?>
