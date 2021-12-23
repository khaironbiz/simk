<?php
include('../auth/koneksi.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
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
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="text-white">Calon Ketua DPK PPNI RSPON</h3>
                        </div>
                        <div class="card-body">
                            <p align="justify">Kepada yth Sejawat Perawat dilingkungan RS Pusat Otak Nasional, dalam rangka mensukseskan musyawarah komisariat PPNI RSPON bersama ini kami mohon memberikan pendapat siapakah perawat yang paling cocok untuk memimpin DPK Komisariat untuk periode 2022 sd 2027. dalam survey ini kami buat 3 pilihan calon.</p>
                            <h4 class="text-primary">Kandidat Calon pertama</h4>
                            <label for="exampleDataList" class="form-label">Pilih nama perawat dibawah ini Skor 50</label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Cari perawat..." name="perawat1">
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
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Cari perawat..." name="perawat2">
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
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Cari perawat..." name="perawat3">
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
                            
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary text-right" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 mb-3">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-white">Hasil Perolehan Suara</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" width="400" height="400"></canvas>
                            
                            <script>
                            const ctx = document.getElementById('myChart').getContext('2d');
                            const myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                        label: '# of Votes',
                                        data: [12, 19, 3, 5, 2, 3],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                            </script>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>