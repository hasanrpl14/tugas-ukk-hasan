<?php  
session_start();
require 'koneksi.php';
// require '../fungsi/rupiah.php';

if(isset($_GET['idp'])){
    $idp = $_GET['idp'];

    $ambilnamapelanggan = mysqli_query($c, "SELECT * FROM penjualan p, pelanggan pl WHERE p.PelangganID=pl.PelangganID AND p.PenjualanID=$idp");

if (!$ambilnamapelanggan) {
    die("Kueri gagal ambil nama: " . mysqli_error($c));
}

$np = mysqli_fetch_array($ambilnamapelanggan);
   $namapel = $np['NamaPelanggan'];
   $idpel = $np['PelangganID'];

}   else{
    header('Location:index.php');
}

// $id = $_GET['id_order'];
// $q_struk = mysqli_query($kon, "SELECT * FROM tb_transaksi WHERE id_order = '$id'");
// $struk = mysqli_fetch_assoc($q_struk);
// $q_mem = mysqli_query($kon, "SELECT * FROM tb_user WHERE id_user = '$struk[id_user]'");
// $mem = mysqli_fetch_assoc($q_mem);
// $detail_order = mysqli_query($kon, "SELECT * FROM tb_detail_order WHERE id_order  = '$id'");
// $q_hartot = mysqli_query($kon, "SELECT sum(hartot_dorder) as hartot FROM tb_detail_order WHERE id_order = '$id'");
// $hartot = mysqli_fetch_assoc($q_hartot);



                                      
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
<td width='10%'>Nama Pelanggan</td>
<td width='10%'>Item</td>
<td width='13%'>Price</td>
<td width='4%'>Qty</td>
<td width='7%'>Diskon %</td>
<td width='13%'>Total</td><tr>
<td colspan='5'><hr></td></tr>
</tr>
<tr><td style='vertical-align:top'> <?= $namapel?></td>
<td style='vertical-align:top'>3 WAY STOPCOCK</td>
<td style='vertical-align:top; text-align:right; padding-right:10px'>7.440</td>
<td style='vertical-align:top; text-align:right; padding-right:10px'>100</td>
<td style='vertical-align:top; text-align:right; padding-right:10px'>0,00%</td>
<td style='text-align:right; vertical-align:top'>744.000</td></tr>
<tr>
<td colspan='5'><hr></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right'>Biaya Adm : </div></td><td style='text-align:right; font-size:16pt;'>Rp3.500,00</td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Total : </div></td><td style='text-align:right; font-size:16pt; color:black'>747.500</td>
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
<td colspan = '4'><div style='text-align:right; color:black'>Sisa : </div></td><td style='text-align:right; font-size:16pt; color:black'>0</td>
</tr>
</table>
<table style='width:350; font-size:12pt;' cellspacing='2'><tr></br><td align='center'>****** TERIMAKASIH ******</br></td></tr></table></center></body>
</html>