<?php
include 'koneksi.php';
include 'ceklogin.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Ukk Hasan</title>
    <style>
        body {
            font-family: Tahoma;
            font-size: 10pt;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            text-align: center;
            font-size: 24pt;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .separator {
            border-top: 2px solid #333;
        }
        .total {
            font-size: 16pt;
            font-weight: bold;
            text-align: right;
            margin-top: 10px;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Laporan Penjualan</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query data penjualan
                $get = mysqli_query($c, "SELECT p.PenjualanID, p.TanggalPenjualan, p.TotalHarga, pl.NamaPelanggan, pl.Alamat, pr.NamaProduk,
                    SUM(dp.JumlahProduk) AS total_JumlahPoduk
                    FROM penjualan p
                    JOIN pelanggan pl ON p.PelangganID = pl.PelangganID
                    JOIN detailpenjualan dp ON p.PenjualanID = dp.PenjualanID
                    JOIN produk pr ON dp.ProdukID = pr.ProdukID
                    GROUP BY p.PenjualanID");

                while ($p = mysqli_fetch_array($get)) {
                    $PenjualanID = $p['PenjualanID'];
                    $Tanggal = $p['TanggalPenjualan'];
                    $NamaPelanggan = $p['NamaPelanggan'];
                    $namaproduk = $p['NamaProduk'];
                    $Alamat = $p['Alamat'];
                    $totalHarga = $p['TotalHarga'];

                    // Hitung jumlah produk
                    $hitungjumlah = mysqli_query($c, "SELECT * FROM detailpenjualan WHERE PenjualanID='$PenjualanID'");
                    $jumlah = mysqli_num_rows($hitungjumlah);
                ?>
                <tr>
                    <td><?= $PenjualanID ; ?></td>
                    <td><?= $Tanggal ; ?></td>
                    <td><?= $NamaPelanggan ; ?> - <?= $Alamat; ?></td>
                    <td><?= $namaproduk; ?></td>
                    <td><?= $jumlah; ?></td>
                    <td>Rp <?= number_format($totalHarga); ?></td>
                </tr>   
                <?php } // End of while loop ?>
            </tbody>
        </table>
        <div class="center" style="font-size: 16pt; margin-top: 20px;">****** TERIMA KASIH ******</div>
    </div>
</body>
</html>


<script>
        // Ambil nilai dari localStorage saat halaman dimuat
        window.onload = function() {
            // Ambil nilai bayar dan kembalian dari localStorage
            var bayar = localStorage.getItem('bayar');
            var kembalian = localStorage.getItem('kembalian');

            // Tampilkan nilai di dalam div dengan id "detail_pembayaran"
            var detail_pembayaran = document.getElementById('detail_pembayaran');
            detail_pembayaran.innerHTML =  bayar;
            // Tampilkan nilai di dalam div dengan id "detail_pembayaran"
            var detail_pembayaran = document.getElementById('kembalian');
            detail_pembayaran.innerHTML =   kembalian;
        }
    </script>

<script>
window.print();
</script>
