<!doctype html>
<html lang="en">
<title>Create Meeting Zoom</title>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Membuat Zoom Meeting</title>
</head>

<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="card">
            <div class="card-header text-white text-center bg-black">
                <h6>Membuat Zoom Meeting</h6>
            </div>
            <div class="card-body">
                <div class="row table-responsive table-bordered">
                    <table class="table table-sm table-hover">
                        <tr>

                            <?php

                            $w_awal = 6;
                            $w_ahir = 10;
                            while($w_awal <= $w_ahir){
                            ?>

                            <td colspan="3" class="text-center"><?= $w_awal?></td>
                            <?php
                                $w_awal++;
                            }
                            ?>

                        </tr>
                        <tr>
                            <?php
                            $w_awal1 = 6;
                            $w_ahir1 = 10;
                            while($w_awal1 <= $w_ahir1){
                                ?>
                                <td>15</td>
                                <td>30</td>
                                <td>45</td>
                                <?php
                                $w_awal1++;
                            }
                            ?>

                        </tr>
                        <tr>
                            <?php
                            $hari_ini = date('Y-m-d');
                            $w_awal2 = 6;
                            $w_ahir2 = 10;
                            while($w_awal2 <= $w_ahir2){
                                $jam = $hari_ini." ".$w_awal2.":00:00";
                                $detik_awal= strtotime($jam);

                                $menit = 1;
                                while($menit <=3):
                                    $detik_ahir = $detik_awal+($menit*15*60);
                                ?>
                                <td class="bg-danger"><?= date('Y-m-d H:i:s', $detik_ahir)?></td>
                                <?php
                                $menit++;
                                endwhile;
                                $w_awal2++;
                            }
                            ?>

                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-danger" type="submit">SAVE</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>