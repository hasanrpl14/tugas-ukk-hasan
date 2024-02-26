<?php 
    require 'koneksi.php';
    require 'ceklogin.php';

    //Hitung jumlah pelanggan
    $h1 = mysqli_query($c, "select * from produk");
    $h2 = mysqli_num_rows($h1); // jumlah pelanggan

    //Hitung jumlah pelanggan
    $h3 = mysqli_query($c, "select * from penjualan");
    $h4 = mysqli_num_rows($h3); // jumlah pelanggan

    //Hitung jumlah pelanggan
    $h5 = mysqli_query($c, "select * from pelanggan");
    $h6 = mysqli_num_rows($h5); // jumlah pelanggan
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
                            <h5 class="m-b-10">Dashboard Ukk Kasir</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#!"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <!-- awal kolom detail -->
    <div class="col-xl-12">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <!-- <h5 class="card-title"></h5> -->
                    <h3 class="m-0 text-center text-c-blue">Stok Barang</h3>
                    <h1 class="mb-3 mt-3 text-center"><?=$h2;?></h1>
                    <!-- <a href="#!" class="btn  btn-primary">Go somewhere</a> -->
                        <div class="card-footer bg-primary text-white">
                            <div class="row text-center">
                                <div class="col">
                                    <span><a href="stok.php">
                                    <h5 class="m-0 text-white">Detail Barang</h5>
                                    </a></span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <!-- <h5 class="card-title"></h5> -->
                    <h3 class="m-0 text-center text-c-green">Penjualan</h3>
                    <h1 class="mb-3 mt-3 text-center"><?=$h4;?></h1>
                    <!-- <a href="#!" class="btn  btn-primary">Go somewhere</a> -->
                        <div class="card-footer bg-c-green text-white">
                            <div class="row text-center">
                                <div class="col">
                                    <span><a href="order.php">
                                    <h5 class="m-0 text-white">Detail Penjualan</h5>
                                    </a></span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <!-- <h5 class="card-title"></h5> -->
                    <h3 class="m-0 text-center text-c-red">Pelanggan</h3>
                    <h1 class="mb-3 mt-3 text-center"><?=$h6;?></h1>
                    <!-- <a href="#!" class="btn  btn-primary">Go somewhere</a> -->
                        <div class="card-footer bg-c-red text-white">
                            <div class="row text-center">
                                <div class="col">
                                    <span><a href="pelanggan.php">
                                    <h5 class="m-0 text-white">Detail Pelanggan</h5>
                                    </a></span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- akhir kolom detail -->
         
            <!-- prject ,team member start -->

            <!-- prject ,team member start -->
            <!-- seo start -->
            <!-- seo end -->

            <!-- Latest Customers start -->
            <!-- Latest Customers end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
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

</body>

</html>
