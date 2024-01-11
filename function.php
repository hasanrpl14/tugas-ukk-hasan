<?php

session_start();

//bikin koneksi
$c = mysqli_connect('localhost','root','','kasirku');

//Login
if(isset($_POST['login'])){
    //initiate variable
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($c,"SELECT * FROM user WHERE username='$username' and password='$password' ");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){
        //Jika datanya ditemukan
        //berhasil login

        $_SESSION['login'] = 'True';
        header('location:index.php');
    } else {
        //Data tidak ditemukan
        //gagal login
        echo '
        <script>alert("Username atau Password salah");
        window.location.href="login.php"
        </script>
        ';
    }
}


if(isset($_POST['tambahbarang'])){
    $namaproduk = $_POST['namaproduk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    $insert = mysqli_query($c, "INSERT INTO produk (namaproduk, deskripsi, harga, stock) VALUES ('$namaproduk','$deskripsi','$harga','$stock')");

    if($insert){
        echo '
        <script>alert("Berhasil menambah barang");
        window.location.href="stock.php"
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal menambah barang baru");
        window.location.href="stock.php"
        </script>
        ';
    }
}



if(isset($_POST['tambahpelanggan'])){
    $namapelanggan = $_POST['namapelanggan'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($c, "INSERT INTO pelanggan (namapelanggan, notelp, alamat) VALUES ('$namapelanggan','$notelp','$alamat')");

    if($insert){
        echo '
        <script>alert("Berhasil menambah pelanggan baru");
        window.location.href="index.php"
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal menambah pelanggan baru");
        window.location.href="index.php"
        </script>
        ';
    }
}


if(isset($_POST['tambahpesanan'])){
    $idpelanggan = $_POST['idpelanggan'];

    $insert = mysqli_query($c, "INSERT INTO pesanan (idpelanggan) VALUES ('$idpeanggan')");

    if($insert){
        echo '
        <script>alert("Berhasil menambah pelanggan baru");
        window.location.href="pesanan.php"
        </script>
        ';
    } else {
        echo '
        <script>alert("Gagal menambah pelanggan baru");
        window.location.href="pelanggan.php"
        </script>
        ';
    }
}



?>