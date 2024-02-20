<?php 
// hapus Pesanan
include "../koneksi.php";

if(isset($_POST)){
    $ido = $_POST['ido'];// id penjualan dari name / value buton delete hapus pesanan

    $cekdata = mysqli_query($c, "SELECT * FROM detailpenjualan dp WHERE PenjualanID='$ido'");// hapus

    while($ok=mysqli_fetch_array($cekdata)){
        //balikin stok
        $qty = $ok['JumlahProduk'];
        $idproduk = $ok['ProdukID'];
        $iddp = $ok['DetailID'];

         //cari stok sekarang berapa
        //cari tau qty / jumlah produknya berapa sekarang
        $caristock = mysqli_query($c, "SELECT * FROM produk WHERE ProdukID='$idproduk'");
        $caristock2 = mysqli_fetch_array($caristock);
        $stocksekarang = $caristock2['Stok'];

        $newstock = $stocksekarang+$qty;
        
        $queryupdate = mysqli_query($c, "UPDATE produk SET Stok='$newstock' WHERE ProdukID='$idproduk'"); // stok

        //hapus data
        $querydelete = mysqli_query($c, "DELETE FROM detailpenjualan WHERE DetailID='$iddp'"); // stok
    }

    $query= mysqli_query($c, "DELETE FROM penjualan WHERE PenjualanID='$ido'");// hapus

    if($queryupdate && $querydelete && $query){
        header('location:../order.php');
    } else {
        echo '
        <script>alert("gagal hapus pesanan");
        window.location.href="../order.php"
        </script>
        ';
    }
}

?>
