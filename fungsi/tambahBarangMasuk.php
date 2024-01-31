<?php
require '../koneksi.php';

// menambahkan barang masuk
if(isset($_POST['barangmasuk'])){
    $idproduk = $_POST['ProdukID'];
    $qty = $_POST['JumlahProduk'];

    // Masukkan data barang masuk ke tabel 'masuk'
    $insertbarangmasuk = mysqli_query($c,"INSERT INTO masuk (ProdukID, JumlahProduk) VALUES('$idproduk','$qty')");

    // Update stok barang di tabel 'produk'
    $updateStok = mysqli_query($c, "UPDATE produk SET Stok = Stok + $qty WHERE ProdukID = '$idproduk'");

    if($insertbarangmasuk && $updateStok){
        header('location:../masuk.php');
    } else {
        echo '
        <script>alert("Gagal menambahkan barang masuk");
        window.location.href="../masuk.php"
        </script>
        ';
    }
}
?>
