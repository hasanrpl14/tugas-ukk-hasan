<?php

require '../koneksi.php';

// menambahkan barang masuk
if(isset($_POST['barangmasuk'])){
    $idproduk = $_POST['ProdukID'];
    $qty = $_POST['JumlahProduk'];

    $inserbarangmasuk = mysqli_query($c,"INSERT INTO masuk (ProdukID, JumlahProduk) VALUES('$idproduk','$qty')");

    // if (!$insertbarangmasuk) {
    //     die('Error inserting masuk into produk: ' . mysqli_error($c));
    // }

    if($inserbarangmasuk){
        header('location:../masuk.php');
    } else {
        echo '
        <script>alert("gagal");
        window.location.href="../masuk.php"
        </script>
        ';
    }
}


?>