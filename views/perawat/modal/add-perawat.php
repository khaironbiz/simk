                    
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        Add Perawat
                    </button>

                    <!-- Modal -->
                    
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form action="" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title" id="staticBackdropLabel">Cari Perawat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="nira">
                                    <option value=''>---pilih---</option>
                                    <?php
                                    $sql_nira_ini = mysqli_query($host,"SELECT * FROM nira WHERE blokir='N' ORDER BY nama");
                                    while($data_nira = mysqli_fetch_array($sql_nira_ini)){
                                    ?>
                                    <option><?= $data_nira['nama']?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                    