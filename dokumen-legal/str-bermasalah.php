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
                <div class="col">
                    <h1>Dekumen Legal Bermasalah</h1><br>
                    <a href="sipp-bermasalah.php" class="btn btn-primary">SIPP Bermasalah</a><a href="str-bermasalah.php" class="btn btn-danger">STR Bermasalah</a>
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIRA</th>
                            <th>STR</th>
                            <th>Masa Berlaku</th>
                        </tr>
                        <?php
                        include('../auth/koneksi.php');
                        $no             = 1;
                        $hari_ini       = date('Y-m-d');
                        $sql            = mysqli_query($host, "SELECT * FROM nira WHERE str_ahir < '$hari_ini' AND blokir ='N'");
                        while($data     = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama']?></td>
                            <td><?= $data['nira']?></td>
                            <td><?= $data['str']?></td>
                            <td><?= $data['str_ahir']?></td>
                        </tr>
                        
                        <?php
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