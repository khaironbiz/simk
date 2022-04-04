                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data_shift_ini['id']?>">
                            <?= $shift_ini;?>
                        </button>
                        <form action="" method="POST">
                            <div class="modal fade" id="exampleModal<?= $data_shift_ini['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                            <h5 class="modal-title">Batalkan Jadwal</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">
                                            <div class="row">
                                                <label for="staticEmail" class="col-3 col-form-label">Nama </label>
                                                <div class="col-9 col-md-6">
                                                    <select class="form-control form-control-sm" name="batal_realisasi" required>
                                                        <option value="<?= $data_shift_ini['has_laporan_shift_perawat']; ?>"><?= perawat($data_shift_ini['id_perawat'])?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="staticEmail" class="col-3 col-form-label">Ruangan</label>
                                                <div class="col-9 col-md-6">
                                                    <select class="form-control form-control-sm" name="id_ruangan" required>
                                                        <option value="<?= id_ruangan($data_shift_ini['ruangan'])?>"><?= $data_shift_ini['ruangan']?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="staticEmail" class="col-3 col-form-label">Shift</label>
                                                <div class="col-9 col-md-6">
                                                    <select class="form-control form-control-sm" name="shift" required>
                                                            <option value="<?= $shift_ini; ?>"><?= nama_shift($shift_ini)?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-3 col-form-label">Tanggal</label>
                                                <div class="col-3 col-md-2">
                                                    <select class="form-control form-control-sm" name="d" required>
                                                        <option value="<?= date('d')?>"><?= date('d')?></option>
                                                    </select>
                                                </div>
                                                <div class="col-3 col-md-2">
                                                    <select class="form-control form-control-sm" name="m" required>
                                                        <option value="<?= date('m')?>"><?= date('m')?></option>
                                                    </select>
                                                </div>
                                                <div class="col-3 col-md-2">
                                                    <select class="form-control form-control-sm" name="y" required>
                                                        <option value="<?= date('Y')?>"><?= date('Y')?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-3 col-form-label">Password</label>
                                                <div class="col-9 col-md-6">
                                                    <input type="password" required name="password" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-3 col-form-label"></label>
                                                <div class="col-9 col-md-6">
                                                    <input type="checkbox" required name="konfirmasi" value="<?= $data_shift_ini['has_laporan_shift_perawat']; ?>"> Dengan ini saya menyatakan pembatalan jadwal
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer bg-secondary">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>