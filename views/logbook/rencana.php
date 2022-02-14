<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <?php
                include('aksi/add-rencana.php');
                if(isset($_SESSION['status'])&& $_SESSION['status'] !=""){
                ?>
                <div class="alert alert-<?= $_SESSION['status_info']?> alert-dismissible fade show" role="alert">
                <strong>Hay</strong> <?= $_SESSION['status']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php
                unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <b>Rencana SKP PNS</b>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Kegiatan</th>
                                    <th>Qty</th>
                                    <th>SKP</th>
                                    <th>Total</th>
                                </tr>
                                <?php
                                    $no_a       = 1;    
                                    $sql        = mysqli_query($host,"SELECT DISTINCT (id_a) FROM jabfung_rencana WHERE id_perawat ='$user_check'");
                                    while($data = mysqli_fetch_array($sql)){
                                        $id_a   = $data['id_a'];
                                        $unsur  = unsur($id_a);
                                        $nomor_a= $no_a++;
                                ?>
                                <tr>
                                    <td><?= $nomor_a?></td>
                                    <td><b><?= $unsur; ?></b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
                                    $no_b       = 1;    
                                    $sql_sub    = mysqli_query($host,"SELECT DISTINCT (id_b) FROM jabfung_rencana WHERE 
                                                    id_perawat ='$user_check' AND id_a = '$id_a'");
                                    while($data_sub = mysqli_fetch_array($sql_sub)){
                                        $id_b       = $data_sub['id_b'];
                                        $sub_unsur  = sub_unsur($id_b);
                                        $nomor_b    = $nomor_a.".".$no_b++
                                ?>
                                <tr>
                                    <td><?= $nomor_b?></td>
                                    <td><?= $sub_unsur; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
                                    $no_c       = 1;    
                                    $sql_jenis    = mysqli_query($host,"SELECT DISTINCT (id_c) FROM jabfung_rencana WHERE 
                                                    id_perawat ='$user_check' AND id_b = '$id_b'");
                                    while($data_jenis = mysqli_fetch_array($sql_jenis)){
                                        $id_c       = $data_jenis['id_c'];
                                        $jenis_kegiatan  = jenis_kegiatan($id_c);
                                        $nomor_c      = $nomor_b.".".$no_c++
                                ?>
                                <tr>
                                    <td><?= $nomor_c ?></td>
                                    <td><?= $jenis_kegiatan?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
                                    $no_d       = 1;    
                                    $sql_kegiatan    = mysqli_query($host,"SELECT * FROM jabfung_rencana WHERE 
                                                    id_perawat ='$user_check' AND id_c = '$id_c'");
                                    while($data_kegiatan = mysqli_fetch_array($sql_kegiatan)){
                                        $id_d       = $data_kegiatan['id_d'];
                                        $kegiatan  = kegiatan($id_d);
                                        $nomor_d    = $nomor_c.".".$no_d++
                                ?>
                                <tr>
                                    <td><?= $nomor_d ?></td>
                                    <td><?= $kegiatan?></td>
                                    <td><?= $data_kegiatan['qty']?></td>
                                    <td><?= $data_kegiatan['kredit']?></td>
                                    <td><?= $data_kegiatan['jumlah']?></td>
                                </tr>
                                <?php
                                    }
                                    }
                                    }
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->