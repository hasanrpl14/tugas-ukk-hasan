<?php
include 'koneksi.php';
include 'ceklogin.php';

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


// validasi if di atas jika tidak ada url view.php?idp=1 
// intinya jika di urlnya tidak ada id pesanan maka akan kembali ke halaman index

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>UKK 24</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />


        
    
</head>
<body class="">
    <!-- [ Pre-loader ] start -->
	<!-- <div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div> -->
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<!-- isi navbar / sidebar -->
            <?php 
            include "./sidebar.php"
            ?>
			<!-- akhir isi navbar / sidebar -->
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">	
    <?php 
            include "./header.php"
            ?>
			
	</header>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Pesanan : <?=$idpel;?></h5>
                            <h5 class="m-b-10">Data Pesanan : <?=$namapel;?></h5>
                    </div>
                </div>
            </div>
        </div>


            <!-- Button to Open the Modal -->
                 <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                 Tambah Pesanan Baru
                </button>

             <div class="col">
                    <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Pesanan Baru</h4>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>

                            <form method="post" action="./fungsi/tambahProduk.php">

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Pilih pesanan
                                    <select name="ProdukID" class="form-control">
                                        <?php
                                        $getproduk = mysqli_query($c, "select * from produk where ProdukID not in (select ProdukID from detailpenjualan where PenjualanID='$idp')");

                                        while ($pl = mysqli_fetch_array($getproduk)) {
                                            $namaproduk = $pl['NamaProduk'];
                                            $deskripsi = $pl['Deskripsi'];
                                            $idproduk = $pl['ProdukID'];
                                            $stok = $pl['Stok'];
                                        ?>
                                            <option value="<?= $idproduk; ?>"><?= $namaproduk; ?> - <?= $deskripsi; ?>(Stok: <?=$stok;?>)</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="number" name="JumlahProduk" class="form-control mt-4" placeholder="Jumlah" min="1" required>
                                    <input type="hidden" name="PenjualanID" value="<?= $idp; ?>">
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="tambahproduk">Submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
             </div>
        </div>
        

    <!-- [ Hover-table ] start -->
    <!-- <div class="col-md-6"> -->
    <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Table</h5>
                        
                        <?php   
                                $get = mysqli_query($c, "SELECT * FROM penjualan");
                                while ($p = mysqli_fetch_array($get)) {
                                    $totalHarga = $p['TotalHarga'];
                                    // Lakukan sesuatu dengan $totalHarga
                                }
                            ?>
        
                        <div class="alert alert-primary" role="alert">
							A simple primary alert—check it out!
						</div>
                        <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Sub-total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                        $get = mysqli_query($c, "select * from detailpenjualan p, produk pr where p.ProdukID=pr.
                                        ProdukID and PenjualanID='$idp'");
                                        // ini join table query php menghubungkan table detailpenjualan + table produk
                                      $i = 1;

                                        while ($p = mysqli_fetch_array($get)) {
                                            $idpr = $p['ProdukID'];
                                            $iddp = $p['DetailID'];
                                            $idp = $p['PenjualanID'];
                                            $qty = $p['JumlahProduk'];
                                            $harga = $p['Harga'];
                                            $namaproduk = $p['NamaProduk'];
                                            $desk = $p['Deskripsi'];
                                            $subtotal = $p['Subtotal'];
                                            // $subtotal = $qty*$harga;
                                ?>

                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $namaproduk; ?> (<?=$desk; ?>) </td>
                                                <td>Rp<?=number_format($harga); ?></td>
                                                <td><?=number_format($qty); ?></td>
                                                <td>Rp<?=number_format($subtotal); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#prosesdetailpesanan<?=$iddp?>">
                                                        Proses 
                                                    </button>
                                                    <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#editdetailpesanan<?=$idpr?>">
                                                        Edit 
                                                    </button>
                                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#delete<?=$idpr;?>">
                                                        Hapus 
                                                    </button>
                                                </td>
                                            </tr>

                                 <!-- The Modal prosess bayar data detail pesanan/order--> 
                                 <div class="modal fade" id="prosesdetailpesanan<?=$iddp?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Bayar Detail Pesanan</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>

                                            <!-- Modal Body -->
                                            <form method="post" action="./fungsi/prosesPembayaran.php">
                                                <div class="modal-body">
                                                    <label for="NamaProduk">Nama Produk</label>
                                                    <input type="text" name="NamaProduk" class="form-control" placeholder="Nama Produk" value="<?= $namaproduk; ?>" readonly>
                                                    <label for="qty">Jumlah Beli</label>
                                                    <input type="number" name="qty" class="form-control mt-2" placeholder="Jumlah Beli" value="<?= $qty; ?>">
                                                    <input type="hidden" name="iddp" class="form-control mt-2" value="<?=$iddp?>">
                                                    <input type="hidden" name="idp" class="form-control mt-2" value="<?=$idp?>">
                                                    <input type="hidden" name="idpr" class="form-control mt-2" value="<?=$idpr?>">
                                                    <input type="hidden" name="harga" class="form-control mt-2" value="<?=$harga?>">
                                                    <input type="hidden" name="subtotal" class="form-control mt-2" value="<?=$subtotal?>">
                                                    <input type="hidden" name="idpel" class="form-control mt-2" value="<?=$idpel?>">
                                                </div>

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="prosesdetailpesanan">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                 <!-- The Modal edit data detail pesanan/order--> 
                                 <div class="modal fade" id="editdetailpesanan<?=$idpr;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ubah Data Detail Pesanan</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>

                                            <!-- Modal Body -->
                                            <form method="post" action="./fungsi/editDetailPesanan.php">
                                                <div class="modal-body">
                                                    <input type="text" name="NamaProduk" class="form-control" placeholder="Nama Produk" value="<?= $namaproduk; ?>" disabled>
                                                    <input type="number" name="qty" class="form-control mt-2" placeholder="Harga" value="<?= $qty; ?>">
                                                    <input type="hidden" name="iddp" class="form-control mt-2" value="<?=$iddp?>">
                                                    <input type="hidden" name="idp" class="form-control mt-2" value="<?=$idp?>">
                                                    <input type="hidden" name="idpr" class="form-control mt-2" value="<?=$idpr?>">
                                            
                                                </div>

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="editdetailpesanan">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                 <!-- The Modal habus data detail pesanan/order--> 
                                 <div class="modal fade" id="delete<?=$idpr;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Apakah Anda Yakin ingin menghapus Data Pesanan?</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>

                                            <!-- Modal Body -->
                                            <form method="post" action="./fungsi/hapusProdukpesanan.php">
                                                <div class="modal-body">
                                                    Hapus data Pesanan
                                                    <input type="hidden" name="idp" value="<?= $iddp; ?>">
                                                    <input type="hidden" name="idpr" value="<?= $idpr; ?>">
                                                    <input type="hidden" name="idorder" value="<?= $idp; ?>">
                                                </div>

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="hapusprodukpesanan">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }; //end of white

                                        ?>
                                </tbody>
                            </table>

                            <?php   
                                $get = mysqli_query($c, "SELECT * FROM penjualan");
                                while ($p = mysqli_fetch_array($get)) {
                                    $totalHarga = $p['TotalHarga'];
                                    // Lakukan sesuatu dengan $totalHarga
                                }
                            ?>
        
                                    <div class="form-floating mb-3">
                               
                                        <form method="post" action="./fungsi/simpan_Totalpembayaran.php">
                                            <?php 
                                            // include '../koneksi.php';
                                            // $detailpenjualan = mysqli_query($c, "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE 	PenjualanID='$idp[PenjualanID]'"); 
                                            // // $row = mysqli_fetch_assoc($detailpenjualan); 
                                            // // $sum = $row['TotalHarga'];

                                            $detailpenjualan = mysqli_query($c, "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE PenjualanID='$idp'");
                                            if (!$detailpenjualan) {
                                                die("Error: " . mysqli_error($c));
                                            }

                                            $hasil = mysqli_fetch_assoc($detailpenjualan);
                                            $totalHarga = $hasil['TotalHarga'];

                                            ?>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" style="width: 50%;"
                                                         name="TotalHarga" value="<?php echo $totalHarga; ?>" readonly>
                                                        <input type="hidden" name="idp" class="form-control mt-2" value="<?=$idp?>">
                                                        <input type="hidden" name="idpel" class="form-control mt-2" value="<?=$idpel?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-outline-info mb-4" type="submit">Simpan</button>
                                                </div>
                                                <!-- <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <button class="btn btn-info btn-sm form-control" type="submit">Simpan</button>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </form>
                                    </div>


                                    <!-- tabel bayar -->
                                    <table class="table table-stripped">
							
							<!-- aksi ke table nota -->
							<form method="post" action="">
						
								<tr>
									<td>Total Semua  </td>
									<td><input type="text" class="form-control" name="total" value="Rp<?=number_format($totalHarga); ?>" readonly></td>
                             		
									<td>Bayar  </td>
									<td><input type="number" class="form-control" name="bayar" value=""></td>
									<td><button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
								
										<a class="btn btn-danger" href="">
										<b>RESET</b></a></td></td>
								</tr>
							</form>
							<!-- aksi ke table nota -->
							<tr>
								<td>Kembali</td>
								<td><input type="text" class="form-control" value=""></td>
								<td></td>
								<td>
									<a href="cetak.php?idp=<?= $idp;?>" target="_blank">
									<button class="btn btn-secondary">
										<i class="fa fa-print"></i> Print Untuk Bukti Pembayaran
									</button></a>
                                    <a href="cetak2.php">cetak 2</a>
								</td>
							</tr>
						</table>
                                    <!-- tabel bayar -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Hover-table ] end -->
</div>


    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <!-- <script src="assets/js/ripple.js"></script> -->
    <script src="assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-main.js"></script>

<!-- awal datatables -->

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

<!-- akhir datatables -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
