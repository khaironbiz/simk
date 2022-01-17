                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id']?>">
                    Update
                </button>
                <form action="" method="POST">
                    <div class="modal fade" id="exampleModal<?= $data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-dark">
                                    <h5 class="modal-title">Update Shift <?= $data['nama_shift']?></h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Kode Shift</label>
                                        <div class="col-sm-10 col-8">
                                            <input type="text" readonly  class="form-control form-control-sm" value="<?= $data['kode']?>" name="kode">
                                        <input type="hidden" readonly  class="form-control form-control-sm" value="<?= $data['id']?>" name="edit_shift">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Nama Shift</label>
                                        <div class="col-sm-10 col-8">
                                            <input type="text" class="form-control form-control-sm" value="<?= $data['nama_shift']?>" name="nama_shift">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-4 col-form-label">Jam Kerja</label>
                                        <div class="col-sm-5 col-4">
                                            <input type="time" class="form-control form-control-sm" value="<?= $data['jam_mulai']?>" name="jam_mulai">
                                        </div>
                                        <div class="col-sm-5 col-4">
                                            <input type="time" class="form-control form-control-sm" value="<?= $data['jam_selesai']?>" name="jam_selesai">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer bg-secondary">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>