<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Membuat Zoom Meeting</title>
    </head>
    <?php
    date_default_timezone_set("Asia/Jakarta");
     include('../auth/session.php');
    ?>
    <body>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <form action="meeting-creator.php" method="POST">
                        <div class="card">
                            <div class="card-header text-white text-center bg-black">
                                <h6>Membuat Zoom Meeting</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Topik</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm" name="topik">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Waktu</label>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <input type="date" class="form-control form-control-sm" value="<?= date('Y-m-d')?>"  name="date_meeting">
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <select class="form-control form-control-sm" name="waktu_awal">
                                            <?php
                                                $time           = date('Y-m-d H').":00:00";
                                                $jam_sekarang   = strtotime($time);
                                                $kos_jam        = 60*60;
                                                $jam_awal       = $jam_sekarang-($kos_jam);
                                                $jam_ahir       = $jam_awal + (12*($kos_jam));
                                                $xx             = 1;
                                                while($xx<=48):
                                                   $detik_list  = ($xx*30*60)+3600;
                                                   $jam_list    = $jam_awal + $detik_list;
                                                   $jam_list    = date("H:i:00",$jam_list);
                                            ?>
                                            <option><?=  $jam_list ?></option>
                                            <?php
                                               $xx++;
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Durasi</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control form-control-sm mt-1"  name="durasi_jam" required>
                                            <option value="">--pilih--</option>
                                            <?php
                                            $jam  = 0;
                                            while($jam <=8){
                                            ?>
                                            <option value=<?= $jam?>><?= $jam?> Jam</option>
                                            <?php
                                            $jam++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control form-control-sm mt-1"  name="durasi_menit" required>
                                            <option value="">--pilih--</option>
                                            <?php
                                            $menit  = 0;
                                            while($menit < 4){
                                            ?>
                                            <option value=<?= $menit*15?>><?= $menit*15?> Menit</option>
                                            <?php
                                            $menit++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control form-control-sm mt-1"  name="passcode">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-danger" type="submit">SAVE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>