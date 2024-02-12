<?php
include 'koneksi.php';

session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak, alihkan ke halaman login
    header("Location: login.php?pesan=harus_login");
    exit(); // Pastikan untuk keluar setelah melakukan pengalihan header
}


if(isset($_GET['idp'])){
    $idp = $_GET['idp'];
   

    $ambilnamapelanggan = mysqli_query($c, "SELECT * FROM penjualan p, pelanggan pl WHERE p.PelangganID=pl.PelangganID AND p.PenjualanID=$idp");

if (!$ambilnamapelanggan) {
    die("Kueri gagal: " . mysqli_error($c));
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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>View Data Pesanan</title>
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
                    <h1 class="mt-4">Data Pesanan:  <?=$idp;?></h1>
                    <h4 class="mt-4">Nama Pelanggan:  <?=$namapel;?></h4>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Selamat Datang</li>
                    </ol>

                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah Barang
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
                                            // $idp = $p['PenjualanID'];
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
                                                    <!-- Button to Open the Modal edit detail pesanan-->
                                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#prosesdetailpesanan<?=$idpr?>">
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

                                    <!-- The Modal alert proses bayar detail pesanan/penjualan-->
                                    <div class="modal fade" id="prosesdetailpesanan<?=$idpr?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Bayar Detail Pesanan</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <form method="post" action="./fungsi/prosesPembayaran.php">

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <label for="">Nama Produk</label>
                                                                <input type="text" name="NamaProduk" class="form-control" placeholder="Nama Produk" value="<?= $namaproduk; ?>" disabled>
                                                                <label for="qty">Jumlah Beli</label>
                                                                <input type="number" name="qty" class="form-control mt-2" placeholder="Jumlah Beli" value="<?= $qty; ?>" readonly>
                                                                <input type="hidden" name="iddp" class="form-control mt-2" value="<?=$iddp?>">
                                                                <input type="hidden" name="idp" class="form-control mt-2" value="<?=$idp?>">
                                                                <input type="hidden" name="idpr" class="form-control mt-2" value="<?=$idpr?>">
                                                                <input type="hidden" name="harga" class="form-control mt-2" value="<?=$harga?>">
                                                                <input type="hidden" name="subtotal" class="form-control mt-2" value="<?=$subtotal?>">
                                                                <input type="hidden" name="idpel" class="form-control mt-2" value="<?=$idpel?>">
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success" name="prosesdetailpesanan">Submit</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    <!-- The Modal alert edit detail pesanan/penjualan-->
                                    <div class="modal fade" id="editdetailpesanan<?=$idpr?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ubah Data Detail Pesanan</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <form method="post" action="./fungsi/editDetailPesanan.php">

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <input type="text" name="NamaProduk" class="form-control" placeholder="Nama Produk" value="<?= $namaproduk; ?>" disabled>
                                                                <input type="number" name="qty" class="form-control mt-2" placeholder="Harga" value="<?= $qty; ?>">
                                                                <input type="hidden" name="iddp" class="form-control mt-2" value="<?=$iddp?>">
                                                                <input type="hidden" name="idp" class="form-control mt-2" value="<?=$idp?>">
                                                                <input type="hidden" name="idpr" class="form-control mt-2" value="<?=$idpr?>">
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success" name="editdetailpesanan">Submit</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                    <!-- The Modal delete detailpesanan --> 
                                    <div class="modal fade" id="delete<?=$idpr;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Apakah Anda Yakin ingin menghapus barang ini?</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal Body -->
                                                <form method="post" action="./fungsi/hapusProdukpesanan.php">
                                                    <div class="modal-body">
                                                        Hapus Barang ini
                                                        <input type="hidden" name="idp" value="<?= $iddp; ?>">
                                                        <input type="hidden" name="idpr" value="<?= $idpr; ?>">
                                                        <input type="hidden" name="idorder" value="<?= $idp; ?>">
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success" name="hapusprodukpesanan">Ya</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    // Ditutupi dengan komentar, saya asumsikan ada kode tambahan di sini
                                    // Jika tidak, Anda bisa menghapus komentar ini dan sebelumnya.
                                    };
                                    // End of white
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
                                    <input type="text" class="form-control" id="floatingInput" placeholder="total harga" 
                                    value="Rp<?= number_format($totalHarga); ?>">
                                    <label for="floatingInput">Total Pembelian</label>
                                                  <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-outline-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                                            Simpan Total Harga / Pembelian
                                        </button>

                                        <form method="post" action="./fungsi/simpan_Totalpembayaran.php">
                                            <?php 
                                            include '../koneksi.php';
                                            $detailpenjualan = mysqli_query($koneksi, "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE 	PenjualanID='$d[PenjualanID]'"); 
                                            $row = mysqli_fetch_assoc($detailpenjualan); 
                                            $sum = $row['TotalHarga'];
                                            ?>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="TotalHarga" value="<?php echo $sum; ?>">
                                                        <input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
                                                        <input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <button class="btn btn-info btn-sm form-control" type="submit">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    
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
        <button type="submit" class="btn btn-success" name="tambahproduk">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</form>


        </div>
    </div>
</div>


</html>