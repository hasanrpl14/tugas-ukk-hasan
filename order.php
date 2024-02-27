<?php 
    require 'koneksi.php';
    require 'ceklogin.php';

    //Hitung jumlah pelanggan
    $h1 = mysqli_query($c, "select * from penjualan");
    $h2 = mysqli_num_rows($h1); // jumlah pesanan
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
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
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
                            <h5 class="m-b-10">Data Pesanan</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card .bg-body text-black mb-4">
                        <div class="card-body">Jumlah Pesanan : <?=$h2;?></div>
                    </div>
                </div>
                    <!-- Button to Open the Modal -->
                 <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#tambahpelanggan">
                    Tambah Pelanggan
                </button>
            </div>

            <!-- Button to Open the Modal -->
                 <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                 Tambah Pesanan Baru
                </button>

             <div class="col">


             <!-- The Modal -->
             <div class="modal fade" id="tambahpelanggan">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data pelanggan</h4>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>

                            <form method="post" action="./fungsi/tambahPelangganOrder.php">
                                <!-- fungsi tambahPelangganOrder jadi itu tambah pelanggan di file order -->

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input type="text" name="NamaPelanggan" class="form-control" placeholder="Nama Pelanggan">
                                    <input type="num" name="NomorTelepon" class="form-control mt-2" placeholder="No telepon">
                                    <input type="text" name="Alamat" class="form-control mt-2" placeholder="Alamat">
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="tambahpelanggan">Submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                </div>

                            </form>
                        </div>
                    </div>

                </div>


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

                            <form method="post" action="./fungsi/tambahPesanan.php">

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Pilih pelanggan
                                    <select name="PelangganID" class="form-control">

                                        <?php
                                        $getpelanggan = mysqli_query($c, "select * from pelanggan");


                                        while($pl = mysqli_fetch_array($getpelanggan)) {
                                            $NamaPelanggan = $pl['NamaPelanggan'];
                                            $PelangganID = $pl['PelangganID'];
                                            $Alamat = $pl['Alamat'];
                                        ?>

                                            <option value="<?=$PelangganID;?>"><?=$NamaPelanggan;?> - <?=$Alamat;?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="tambahpesanan">Submit</button>
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
                                        <th>ID Pesanan</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Jumlah</th>
                                        <th>Total Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                        $get = mysqli_query($c, "select * from penjualan p, pelanggan pl where p.PelangganID=pl.
                                        PelangganID");
                                        // ini join table query php menghubungkan table pesanan + table pelanggan
                                      
                                        while ($p = mysqli_fetch_array($get)) {
                                            $PenjualanID = $p['PenjualanID'];
                                            $Tanggal = $p['TanggalPenjualan'];
                                            $NamaPelanggan = $p['NamaPelanggan'];
                                            $Alamat = $p['Alamat'];
                                            $totalHarga = $p['TotalHarga'];

                                            // hitung jumlah
                                            // $hitungjumlah = mysqli_query($c,"select * from detailpenjualan where
                                            // PenjualanID='$PenjualanID'");

                                            $hitungjumlah = mysqli_query($c, "select * from detailpenjualan where
                                             PenjualanID='$PenjualanID'");


                                            $jumlah = mysqli_num_rows($hitungjumlah);

                                        ?>

                                            <tr>
                                                <td><?= $PenjualanID ; ?></td>
                                                <td><?= $Tanggal ; ?></td>
                                                <td><?= $NamaPelanggan ; ?> - <?= $Alamat; ?></td>
                                                <td><?= $jumlah; ?></td>
                                                <td>Rp<?=number_format($totalHarga); ?></td>
                                                <td>
                                                    <a href="view.php?idp=<?= $PenjualanID;?>"
                                                    class="btn btn-primary mb-2" target="_blank">Tampilkan</a>
                                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#delete<?=$PenjualanID;?>">
                                                        Hapus 
                                                    </button>
                                                </td>
                                            </tr>

                                 <!-- The Modal delete data pesanan/order--> 
                                 <div class="modal fade" id="delete<?=$PenjualanID;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Apakah Anda Yakin ingin menghapus Data Pesanan?</h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <form method="post" action="./fungsi/hapusPesanan.php">
                                                            <div class="modal-body">
                                                                Hapus data Pesanan
                                                                <input type="hidden" name="ido" value="<?=$PenjualanID;?>">
                                                                <input type="hidden" name="idm" value="<?=$idmasuk?>">
                                                            </div>

                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" name="hapusdatapesanan">Submit</button>
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
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

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
