                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </button>
                <form action="" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-sm">
                                        <tr>
                                            <td>Nama Ruangan</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control form-control-sm" name="status_nikah" required>
                                                    <option value=""><?= $ruangan['ruangan']?></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Kamar</td>
                                            <td>:</td>
                                            <td><input type="number" class="form-control form-control-sm" name="no_kamar"></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Kamar</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control form-control-sm" name="nama_kamar"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Kelas Perawatan</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control form-control-sm" name="kelas_perawatan" required>
                                                    <option value="">--kelas perawatan--</option>
                                                    <?php
                                                    $sql_nikah  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='25'");
                                                    while($nikah    = mysqli_fetch_array( $sql_nikah)){
                                                    ?>
                                                    <option value="<?= $nikah['id']?>"><?= $nikah['nama_submaster']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>