<button type="submit" class="btn btn-success" name="tambahbarang">Edit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" data-target="#delete<?=$idpr;?>">
                                                    Delete
                                                </button>
                                                </td>
                                                <!-- number format berfungsi untuk menformat angka contoh
                                            200000 menjadi seperti ini 200,000 jadi ada komanya -->
                                            </tr>
                                            <!-- The Modal delete detailpesanan --> 
                                        <!-- <div class="modal fade" id="delete<?=$idpr;?>"> -->
                                        <div class="modal fade" id="delete<?=$idpr;?>">

                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Apakah Anda Yakin ingin menghapus barang ini?</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                <form method="post" action="./fungsi/hapusProdukpesanan.php">
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Hapus Barang ini
                                                <input type="hidden" name="idp" value="<?= $iddp; ?>">
                                                <input type="hidden" name="idpr" value="<?= $idpr; ?>">
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapusprodukpesanan">Ya</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>

                                        <?php
                                        }; //end of white

                                        ?>



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