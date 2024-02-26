<?php
include 'koneksi.php';

$id_produk = $_POST['ProdukID'];
$jumlah = $_POST['JumlahProduk'];
// $uang_pembayaran = $_POST['uang_pembayaran']; // Terima nilai uang pembayaran dari formulir

// Ambil informasi produk dari database
$sql_produk = "SELECT * FROM produk WHERE ProdukID = $id_produk"; // Sesuaikan dengan nama kolom yang benar
$result_produk = $c->query($sql_produk);

if ($result_produk->num_rows > 0) {
    $row_produk = $result_produk->fetch_assoc();
    
    // Hitung total harga
    $total_harga = $row_produk['Harga'] * $jumlah; // Sesuaikan dengan nama kolom yang benar

    // Hitung kembalian
    // $kembalian = $uang_pembayaran - $total_harga;

    // Simpan transaksi ke database
    // $sql_transaksi = "INSERT INTO transaksi (ProdukID, JumlahProduk, TotalHarga, UangPembayaran, Kembalian) 
    //                   VALUES ($id_produk, $jumlah, $total_harga, $uang_pembayaran, $kembalian)";
    $sql_transaksi = "INSERT INTO transaksi (ProdukID, JumlahProduk, TotalHarga) 
                      VALUES ($id_produk, $jumlah, $total_harga)";
    if ($c->query($sql_transaksi) === TRUE) {
        // echo "Transaksi berhasil";
        // header('location:../produk.php');
        echo '
        <script>alert("Berhasil pesan");
        window.location.href="./produk.php"
        </script>
        ';
    } else {
        echo "Error: " . $sql_transaksi . "<br>" . $c->error;
    }
} else {
    echo "Produk tidak ditemukan";
}

$c->close();
?>
