<?php


    include('../auth/koneksi.php');
    include('aksi/add_survey.php');
    // $url1=$_SERVER['REQUEST_URI'];
    // header("Refresh: 58; URL=$url1");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Survey Calon Ketua DPK</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center mt-5">
        <div class="card">
            <div class="card-header bg-danger text-white text-center mt-3">
                <h4>Survey Calon Ketua DPK PPNI RSPON</h4>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3 mb-3">
                    <form action="" method="POST">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h3 class="text-white">Calon Ketua DPK PPNI RSPON</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIRA</th>
                                        <th>Satu</th>
                                        <th>Dua</th>
                                        <th>Tiga</th>
                                        <th>Total</th>
                                    </tr>
                                        <?php
                                        $no=1;
                                        $sql_hasil      = mysqli_query($host,"SELECT * FROM muskom_survey WHERE created_by='' LIMIT 1 ");
                                        while($data_survey= mysqli_fetch_array($sql_hasil)){
                                            $nira       = $data_survey['nira'];
                                            $nama       = $data_survey['nama_calon'];

                                            $sql_satu   = mysqli_query($host,"SELECT nama_calon FROM muskom_survey WHERE 
                                                                        nama_calon='$nama' and nilai_calon = '50'");
                                            $count_satu = mysqli_num_rows($sql_satu);
                                            $nilai_satu = $count_satu*50;
                                            $sql_dua    = mysqli_query($host,"SELECT nama_calon FROM muskom_survey WHERE 
                                                                        nama_calon='$nama' and nilai_calon = '30'");
                                            $count_dua  = mysqli_num_rows($sql_dua);
                                            $nilai_dua  = $count_dua*30;
                                            $sql_tiga   = mysqli_query($host,"SELECT nama_calon FROM muskom_survey WHERE 
                                                                        nama_calon='$nama' and nilai_calon = '10'");
                                            $count_tiga = mysqli_num_rows($sql_tiga);
                                            $nilai_tiga = $count_tiga*10;
                                            $count      = $count_satu+$count_dua+$count_tiga;
                                            $nilai      = $nilai_satu+$nilai_dua+$nilai_tiga;


                                            $sql_calon  = mysqli_query($host,"SELECT * FROM muskom_calon WHERE nira='$nira'");
                                            $count_nira = mysqli_num_rows($sql_calon);
                                            $has_calon  = md5(uniqid());
                                            if($count_nira < 1 ){
                                                $tambah_data    = mysqli_query($host,"INSERT INTO muskom_calon SET
                                                                    nira        = '$nira',
                                                                    nama        = '$nama',
                                                                    satu        = '$count_satu',
                                                                    dua         = '$count_dua',
                                                                    tiga        = '$count_tiga',
                                                                    count       = '$count',
                                                                    has_calon   = '$has_calon'");
                                                if($tambah_data){
                                                    $update_survey  = mysqli_query($host,"UPDATE muskom_survey SET created_by ='1' WHERE nira='$nira'");
                                                    $self=$_SERVER['PHP_SELF'];
                                                    echo "<script>document.location=\"$self\"</script>"; 
                                                }
                                            }
                                        ?>
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?= $data_survey['nama_calon'];?></td>
                                        <td><?= $nira['nira'];?></td>
                                        <?php
                                            $nama=$data_survey['nama_calon'];
                                            
                                        ?>
                                        
                                        <td><?= "$count_satu ($nilai_satu)"; ?></td>
                                        <td><?= "$count_dua ($nilai_dua)"; ?></td>
                                        <td><?= "$count_tiga ($nilai_tiga)"; ?></td>
                                        <td><?= "$count ($nilai)" ?></td>
                                    </tr>
                                
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary text-right" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                
            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>