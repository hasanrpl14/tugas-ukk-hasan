<?php
session_start();

// Include file koneksi.php
require '../koneksi.php';
$c = mysqli_connect('localhost','root','','ukk_kasir');


function simpanPembayaranKeDatabase($c, $totalBelanja, $jumlahUangDiberikan, $kembalian, $idp, $idpr, $qty, $subtotal, $TotalHarga) {
    // Query SQL untuk menyimpan data pembayaran dan kembalian ke dalam database
    $query = "INSERT INTO detailpenjualan (UangPembayaran, Kembalian, PenjualanID, ProdukID, JumlahProduk, Subtotal) 
              VALUES ('$jumlahUangDiberikan', '$kembalian', '$idp', '$idpr', '$qty', '$subtotal')";

    // Jalankan query
    $result = $c->query($query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Update total harga di tabel penjualan
        $updateTotalHarga = mysqli_query($c, "UPDATE penjualan SET TotalHarga='$TotalHarga' WHERE PenjualanID='$idp'");
        // Periksa apakah update berhasil
        if ($updateTotalHarga) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


// Proses pengiriman data pembayaran dan kembalian
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Terima input total belanjaan, jumlah uang yang diberikan, dan ID penjualan dari form
    $totalBelanja = $_POST['total'];
    $jumlahUangDiberikan = $_POST['bayar'];
    $idp = $_POST['idp'];
    $idpr = $_POST['ProdukID'];
    $qty = $_POST['JumlahProduk'];
    $subtotal = $_POST['SubTotal'];
    $TotalHarga = $_POST['TotalHarga'];

    // Hitung kembalian
    $kembalian = $jumlahUangDiberikan - $totalBelanja;

    // Periksa apakah uang yang diberikan kurang dari total belanjaan
    if ($jumlahUangDiberikan < $totalBelanja) {
        $_SESSION['pesan'] = "Uang yang diberikan kurang dari total belanjaan.";
        // Redirect kembali ke halaman view
        header('location:../view.php?idp='.$idp);
        exit();
    }

    // Panggil fungsi untuk menyimpan data pembayaran ke dalam database
    // $simpanPembayaran = simpanPembayaranKeDatabase($c, $totalBelanja, $jumlahUangDiberikan, $kembalian, $idp, $idpr, $qty, $subtotal);
    $simpanPembayaran = simpanPembayaranKeDatabase($c, $totalBelanja, $jumlahUangDiberikan, $kembalian, $idp, $idpr, $qty, $subtotal, $TotalHarga);
    
    // Jika simpan pembayaran berhasil, lanjutkan dengan update total harga
    if ($simpanPembayaran) {
        // Terima data Total Harga dan ID Pelanggan dari form
        $TotalHarga = $_POST['TotalHarga'];
        $PelangganID = $_POST['idpel'];
        $idp = $_POST['idp'];

        // Update total harga di tabel penjualan
        $updateTotalHarga = mysqli_query($c, "UPDATE penjualan SET TotalHarga='$TotalHarga' WHERE PenjualanID='$idp'");

        // Periksa apakah update berhasil
        if ($updateTotalHarga) {
            header('location:../view.php?idp='.$idp);
        } else {
            echo '<script>alert("Gagal menyimpan total harga.");</script>';
            header('location:../view.php?idp='.$idp);
        }
    } else {
        echo '<script>alert("Gagal menyimpan data pembayaran.");</script>';
        header('location:../view.php?idp='.$idp);
    }
}

?>
