<?php
include 'koneksi.php';
require 'ceklogin.php';

//Hitung jumlah barang
// $h1 = mysqli_query($c, "select * from produk");
// $h2 = mysqli_num_rows($h1); // jumlah barang

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title></title>
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
                    <h1 class="mt-4">Data Barang Masuk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Selamat Datang</li>
                    </ol>                  
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah Barang Masuk
                    </button>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Barang Masuk
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                      <!-- Button to Open the Modal edit barang masuk-->
                                                    <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#editbarangmasuk<?=$idmasuk?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#delete<?=$idmasuk;?>">
                                                        Hapus 
                                                    </button>
                                                    </td>
                                                </tr>

                                            <!-- The Modal alert edit barang masuk-->
                                            <div class="modal fade" id="editbarangmasuk<?=$idmasuk?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ubah Barang Masuk</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                                                                <button type="submit" class="btn btn-success" name="editdatabarangmasuk">Submit</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- The Modal delete barang masuk--> 
                                            <div class="modal fade" id="delete<?=$idmasuk;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Apakah Anda Yakin ingin menghapus Data Barang Masuk?</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <form method="post" action="./fungsi/hapusBarangMasuk.php">
                                                            <div class="modal-body">
                                                                Hapus data ini
                                                                <input type="hidden" name="idp" value="<?=$idproduk?>">
                                                                <input type="hidden" name="idm" value="<?=$idmasuk?>">
                                                            </div>

                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success" name="hapusdatabarangmasuk">Ya</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                <h4 class="modal-title">Tambah Barang Masuk</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
        <button type="submit" class="btn btn-success" name="barangmasuk">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</form>


        </div>
    </div>
</div>


</html>