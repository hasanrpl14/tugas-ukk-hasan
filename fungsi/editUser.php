<?php 
// edit produk/barang
include "../koneksi.php";

if(isset($_POST)){
    $npl = $_POST['NamaPelanggan'];
    $notlp = $_POST['NomorTelepon'];
    $almt = $_POST['Alamat'];
    $idpl = $_POST['idpl'];// id produk

    $username = $_POST['NamaUser'];
    $password = $_POST['Password'];
    $nama = $_POST['Nama'];
    $level = $_POST['level'];
    $iduser = $_POST['iduser'];// id produk


    $update = mysqli_query($c, "UPDATE user SET username='$username', password='$password', nama='$nama', level='$level' WHERE IdUser='$iduser'"); // stok
    // $hapus = mysqli_query($c, "DELETE FROM detailpenjualan WHERE ProdukID='$idpr' AND DetailID='$idp'");// hapus

    if($update){
        // header('location:../view.php?idp='.$idp);
        header('location:../user.php');

    } else {
        echo '
        <script>alert("gagal edit user");
        window.location.href="../user.php"
        </script>
        ';
    }
}

?>