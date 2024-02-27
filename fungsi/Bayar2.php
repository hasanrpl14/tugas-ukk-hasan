<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    // $totalHarga = $_POST['total'];
    $bayar = floatval($_POST['bayar']);
    $totalHarga = floatval($_POST['total']);
    // $idp = $_POST['idp'];
    $idpel = $_POST['idpel'];
    // $bayar = $_POST['bayar'];
    $kembalian = $_POST['kembalian'];

    // Validasi jika total pembayaran kurang dari atau sama dengan nol
    if ($bayar <= 0) {
        echo "Pembayaran harus lebih besar dari nol.";
    } else {
        // Hitung kembalian
        $kembalian = $bayar - $totalHarga;

        // Simpan data transaksi ke database
        $query = "INSERT INTO penjualan (PelangganID, TotalHarga, Bayar, Kembalian) VALUES ( '$idpel', '$totalHarga', '$bayar', '$kembalian')";
        $result = mysqli_query($c, $query);

        if ($result) {
            echo "Transaksi berhasil disimpan ke database.";
        } else {
            echo "Error: " . mysqli_error($c);
        }
    }
}
?>
