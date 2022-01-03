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
                <div class="col-md-6 mt-3 mb-3">
                    <form action="" method="POST">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h3 class="text-white">Calon Ketua DPK PPNI RSPON</h3>
                            </div>
                            <div class="card-body">
                                <p align="justify">Kepada yth Sejawat Perawat dilingkungan RS Pusat Otak Nasional, dalam rangka mensukseskan musyawarah komisariat PPNI RSPON bersama ini kami mohon memberikan pendapat siapakah perawat yang paling cocok untuk memimpin DPK Komisariat untuk periode 2022 sd 2027. dalam survey ini kami buat 3 pilihan calon.</p>
                                <p>Pastikan pilihanmu harus berbeda</p>
                                <h4 class="text-primary">Kandidat Calon pertama</h4>
                                <input type="hidden" value="<?= uniqid()?>" name="add_survey">
                                <label for="exampleDataList" class="form-label">Pilih nama perawat dibawah ini Skor 50</label>
                                <input type="hidden" value="50" name="nilai1">
                                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Cari perawat..." name="perawat1" required>
                                <datalist id="datalistOptions">
                                    <?php
                                    $sql_perawat1= mysqli_query($host,"SELECT nama FROM nira WHERE blokir ='N' ORDER BY nama ASC ");
                                    while($data_satu= mysqli_fetch_array($sql_perawat1)){
                                    ?>
                                    <option value="<?= $data_satu['nama']?>">
                                    <?php
                                    }
                                    ?>
                                </datalist>
                                <h4 class="text-success mt-2">Kandidat Calon Kedua</h4>
                                <label for="exampleDataList" class="form-label">Pilih nama perawat dibawah ini Skor 30</label>
                                <input type="hidden" value="30" name="nilai2">
                                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Cari perawat..." name="perawat2" required>
                                <datalist>
                                    <?php
                                    $sql_perawat2= mysqli_query($host,"SELECT nama FROM nira WHERE blokir ='N' ORDER BY nama ASC");
                                    while($data_dua= mysqli_fetch_array($sql_perawat2)){
                                    ?>
                                    <option value="<?= $data_dua['nama']?>">
                                    <?php
                                    }
                                    ?>
                                </datalist>
                                <h4 class="text-warning mt-2">Kandidat Calon Ketiga</h4>
                                <label for="exampleDataList" class="form-label">Pilih nama perawat dibawah ini Skor 10</label>
                                <input type="hidden" value="10" name="nilai3">
                                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Cari perawat..." name="perawat3" required>
                                <datalist>
                                    <?php
                                    $sql_perawat3= mysqli_query($host,"SELECT nama FROM nira WHERE blokir ='N' ORDER BY nama ASC");
                                    while($data_tiga= mysqli_fetch_array($sql_perawat3)){
                                    ?>
                                    <option value="<?= $data_tiga['nama']?>">
                                    <?php
                                    }
                                    ?>
                                </datalist>
                                <h6 class="text-success mt-2">Harapan saudara kepada pengurus DPK</h6>
                                <input type="text" class="form-control" name="harapan">
                            </div>

                            <div class="card-footer text-right">
                                <?php
                                    $batas      = "2021-12-31";
                                    $hari_ini   = date('Y-m-d');
                                    if($batas > $hari_ini){
                                ?>  
                                <button class="btn btn-primary text-right" type="submit">Save</button>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="col-md-6 mt-3 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-white">Hasil Perolehan Suara</h4>
                        </div>
                        <div class="card-body">
                            <h4 id="demo" class="text-center text-danger"></h4>
                            <script src="../assets/js/waktu_survey.js"></script>
                            <p>10 Besar Hasil Survey</p>
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIRA</th>
                                    <th>Nilai</th>
                                </tr>
                                <?php
                                $no=1;
                                $sql_hasil      = mysqli_query($host,"SELECT * FROM muskom_calon WHERE sesi='1' ORDER BY nilai DESC LIMIT 10");
                                while($data_survey= mysqli_fetch_array($sql_hasil)){
                                ?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $data_survey['nama']?></td>
                                    <td><?= $data_survey['nira']?></td>
                                    <td class="text-end"><?= $data_survey['nilai']?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                
                            </table>
                            <a href="hasil-survey.php" class="btn btn-success btn-sm">More</a>
                        </div>
                        <div class="card-footer">
                            
                            <?php
                                if(isset($error)){
                                    $pesan= $error;
                                    echo "<h6 class='text-danger'>Pilihannpu tidak ditereima karena : $pesan; </h6>";
                                   
                                }
                                if(isset($_POST['perawat1'])){
                                    echo "<h6>Pilihan Saudara adalah :</h6>";
                                    $calon1     = $_POST['perawat1'];
                                    $calon2     = $_POST['perawat2'];
                                    $calon3     = $_POST['perawat3'];
                                    echo $calon_pertama."<br>";
                                    echo $calon_kedua."<br>";
                                    echo $calon_ketiga."<br>";
                                    
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>