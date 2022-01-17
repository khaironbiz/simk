                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tidak-hadir">
                    Input Tidak Hadir
                </button>
                <form action="" method="POST">
                    <div class="modal fade" id="tidak-hadir" tabindex="-1" aria-labelledby="tidak-hadirLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-dark">
                                    <h5 class="modal-title">Tambah Pasien</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body ">
                                    <div class="row">
                                        <label for="staticEmail" class="col-3 col-form-label">Ruangan</label>
                                        <div class="col-9 col-md-6">
                                            <select class="form-control form-control-sm" name="id_ruangan" required>
                                                    <option value="<?= id_ruangan($data_pengguna['ruangan'])?>"><?= $data_pengguna['ruangan']?></option>
                                                    <?php
                                                    $id_ruanganku   = id_ruangan($data_pengguna['ruangan']);
                                                    $sql_ruanganku  = mysqli_query($host, "SELECT * FROM ruangan WHERE id !='$id_ruanganku'");
                                                    while($ruanganku= mysqli_fetch_array( $sql_ruanganku)){
                                                    ?>
                                                    <option value="<?= $ruanganku['id']?>"><?= $ruanganku['ruangan']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                            </select>
                                            <input type="hidden" name="tidak-hadir" value="<?= uniqid()?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="staticEmail" class="col-3 col-form-label">Alasan Tidak Hadir</label>
                                        <div class="col-9 col-md-6">
                                            <select class="form-control form-control-sm" name="shift" required>
                                                    <option value="">--Pilih--</option>
                                                    <?php
                                                    $sql_shift = mysqli_query($host, "SELECT * FROM shift_perawat WHERE type='0'");
                                                    while($shift   = mysqli_fetch_array( $sql_shift)){
                                                    ?>
                                                    <option value="<?= $shift['kode']?>"><?= $shift['nama_shift']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                            </select>
                                        
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label">Tanggal</label>
                                        <div class="col-3 col-md-2">
                                            <select class="form-control form-control-sm" name="d" required>
                                                <option value="<?= date('d')?>"><?= date('d')?></option>
                                                <?php
                                                $d_min  = 1;
                                                $d_max  = 31;
                                                for($i = $d_min; $i<= $d_max; $i++){
                                                    $i = str_pad($i, 2, '0', STR_PAD_LEFT);
                                                ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php
                                                }
                                                ?>
                                            
                                            </select>
                                        </div>
                                        <div class="col-3 col-md-2">
                                            <select class="form-control form-control-sm" name="m" required>
                                                <option value="<?= date('m')?>"><?= date('m')?></option>
                                                <?php
                                                $d_min  = 1;
                                                $d_max  = 12;
                                                for($i = $d_min; $i<= $d_max; $i++){
                                                    $i = str_pad($i, 2, '0', STR_PAD_LEFT);
                                                ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php
                                                }
                                                ?>
                                            
                                            </select>
                                        </div>
                                        <div class="col-3 col-md-2">
                                            <select class="form-control form-control-sm" name="y" required>
                                                <option value="<?= date('Y')?>"><?= date('Y')?></option>
                                                <?php
                                                $d_min  = date('Y')-1;
                                                $d_max  = date('Y')+1;
                                                for($i = $d_min; $i<= $d_max; $i++){
                                                ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php
                                                }
                                                ?>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <table class="table table-sm">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Pendidikan</th>
                                            <th>Jadwal</th>
                                        </tr>
                                        <?php
                                            $hari_ini               = date('Y-m-d');
                                            $ruanganku              = $data_pengguna['ruangan'];
                                            $norut                  = 1;
                                            $sql_perawat_ini        = mysqli_query($host,"SELECT * FROM nira WHERE ruangan ='$ruanganku' and blokir ='N' ORDER BY nama");
                                            while($data_perawat_ini = mysqli_fetch_array($sql_perawat_ini)){
                                                $id_perawat_ini     = $data_perawat_ini['nira'];
                                                $sql_realisasi_ini  = mysqli_query($host,"SELECT * FROM laporan_shift_perawat WHERE id_perawat='$id_perawat_ini' AND tgl='$hari_ini'");
                                                $count_realisasi_ini= mysqli_num_rows($sql_realisasi_ini);
                                                $realisasi_ini      = mysqli_fetch_array($sql_realisasi_ini);
                                            
                                        ?>
                                        <tr>
                                            <td><?= $norut++?></td>
                                            <td>
                                                <?php
                                                if($count_realisasi_ini <1){
                                                ?>
                                                    <input type="checkbox" value="<?= $data_perawat_ini['nira']?>" name="nira[]"> <?= $data_perawat_ini['nama']?>
                                                <?php
                                                }else{
                                                    echo $data_perawat_ini['nama'];
                                                }
                                                ?>
                                            </td>
                                            <td><?= $data_perawat_ini['pendidikan']?></td>
                                            <td>
                                                <?php
                                                if($count_realisasi_ini>0){
                                                    echo nama_shift($realisasi_ini['shift']);
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                                <div class="modal-footer bg-secondary">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>