<?php 
    require 'koneksi.php';
    require 'ceklogin.php';
?>


<html>
<head>
<title>Kasir Ukk Hasan</title>
<style>
 
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
</head>
<body style='font-family:tahoma; font-size:8pt;'>
<center><table style='width:350px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='CENTER' vertical-align:top'><span style='color:black;'>
<b>UKK KASIR 2024</b></br>12 PPLG 1 HASAN</span></br>
 
 
<span style='font-size:12pt'>No. : xxxxx, 11 Juni 2020 (user:xxxxx), 11:57:50</span></br>
</td>
</table>
<style>
hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 
</style>
<table cellspacing='0' cellpadding='0' style='width:350px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
 
<tr align='center'>
<td width='10%'>Item</td>
<td width='13%'>Price</td>
<td width='4%'>Qty</td>
<td width='7%'>Diskon </td>
<td width='13%'>Total</td><tr>
<td colspan='5'><hr></td></tr>
</tr>

<?php

    $get = mysqli_query($c, "select * from transaksi p, produk pr where p.ProdukID=pr.
    ProdukID");
    $i = 1;

    while ($p = mysqli_fetch_array($get)) {
        $jumlahproduk = $p['JumlahProduk'];
        $namaproduk = $p['NamaProduk'];

?>

<td style='vertical-align:top; text-align:right; padding-right:10px'><?= $namaproduk; ?></td>
<td style='vertical-align:top; text-align:right; padding-right:10px'><?= $jumlahproduk; ?></td>
<td style='vertical-align:top; text-align:right; padding-right:10px'><?= $jumlahproduk; ?></td>
<td style='vertical-align:top; text-align:right; padding-right:10px'>0%</td>
<td style='text-align:right; vertical-align:top'>744.000</td></tr>
                                                
<?php
        }; //end of white

?>
<tr>
<td colspan='5'><hr></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right'>Bayar : </div></td><td style='text-align:right; font-size:16pt;' id="bayar"> <?= isset($kembalian) ? number_format($kembalian) : ''; ?></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Total : </div></td><td style='text-align:right; font-size:16pt; color:black'></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Cash : </div></td><td style='text-align:right; font-size:16pt; color:black'>1.000.000</td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Change : </div></td><td style='text-align:right; font-size:16pt; color:black'>252.500</td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>DP : </div></td><td style='text-align:right; font-size:16pt; color:black'>0</td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Sisa : </div></td>
<td style='text-align:right; font-size:16pt; color:black' id="kembalian">
<td>
    <?= isset($kembalian) ? number_format($kembalian) : ''; ?>
</td>
</tr>
</table>
<table style='width:350; font-size:12pt;' cellspacing='2'><tr></br><td align='center'>****** TERIMAKASIH ******</br></td></tr></table></center></body>
</html>





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

                $get = mysqli_query($c, "select * from transaksi p, produk pr where p.ProdukID=pr.
                ProdukID");
                $i = 1;

                while ($p = mysqli_fetch_array($get)) {
                    $jumlahproduk = $p['JumlahProduk'];
                    $namaproduk = $p['NamaProduk'];
                    $total = $p['TotalHarga'];

                ?>
                <tr>
                    <td><?= $p['NamaProduk']; ?></td>
                    <td>Rp<?= number_format($jumlahproduk); ?></td>
                    <td>Rp<?= number_format($jumlahproduk); ?></td>
                    <td>0,00%</td>
                    <td>Rp<?= number_format($total); ?></td>
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
        detail_pembayaran.innerHTML = bayar;

        // Tampilkan nilai di dalam td dengan id "kembalian"
        var kembalianElement = document.getElementById('kembalian');
        if (kembalianElement) {
            kembalianElement.innerHTML = kembalian ? kembalian : ''; // Memastikan kembalian tidak null atau undefined
        }
    }
</script>

<script>
 window.print();
 </script>