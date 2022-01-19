<?php
include('../auth/session.php');
$sql        = mysqli_query($host,"SELECT * FROM invoice WHERE id_invoice !='' ORDER BY id DESC LIMIT 20");
$count_trx  = mysqli_num_rows($sql);
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Transaksi</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1>Transaksi</h1>
                    
                    <?php
                        if($count_trx>0){
                            
                    ?>
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Customer</th>
                                <th>Metode Bayar</th>
                                <th>Account</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                                $no =1;
                                while($data = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $data['id_invoice']?></td>
                                <td><?= $data_pengguna['nama']?></td>
                                <td><?= $data['account']?></td>
                                <td><?= $data['time']?></td>
                                <td><?= number_format($data['biaya_real'])?></td>
                                <th><?= $data['pesan']?></th>
                                <th><a href="cek-status.php?key=<?= $data['id_invoice'];?>" class="btn btn-sm btn-success">Update Status</a></th>
                                
                            </tr>
                            <?php
                                }
                                
                            ?>
                            
                        </table>
                    <?php
                        }else{
                            echo "<h1>Tidak Ada Transaksi</h1>";
                        }
                    ?>
                    </form>
                </div>
            </div>
        </div>
        
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>