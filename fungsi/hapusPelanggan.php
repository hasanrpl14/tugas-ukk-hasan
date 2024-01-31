<?php 
// edit produk/barang
include "../koneksi.php";

if(isset($_POST)){
    $idpl = $_POST['idpl'];// id produk

    // $hapus = mysqli_query($c, "DELETE FROM detailpenjualan WHERE ProdukID='$idpr' AND DetailID='$idp'");// hapus
    $hapus = mysqli_query($c, "DELETE FROM pelanggan WHERE PelangganID='$idpl'");// hapus


    if($hapus){
        // header('location:../view.php?idp='.$idp);
        header('location:../pelanggan.php');

    } else {
        echo '
        <script>alert("gagal hapus barang");
        window.location.href="../pelanggan.php"
        </script>
        ';
    }
}

?>