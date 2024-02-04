<?php
// session_start();
require 'function.php';
// include "ceklogin3.php";
// include "koneksi.php";

// // Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak, alihkan ke halaman login
    // header("Location: login.php");
    header("Location: login.php?pesan=harus_login");

    // exit(); // Pastikan untuk keluar setelah melakukan pengalihan header
}

//Hitung jumlah pesanan
$h1 = mysqli_query($c, "select * from penjualan");
$h2 = mysqli_num_rows($h1); // jumlah pesanan

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.php">PPLG KASIR</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Order
                        </a>
                        <a class="nav-link" href="stock.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Stock Barang
                        </a>
                        <a class="nav-link" href="masuk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Barang Masuk
                        </a>
                        <a class="nav-link" href="pelanggan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Kelola Pelanggan
                        </a>
                        <a class="nav-link" href="user.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Kelola User
                        </a>
                        <a class="nav-link" href="logout.php">
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Selamat Datang</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Jumlah pesanan: <?=$h2;?></div>
                            </div>
                        </div>

                    </div>

                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah Pesanan Baru
                    </button>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Pesanan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Jumlah</th>
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

                                            // hitung jumlah
                                            // $hitungjumlah = mysqli_query($c,"select * from detailpenjualan where
                                            // PenjualanID='$PenjualanID'");

                                            $hitungjumlah = mysqli_query($c, "select * from detailpenjualan where
                                             PenjualanID='$PenjualanID'");


                                            $jumlah = mysqli_num_rows($hitungjumlah);

                                        ?>

                                            <tr>
                                                <td><?= $PenjualanID; ?></td>
                                                <td><?= $Tanggal; ?></td>
                                                <td><?= $NamaPelanggan; ?> - <?= $Alamat; ?></td>
                                                <td><?= $jumlah; ?></td>
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
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                                                                <button type="submit" class="btn btn-success" name="hapusdatapesanan">Ya</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pesanan Baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                    <button type="submit" class="btn btn-succes" name="tambahpesanan">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </form>

        </div>
    </div>
</div>


</html>