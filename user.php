<?php 
    require 'koneksi.php';
    require 'ceklogin.php';

    //Hitung jumlah pelanggan
    $h1 = mysqli_query($c, "select * from user");
    $h2 = mysqli_num_rows($h1); // jumlah pelanggan
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
    <!-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->
    <link rel="icon" href="assets/images/kasir-logo.png" type="image/x-icon">

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
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<!-- <img src="assets/images/logo.png" alt="" class="logo"> -->
                        <h4 class="logo text-white">UKK 24</h4>
						<img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
								<div class="dropdown-menu dropdown-menu-right notification">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Notifications</h6>
										<div class="float-right">
											<a href="#!" class="m-r-10">mark as read</a>
											<a href="#!">clear all</a>
										</div>
									</div>
									<ul class="noti-body">
										<li class="n-title">
											<p class="m-b-0">NEW</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
													<p>New ticket Added</p>
												</div>
											</div>
										</li>
										<li class="n-title">
											<p class="m-b-0">EARLIER</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
													<p>currently login</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
									</ul>
									<div class="noti-footer">
										<a href="#!">show all</a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
										<span>John Doe</span>
										<a href="auth-signin.html" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
									<ul class="pro-body">
										<li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
										<li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
										<li><a href="logout.php" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>	
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
                            <h5 class="m-b-10">Data User</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card .bg-body text-black mb-4">
                        <div class="card-body">Jumlah User : <?=$h2;?></div>
                    </div>
                </div>
                    <!-- Button to Open the Modal -->
                 <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah User
                </button>
            </div>

            <!-- Button to Open the Modal -->
                 <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah User
                </button>

             <div class="col">
                    <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data User</h4>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>

                            <form method="post" action="./fungsi/tambahUser.php">

                                 <!-- Modal body -->
                                <div class="modal-body">
                                    <input type="hidden" name="IDUser" class="form-control" placeholder="Username">
                                    <input type="text" name="NamaUser" class="form-control" placeholder="Username">
                                    <input type="text" name="Nama" class="form-control mt-2" placeholder="Nama">
                                    <input type="text" name="Password" class="form-control mt-2" placeholder="Password">          

                                    <label for="level">Pilih Level</label>
                                        <select name="level" class="form-control">
                                            <?php
                                            $getlevel = mysqli_query($c, "SELECT DISTINCT level FROM user WHERE level IN ('admin', 'petugas')");
                                            if (!$getlevel) {
                                                die("Error in SQL query: " . mysqli_error($c));
                                            }

                                            while ($pl = mysqli_fetch_array($getlevel)) {
                                                $level = $pl['level'];
                                            ?>
                                                <option value="<?= $level; ?>"><?= $level; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="tambahuser">Submit</button>
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
                                        <th>ID User</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                        $get = mysqli_query($c, "select * from user");
                                        $i = 1; //penomoran

                                        while ($p = mysqli_fetch_array($get)) {
                                            $iduser = $p['IdUser'];
                                            $username = $p['username'];
                                            $nama = $p['nama'];
                                            $password = $p['password'];
                                            $level = $p['level'];
                                ?>
                                            <tr>
                                                <td><?= $iduser ; ?></td>
                                                <td><?= $username; ?></td>
                                                <td><?= $nama; ?></td>
                                                <td><?= $level; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#edituser<?=$iduser;?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#deletuser<?=$iduser;?>">
                                                        Hapus 
                                                    </button>
                                                </td>
                                            </tr>

                                             <!-- The Modal alert edit pelanggan-->
                    <div class="modal fade" id="edituser<?=$iduser;?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Data User</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>

                                <form method="post" action="./fungsi/editUser.php">

                                     <!-- Modal body -->
                                     <div class="modal-body">
                                        <input type="text" name="NamaUser" class="form-control" placeholder="Nama Pelanggan" value="<?= $username; ?>">
                                        <input type="text" name="Nama" class="form-control mt-2" placeholder="No Telepon" value="<?= $nama; ?>">
                                        <input type="text" name="Password" class="form-control mt-2" placeholder="Alamat" value="<?= $password; ?>">
                                        <label for="level">Pilih Level</label>
                                            <select name="level" class="form-control">
                                                <?php
                                                $getlevel = mysqli_query($c, "SELECT DISTINCT level FROM user WHERE level IN ('admin', 'petugas')");
                                                if (!$getlevel) {
                                                    die("Error in SQL query: " . mysqli_error($c));
                                                }

                                                while ($pl = mysqli_fetch_array($getlevel)) {
                                                    $level = $pl['level'];
                                                ?>
                                                    <option value="<?= $level; ?>"><?= $level; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                            <!-- <label for="level">Pilih level</label>

                                            <select id="level" name="level">
                                            <option value="admin">Admin</option>
                                            <option value="petugas">Petugas</option>
                                            </select>
                                                        -->
                                        <input type="hidden" name="iduser" class="form-control mt-2" value="<?= $iduser;?>">
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="edituser">Submit</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- The Modal delete detailpesanan --> 
                    <div class="modal fade" id="deletuser<?=$iduser;?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Apakah Anda Yakin ingin menghapus <?= $username; ?></h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>

                                <!-- Modal Body -->
                                <form method="post" action="./fungsi/hapusUser.php">
                                    <div class="modal-body">
                                        Hapus ini
                                        <input type="hidden" name="iduser" value="<?=$iduser?>">
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="hapususer">Ya</button>
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
