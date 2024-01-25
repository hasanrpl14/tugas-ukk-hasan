<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
// $password = md5($_POST['password']);
$password = ($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($c,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		// header("location:test.html");
		header("location:index.php");
	}else{

		// alihkan ke halaman login kembali
		// header("location:index.php?pesan=gagal");
        // echo '
        // <script>alert("Username / level salah");
        // window.location.href="login.php"
        // </script>
        // ';

        echo '<script>alert("Username / level salah"); window.location.href="login.php";</script>';

	}	
}else{
	// header("location:index.php?pesan=gagal");
    // echo '
    // <script>alert("Username / level salah");
    // window.location.href="login.php"
    // </script>
    // ';

    echo '<script>alert("Username / level salah"); window.location.href="login.php";</script>';

}

?>