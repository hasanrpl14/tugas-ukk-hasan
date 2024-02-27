<?php
// Lakukan koneksi ke database (jika diperlukan)
include 'koneksi.php';

// Periksa apakah data telah dikirim dari formulir pembayaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $totalHarga = $_POST['total'];
    $uangPembayaran = $_POST['uang_pembayaran'];
    $kembalian = $uangPembayaran - $totalHarga;

    // Simpan informasi pembayaran ke dalam tabel transaksi
    $insert = mysqli_query($c, "INSERT INTO transaksi (TotalHarga, UangPembayaran, Kembalian) VALUES ('$totalHarga', '$uangPembayaran', '$kembalian')");

    // Periksa apakah query berhasil dijalankan
    if ($insert) {
        echo "Pembayaran berhasil disimpan ke database.";
    } else {
        echo "Error: " . mysqli_error($c);
    }
}

// Tutup koneksi ke database (jika diperlukan)
mysqli_close($c);
?>