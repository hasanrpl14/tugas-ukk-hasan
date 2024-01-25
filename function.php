<?php

session_start();

//bikin koneksi
$c = mysqli_connect('localhost','root','','ukk_kasir');




// if(isset($_POST['tambahbarang'])){
//     $namaproduk = $_POST['NamaProduk'];
//     $deskripsi = $_POST['Deskripsi'];
//     $harga = $_POST['Harga'];
//     $stock = $_POST['Stok'];

//     $insert = mysqli_query($c, "INSERT INTO produk (NamaProduk, Deskripsi, Harga, Stok) VALUES ('$namaproduk','$deskripsi','$harga','$stock')");

//     if($insert){
//         echo '
//         <script>alert("Berhasil menambah barang");
//         window.location.href="stock.php"
//         </script>
//         ';
//     } else {
//         echo '
//         <script>alert("Gagal menambah barang baru");
//         window.location.href="stock.php"
//         </script>
//         ';
//     }
// }



// if(isset($_POST['tambahpelanggan'])){
//     $namapelanggan = $_POST['NamaPelanggan'];
//     $notelp = $_POST['NomorTelepon'];
//     $alamat = $_POST['Alamat'];

//     $insert = mysqli_query($c, "INSERT INTO pelanggan (NamaPelanggan, NomorTelepon, Alamat) VALUES ('$namapelanggan','$notelp','$alamat')");

//     if($insert){
//         echo '
//         <script>alert("Berhasil menambah pelanggan baru");
//         window.location.href="pelanggan.php"
//         </script>
//         ';
//     } else {
//         echo '
//         <script>alert("Gagal menambah pelanggan baru");
//         window.location.href="pelanggan.php"
//         </script>
//         ';
//     }
// }


// if(isset($_POST['tambahpesanan'])){
//     // $idpelanggan = $_POST['PelangganID'];
//     $PelangganID = $_POST['PelangganID'];

//     // $insert = mysqli_query($c, "INSERT INTO pesanan (PelangganID) VALUES ('$idpelanggan')");
//     $insert = mysqli_query($c, "INSERT INTO Penjualan (PelangganID) VALUES (' $PelangganID')");

//     if($insert){
//         echo '
//         <script>alert("Berhasil menambah pesanan baru");
//         window.location.href="index.php"
//         </script>
//         ';
//     } else {
//         echo '
//         <script>alert("Gagal menambah pesanan baru");
//         window.location.href="index.php"
//         </script>
//         ';
//     }
// }




// produk di pilih dipesanan/penjualan
// if(isset($_POST['tambahproduk'])){
//     $idproduk = $_POST['ProdukID'];
//     $idp = $_POST['PenjualanID'];
//     $qty = $_POST['JumlahProduk']; // jumlah yang mau di keluarkan

//     // hitung stok sekarang ada berapa
//     $hitung1 = mysqli_query($c,"select * from produk where ProdukID = '$idproduk'");
//     $hitung2 = mysqli_fetch_array($hitung1);
//     $stocksekarang = $hitung2['Stok']; //stok barang saat ini

//     if ($stocksekarang>=$qty){

//         // kurangi stoknya dengan jumlah bbarang yang akan di keluarkan
//         $selisih = $stocksekarang-$qty;

//         //stoknya cukup
//         $insert = mysqli_query($c, "insert into detailpenjualan (PenjualanID,ProdukID,JumlahProduk) values ('$idp','$idproduk','$qty')");
//         if (!$insert) {
//             die('Error inserting product into detailpenjualan: ' . mysqli_error($c));
//         }
        

//         // $update = mysqli_query($c, "update produk set Stok='$selisih' where ProdukID='$idproduk'");
//         $update = mysqli_query($c, "UPDATE produk SET Stok = $selisih WHERE ProdukID = '$idproduk'");
//         if (!$update) {
//             die('Error updating product stock: ' . mysqli_error($c));
//         }

//         if($insert&&$update){
//             header('location:view.php?idp='.$idp);
//         } else {
//             echo '
//             <script>alert("Gagal menambah pesanan baru");
//             window.location.href="view.php?idp='.$idp.'"
//             </script>
//             ';
//         }
//     } else {
//         // stok gak cukup
//         echo '
//             <script>alert("Stok barang tidak cukup");
//             window.location.href="view.php?idp='.$idp.'"
//             </script>
//             ';
//     }
// }

// // menambahkan barang masuk
// if(isset($_POST['barangmasuk'])){
//     $idproduk = $_POST['ProdukID'];
//     $qty = $_POST['JumlahProduk'];

//     $inserbarangmasuk = mysqli_query($c,"INSERT INTO masuk (ProdukID, JumlahProduk) VALUES('$idproduk','$qty')");

//     // if (!$insertbarangmasuk) {
//     //     die('Error inserting masuk into produk: ' . mysqli_error($c));
//     // }

//     if($inserbarangmasuk){
//         header('location:masuk.php');
//     } else {
//         echo '
//         <script>alert("gagal");
//         window.location.href="masuk.php"
//         </script>
//         ';
//     }
// }

?>,