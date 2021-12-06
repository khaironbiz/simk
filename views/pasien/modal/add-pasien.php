                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </button>
                <form action="" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-sm">
                                        <tr>
                                            <td>NRM</td>
                                            <td>:</td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" placeholder="Nomor Rekam Medik" name="nrm" required>
                                                <input type="hidden" class="form-control form-control-sm" name="add-pasien" value="<?= uniqid() ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control form-control-sm" placeholder="nama pasien" name="nama_pasien" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>JK</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control form-control-sm" name="sex" required>
                                                    <option value=''>--jenis kelamin--</option>
                                                    <?php
                                                    $sql_sex  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='4'");
                                                    while($sex    = mysqli_fetch_array( $sql_sex)){
                                                    ?>
                                                    <option value="<?= $sex['id']?>"><?= $sex['nama_submaster']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Lahir</td>
                                            <td>:</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <select class="form-control form-control-sm" required name="tgl">
                                                            <option value=''>--tanggal--</option>
                                                            <?php
                                                            $a    =1;
                                                            while($a <= 31){
                                                            ?>
                                                            <option value="<?= $a?>"><?= $a?></option>
                                                            <?php
                                                            $a++;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control form-control-sm" required name="bln">
                                                            <option value=''>--bulan--</option>
                                                            <?php
                                                            $b    =1;
                                                            while($b <= 12){
                                                            ?>
                                                            <option value="<?= $b?>"><?= $b?></option>
                                                            <?php
                                                            $b++;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control form-control-sm" required name="th">
                                                            <option value=''>--tahun--</option>
                                                            <?php
                                                            $c      =1900;
                                                            $d      = date('Y');
                                                            while($c <= $d){
                                                            ?>
                                                            <option value="<?= $c?>"><?= $c?></option>
                                                            <?php
                                                            $c++;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                                
                                        </tr>
                                        <tr>
                                            <td>No KTP</td>
                                            <td>:</td>
                                            <td><input type="number" class="form-control form-control-sm" placeholder="NIK" name="nik"></td>
                                        </tr>
                                        <tr>
                                            <td>Status Menikah</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control form-control-sm" name="status_nikah" required>
                                                    <option value="">--status pernikahan--</option>
                                                    <?php
                                                    $sql_nikah  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='7'");
                                                    while($nikah    = mysqli_fetch_array( $sql_nikah)){
                                                    ?>
                                                    <option value="<?= $nikah['id']?>"><?= $nikah['nama_submaster']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control form-control-sm" name="agama" required>
                                                    <option value="">--agama--</option>
                                                    <?php
                                                    $sql_nikah  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='3'");
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