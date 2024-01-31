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