<?php 
    require 'koneksi.php';
    // require 'ceklogin.php';

    //Hitung jumlah pelanggan
    $h1 = mysqli_query($c, "select * from user");
    $h2 = mysqli_num_rows($h1); // jumlah pelanggan
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Daftar Ukk Kasir 24</title>
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

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h3 class="mb-3 f-b-400 text-primary">UKK Kasir 24</h3>
						<!-- <img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4"> -->
						<h4 class="mb-3 f-w-400">Daftar</h4>
						<form action="registrasiForm.php" method="post">
						<div class="form-group mb-3">
							<label class="floating-label" for="Username">Username</label>
							<input type="text" class="form-control" id="Username" placeholder="" name="username">
						</div>
						<!-- <div class="form-group mb-3">
							<label class="floating-label" for="Email">Email address</label>
							<input type="text" class="form-control" id="Email" placeholder="">
						</div> -->
						<div class="form-group mb-3">
							<label class="floating-label" for="Password">Password</label>
							<input type="password" class="form-control" id="Password" placeholder="" name="password">
						</div>
						<div class="form-group mb-3">
							<label class="floating-label" for="email">Email</label>
							<input type="tesxt" class="form-control" id="email" placeholder="" name="nama">
						</div>
						<div class="form-group mb-4">
							<label class="floating-label" for="level">Pilih Level</label>
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
						<!-- <div class="custom-control custom-checkbox  text-left mb-4 mt-2">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">Send me the <a href="#!"> Newsletter</a> weekly.</label>
						</div> -->
						<button class="btn btn-primary btn-block mb-4" type="submit" name="registrasi">Sign up</button>
						<p class="mb-2">Already have an account? <a href="login.php" class="f-w-400">Signin</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<!-- <script src="assets/js/ripple.js"></script> -->
<script src="assets/js/pcoded.min.js"></script>



</body>

</html>
