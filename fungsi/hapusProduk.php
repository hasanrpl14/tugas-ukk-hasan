<?php 
// edit produk/barang
include "../koneksi.php";

if(isset($_POST)){
    $idp = $_POST['idp'];// id produk

    // $hapus = mysqli_query($c, "DELETE FROM detailpenjualan WHERE ProdukID='$idpr' AND DetailID='$idp'");// hapus
    $hapus = mysqli_query($c, "DELETE FROM produk WHERE ProdukID='$idp'");// hapus


    if($hapus){
        // header('location:../view.php?idp='.$idp);
        header('location:../stok.php');

    } else {
        echo '
        <script>alert("gagal hapus barang");
        window.location.href="../stok.php"
        </script>
        ';
    }
}

?>