                <button type="button" class="btn <?= $label_bed?> btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data_bed['has_kamar_bed']?>">
                    <?= $status_bed?>
                </button>
                <form action="" method="POST">
                    <div class="modal fade" id="exampleModal<?= $data_bed['has_kamar_bed']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Penutupan Tempat Tidur</h5>
                                    <input type="hidden" name="tutup_bed" value="<?= $_GET['key']?>">
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
                                                <select class="form-control form-control-sm" name="id_bed" required>
                                                    <option value="<?= $data_bed['has_kamar_bed']?>"><?= $ruangan['ruangan']?></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Kamar</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control form-control-sm" name="id_kamar" required>
                                                    <option value="<?= $ruangan['id_kamar']?>"><?= $ruangan['no_kamar']?></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Kamar</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control form-control-sm" name="nama_kamar" required>
                                                    <option value="<?= $ruangan['id_kamar']?>"><?= $ruangan['nama_kamar']?></option>
                                                </select>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Tempat Tidur</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control form-control-sm" name="kelas_perawatan" required>
                                                    <option value="<?= $data_bed['has_kamar_bed']?>">Bed <?= ucwords($data_bed['nama_bed'])?></option>
                                                    
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="radio" name="blokir" value="1" required>
                                                    <label for="css">Tutup</label><br>
                                                    <input type="radio" name="blokir" value="0" required>
                                                    <label for="css">Buka</label><br>
                                                </td>
                                            </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>:</td>
                                            <td>
                                                <input type="password" class="form-control form-control-sm" name="password" required>
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