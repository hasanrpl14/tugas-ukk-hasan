<?php 
// hapus user
include "../koneksi.php";

if(isset($_POST)){
    $iduser = $_POST['iduser'];// id user


    // $hapus = mysqli_query($c, "DELETE FROM detailpenjualan WHERE ProdukID='$idpr' AND DetailID='$idp'");// hapus
    $hapus = mysqli_query($c, "DELETE FROM user WHERE IdUser='$iduser'");// hapus


    if($hapus){
        // header('location:../view.php?idp='.$idp);
        header('location:../user.php');

    } else {
        echo '
        <script>alert("gagal hapus barang");
        window.location.href="../user.php"
        </script>
        ';
    }
}

?>