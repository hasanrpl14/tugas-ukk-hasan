

<?php
function hitungKembalian($totalBelanja, $jumlahUangDiberikan) {
    // Hitung kembalian
    $kembalian = $jumlahUangDiberikan - $totalBelanja;

    // Jika uang yang diberikan kurang dari total belanja
    if ($kembalian < 0) {
        return "Maaf, uang yang diberikan kurang dari total belanja.";
    } elseif ($kembalian == 0) {
        return "Terima kasih, uang yang diberikan pas dengan total belanja.";
    } else {
        return "Kembalian: " . $kembalian . " RP. Terima kasih, silakan ambil kembalian Anda.";
    }
}

// Terima input total belanjaan dan jumlah uang yang diberikan dari form
if (isset($_POST['total_belanja']) && isset($_POST['jumlah_uang'])) {
    $totalBelanja = $_POST['total_belanja'];
    $jumlahUangDiberikan = $_POST['jumlah_uang'];

    // Panggil fungsi hitungKembalian
    $pesan = hitungKembalian($totalBelanja, $jumlahUangDiberikan);

    // Tampilkan hasil
    echo $pesan;
} else {
    echo "Mohon masukkan total belanjaan dan jumlah uang yang diberikan.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
</head>
<body>
    <h2>Form Pembayaran</h2>
    <form action="" method="post">
        <label for="total_belanja">Total Belanja:</label>
        <input type="number" name="total_belanja" id="total_belanja" value="20000" required><br><br>

        <label for="jumlah_uang">Jumlah Uang yang Diberikan:</label>
        <input type="number" name="jumlah_uang" id="jumlah_uang" required><br><br>

        <button type="submit" name="hitungKembalian">Hitung</button>
    </form>
</body>
</html>
