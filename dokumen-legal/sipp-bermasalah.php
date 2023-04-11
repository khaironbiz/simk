<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <link rel="icon" href="https://ppni.or.id/simk/image/LOGO-PPNI.png">
    <title>SIPP Bermasalah</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 table-responsive ">
                    <h1>Dekumen Legal Bermasalah</h1><br>
                    <a href="sipp-bermasalah.php" class="btn btn-primary">SIPP Bermasalah</a>
                    <a href="str-bermasalah.php" class="btn btn-danger">STR Bermasalah</a>
                    <a href="https://ppni.or.id/simk/id/upload-sipp-str.php" class="btn btn-success">UNGGAH DOKUMEN</a>
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIRA</th>
                            <th>SIPP</th>
                            <th>Masa Berlaku</th>
                            <th>Notif</th>
                        </tr>
                        <?php
                        include('../auth/koneksi.php');
                        $no             = 1;
                        $hari_ini       = date('Y-m-d');
                        $sql            = mysqli_query($host, "SELECT * FROM nira WHERE sipp_ahir < '$hari_ini' AND blokir ='N' ORDER BY nama");
                        while($data     = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama']?></td>
                            <td><?= $data['nira']?></td>
                            <td><?= $data['sipp']?></td>
                            <td><?= $data['sipp_ahir']?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['nira']?>">
                                    Notif
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $data['nira']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan SIPP </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-sm">
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" name="nama" value="<?= $data['nama']?>" readonly class="form-control form-control-sm" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIRA</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" name="nira" value="<?= $data['nira']?>" readonly class="form-control form-control-sm" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>SIPP</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" name="sipp" value="<?= $data['sipp']?>" readonly class="form-control form-control-sm" >
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>SIPP Exp</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="date" name="sipp_ahir" value="<?= $data['sipp_ahir']?>" readonly class="form-control form-control-sm" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>STR</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" name="str" value="<?= $data['str']?>" readonly class="form-control form-control-sm" >
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>STR Exp</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="date" name="str_ahir" value="<?= $data['str_ahir']?>" readonly class="form-control form-control-sm" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>HP</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" name="hp" value="<?= $data['hp']?>" readonly class="form-control form-control-sm" >
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Kirim Pesan</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <?php
                        }
                        if(isset($_POST['str_ahir'])){
                            $nama       = $_POST['nama'];
                            $nira       = $_POST['nira'];
                            $str        = $_POST['str'];
                            $str_ahir   = $_POST['str_ahir'];
                            $sipp       = $_POST['sipp'];
                            $sipp_ahir  = $_POST['sipp_ahir'];
                            $hp         = $_POST['hp'];
                            $time       = date('Y-m-d H:i:s');
                            $insert     = mysqli_query($host,"INSERT INTO notifikasi SET 
                                            pengirim    = 'pengirim',
                                            penerima    = '$nira',
                                            time_notif  = '$time'");
                            if($insert ){
                                $text = "
                                nama : $nama,
                                nira : $nira,
                                str : $str $str_ahir,
                                sipp : $sipp $sipp_ahir
                                ";

                                echo "<script>window.open('https://api.whatsapp.com/send?phone=62$hp&text=hallo nama: $nama, nira: $nira, str : $str exp : $str_ahir, sipp : $sipp exp : $sipp_ahir, segera proses dokumen legal saudara dan update dokumen legal pada simk ppni rspon, terimakasih ---- ini adalah notif dari simk ppni rspon -----','_blank')</script>";
                                echo "<script>document.location=\"sipp-bermasalah.php\"</script>";
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <h1></h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>

    </body>
</html>