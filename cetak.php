<?php
include 'koneksi.php';
include 'ceklogin.php';



if(isset($_GET['idp'])){
    $idp = $_GET['idp'];

    // Pastikan $idp adalah angka yang valid sebelum digunakan dalam kueri SQL
    if (!is_numeric($idp)) {
        die("ID pesanan tidak valid.");
    }

    $ambilnamapelanggan = mysqli_query($c, "SELECT * FROM penjualan p, pelanggan pl WHERE p.PelangganID=pl.PelangganID AND p.PenjualanID=$idp");

    if (!$ambilnamapelanggan) {
        die("Kueri gagal ambil nama: " . mysqli_error($c));
    }

    $np = mysqli_fetch_array($ambilnamapelanggan);
    $namapel = $np['NamaPelanggan'];
    $idpel = $np['PelangganID'];

} else {
    header('Location:index.php');
}


// validasi if di atas jika tidak ada url view.php?idp=1 
// intinya jika di urlnya tidak ada id pesanan maka akan kembali ke halaman index

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Ukk Hasan</title>
    <style>
        body {
            font-family: tahoma;
            font-size: 8pt;
        }
        .container {
            width: 350px;
            font-size: 16pt;
            font-family: calibri;
            border-collapse: collapse;
            margin: 0 auto;
        }
        .container td {
            padding: 5px;
            border: 1px solid black;
        }
        .title {
            text-align: center;
            font-size: 12pt;
            margin-bottom: 10px;
        }
        .separator {
            display: block;
            margin: 10px auto;
            border-top: 1px solid black;
            width: 90%;
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
            UKK KASIR 2024<br>
            SMK NU 01 KENDAL<br>
            No. : xxxxx, 11 Juni 2020 (user:HASAN), 11:57:50
        </div>
        <table cellspacing='0' cellpadding='0' class="center">
            <tr>
                <td width='10%'>Item</td>
                <td width='13%'>Price</td>
                <td width='4%'>Qty</td>
                <td width='7%'>Diskon %</td>
                <td width='13%'>Total</td>
            </tr>
            <tr><td colspan='5' class="separator"></td></tr>
            <?php
            $get = mysqli_query($c, "SELECT * FROM detailpenjualan p, produk pr WHERE p.ProdukID=pr.ProdukID AND p.PenjualanID='$idp'");
            $total = 0;
            while ($p = mysqli_fetch_array($get)) {
                $qty = $p['JumlahProduk'];
                $harga = $p['Harga'];
                $subtotal = $p['Subtotal'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= $p['NamaProduk']; ?></td>
                    <td>Rp<?= number_format($harga); ?></td>
                    <td><?= number_format($qty); ?></td>
                    <td>0,00%</td>
                    <td>Rp<?= number_format($subtotal); ?></td>
                </tr>
            <?php
            }
            ?>
            <tr><td colspan='5' class="separator"></td></tr>
            <tr>
                <!-- <td colspan='4'><div style='text-align:right'>Biaya Adm :</div></td> -->
                <td colspan='4'><div style='text-align:right'>Bayar :</div></td>
                <td id="detail_pembayaran">Rp<?= number_format($bayar); ?></td>
            </tr>
            <tr>
                <td colspan='4'><div style='text-align:right; color:black'>Total :</div></td>
                <td style='color:black'>Rp<?= number_format($total); ?></td>
            </tr>
            <tr>
                <td colspan='4'><div style='text-align:right; color:black'>Sisa :</div></td>
                <td style='color:black' id="kembalian">Rp<?= number_format($kembalian); ?></td>
            </tr>
        </table>
        <div class="center" style="font-size: 12pt;"><br>****** TERIMAKASIH ******<br></div>
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
