<?php 
    require 'koneksi.php';
    require 'ceklogin.php';
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
                            <h5 class="m-b-10">Data Barang Masuk</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                    <!-- Button to Open the Modal -->
                 <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah Barang Masuk
                </button>
            </div>

            <!-- Button to Open the Modal -->
                 <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah Barang Masuk
                </button>

             <div class="col">
                    <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Barang Baru</h4>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>

                            <form method="post" action="./fungsi/tambahBarangMasuk.php">
                                 <!-- Modal body -->
                                <div class="modal-body">
                                    Pilih Barang Masuk
                                    <select name="ProdukID" class="form-control">
                                        <?php
                                        // $getproduk = mysqli_query($c, "SELECT * FROM produk)");
                                        $getproduk = mysqli_query($c, "SELECT * FROM produk");
                                        if (!$getproduk) {
                                            die("Error in SQL query: " . mysqli_error($c));
                                        }

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
                                </div>
                                

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</button>
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
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                    $get = mysqli_query($c, "SELECT * FROM masuk m, produk p WHERE m.ProdukID = p.ProdukID");

                                    if ($get === false) {
                                        // Handle error here, print or log the error message
                                        echo "Error: " . mysqli_error($c);
                                    } else {
                                        $i = 1; // penomoran

                                        while ($p = mysqli_fetch_array($get)) {
                                            $idmasuk = $p['IDMasuk'];
                                            $idproduk = $p['ProdukID'];
                                            $namaproduk = $p['NamaProduk'];
                                            $deskripsi = $p['Deskripsi'];
                                            $qty = $p['JumlahProduk'];
                                            $tanggal = $p['TanggalMasuk'];
                                ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $namaproduk; ?>: <?= $deskripsi; ?></td>
                                                <td><?= $qty; ?></td>
                                                <td><?= $tanggal; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#editbarangmasuk<?=$idmasuk?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#delete<?=$idmasuk;?>">
                                                        Hapus 
                                                    </button>
                                                </td>
                                            </tr>

                                             <!-- The Modal alert edit pelanggan-->
                    <div class="modal fade" id="editbarangmasuk<?=$idmasuk?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Data Produk</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>

                                <form method="post" action="./fungsi/editBarangMasuk.php">

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <input type="text" name="NamaProduk" class="form-control" placeholder="Nama Produk" value="<?= $namaproduk; ?> : <?= $deskripsi; ?>" disabled>
                                        <input type="number" name="qty" class="form-control mt-2" placeholder="qty" value="<?= $qty; ?>">
                                        <input type="hidden" name="idm" class="form-control mt-2" value="<?=$idmasuk?>">
                                        <input type="hidden" name="idp" class="form-control mt-2" value="<?=$idproduk?>">
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="editdatabarangmasuk">Submit</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- The Modal delete detailpesanan --> 
                    <div class="modal fade" id="delete<?=$idmasuk;?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Apakah Anda Yakin ingin menghapus data barang masuk</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>

                                <!-- Modal Body -->
                                <form method="post" action="./fungsi/hapusBarangMasuk.php">
                                    <div class="modal-body">
                                        Hapus ini
                                        <input type="hidden" name="idp" value="<?=$idproduk?>">
                                        <input type="hidden" name="idm" value="<?=$idmasuk?>">
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="hapusdatabarangmasuk">Ya</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                                            
                                            <?php
                                         }
                                        }
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
