<?php 
// edit produk/barang
include "../koneksi.php";

if(isset($_POST)){
    $np = $_POST['NamaProduk'];
    $desk = $_POST['Deskripsi'];
    $harga = $_POST['Harga'];
    $idp = $_POST['idp'];// id produk


    $update = mysqli_query($c, "UPDATE produk SET NamaProduk='$np', Deskripsi='$desk', Harga='$harga' WHERE ProdukID='$idp'"); // stok
    // $hapus = mysqli_query($c, "DELETE FROM detailpenjualan WHERE ProdukID='$idpr' AND DetailID='$idp'");// hapus

    if($update){
        // header('location:../view.php?idp='.$idp);
        header('location:../stok.php');

    } else {
        echo '
        <script>alert("gagal edit barang");
        window.location.href="../stok.php"
        </script>
        ';
    }
}

?>