<?php
// Lakukan koneksi ke database
include 'koneksi.php';

// Ambil data dari formulir
$totalHarga = $_POST['total'];
$uangPembayaran = $_POST['uang_pembayaran'];
$kembalian = $uangPembayaran - $totalHarga;

// Simpan informasi pembayaran ke dalam tabel transaksi
$insert = mysqli_query($c, "INSERT INTO transaksi (TotalHarga, JumlahDibayarkan, Kembalian) VALUES ('$totalHarga', '$uangPembayaran', '$kembalian')");

// Periksa apakah query berhasil dijalankan
if ($insert) {
    echo "Pembayaran berhasil disimpan ke database.";
} else {
    echo "Error: " . mysqli_error($c);
}

// Tutup koneksi ke database
mysqli_close($c);
?>
