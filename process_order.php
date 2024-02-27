<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil data dari form
$product_id = $_POST['product'];
$quantity = $_POST['quantity'];

// Ambil harga produk dari database (asumsikan harga sudah tersedia dalam tabel produk)
$query_price = "SELECT harga FROM produk WHERE ProdukID = $product_id";
$result_price = mysqli_query($c, $query_price);
$row_price = mysqli_fetch_assoc($result_price);
$price = $row_price['harga'];

// Hitung subtotal
$subtotal = $quantity * $price;

// Simpan order ke dalam tabel penjualan
$query_insert_penjualan = "INSERT INTO penjualan (TanggalPenjualan, TotalHarga) VALUES (NOW(), $subtotal)";
$result_insert_penjualan = mysqli_query($c, $query_insert_penjualan);
// Simpan detail order untuk ditampilkan di halaman order
$order_details = [
    'NamaProduk' => $row_produk['NamaProduk'],
    'quantity' => $_POST['quantity'],
    'subtotal' => $subtotal
];


if($result_insert_penjualan) {
    $penjualan_id = mysqli_insert_id($c); // Ambil ID penjualan yang baru saja dibuat

    // Simpan detail order ke dalam tabel detailPenjualan
    $query_insert_detail = "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, Subtotal) 
                            VALUES ($penjualan_id, $product_id, $quantity, $subtotal)";
    $result_insert_detail = mysqli_query($c, $query_insert_detail);

    if($result_insert_detail) {

        // echo '
        // <script>alert("Order successfully placed.");
        // window.location.href="order2.php"
        // </script>
        // ';

        echo "sukses to place order (detail).";
    } else {
        echo "Failed to place order (detail).";
    }
} else {
    echo "Failed to place order (penjualan).";
}

// Tutup koneksi
mysqli_close($c);
?>
