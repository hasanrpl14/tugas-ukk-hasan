<?php
    require 'koneksi.php';
    require 'ceklogin.php';

    //Hitung jumlah produk
    $query_produk = mysqli_query($c, "SELECT * FROM produk");
    $jumlah_produk = mysqli_num_rows($query_produk);

    // Inisialisasi variabel informasi order
    $order_success = false;
    $order_details = [];

    // Jika ada data order dalam session (atau dari variabel lainnya), simpan informasi order
    if (isset($_SESSION['order_success']) && $_SESSION['order_success'] == true) {
        $order_success = true;
        $order_details = $_SESSION['order_details'];
        // Bersihkan data order dari session
        unset($_SESSION['order_success']);
        unset($_SESSION['order_details']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
</head>
<body>
    <h1>Order</h1>
    <?php if (!$order_success) : ?>
    <!-- Formulir order -->
    <form action="process_order.php" method="POST">
        <label for="product">Product:</label>
        <select name="product" id="product">
            <?php
            // Ambil data produk dari database
            $query_produk = mysqli_query($c, "SELECT * FROM produk");
            while ($row_produk = mysqli_fetch_assoc($query_produk)) {
                echo '<option value="' . $row_produk['ProdukID'] . '">' . $row_produk['NamaProduk'] . '</option>';
            }
            ?>
        </select><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" min="1"><br>

        <input type="submit" value="Place Order">
    </form>
    <?php endif; ?>

    <?php if ($order_success) : ?>
    <!-- Informasi order -->
    <h2>Order Success</h2>
    <p>Order Details:</p>
    <ul>
        <!-- Pastikan variabel $order_details telah diisi dengan benar -->
        <li>Product: <?= $order_details['NamaProduk']; ?></li>
        <li>Quantity: <?= $order_details['quantity']; ?></li>
        <li>Total Price: Rp<?= $order_details['subtotal']; ?></li>
    </ul>
    <?php endif; ?>
</body>
</html>
