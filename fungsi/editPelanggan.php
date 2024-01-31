<?php 
// edit produk/barang
include "../koneksi.php";

if(isset($_POST)){
    $npl = $_POST['NamaPelanggan'];
    $notlp = $_POST['NomorTelepon'];
    $almt = $_POST['Alamat'];
    $idpl = $_POST['idpl'];// id produk


    $update = mysqli_query($c, "UPDATE pelanggan SET NamaPelanggan='$npl', NomorTelepon='$notlp', Alamat='$almt' WHERE PelangganID='$idpl'"); // stok
    // $hapus = mysqli_query($c, "DELETE FROM detailpenjualan WHERE ProdukID='$idpr' AND DetailID='$idp'");// hapus

    if($update){
        // header('location:../view.php?idp='.$idp);
        header('location:../pelanggan.php');

    } else {
        echo '
        <script>alert("gagal edit barang");
        window.location.href="../pelanggan.php"
        </script>
        ';
    }
}

?>