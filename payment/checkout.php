<?php
include('../auth/session.php');
$sql        = mysqli_query($host,"SELECT * FROM invoice_detail WHERE id_customer ='$user_check' and id_invoice =''");
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
        <title>Checkout</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1>Checkout</h1>
                    <form action ="create-va.php" method="POST">
                    <?php
                        if($count_trx>0){
                    ?>
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Detail</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Jumlah</th>
                            </tr>
                            <?php
                                $no =1;
                                while($data = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $data['nama_barang']?></td>
                                <td><?= number_format($data['h_satuan'])?></td>
                                <td><?= $data['qty']?></td>
                                <td><?= number_format($data['total'])?></td>
                                
                            </tr>
                            <?php
                                }
                                $sql_total  = mysqli_query($host,"SELECT sum(total) as total FROM invoice_detail WHERE id_customer='$user_check' and id_invoice =''");
                                $total      = mysqli_fetch_array($sql_total);
                            ?>
                            <tr>
                                <td colspan="2" class="text-center"><b>Sub Total</b></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <b><?= number_format($total['total'])?></b>
                                    
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center"><b>Metode Pembayaran<br></td><td></td>
                            </tr>
                            <tr>
                                
                                <td colspan="5">
                                    <?php
                                        include('payment-method.php');
                                        foreach($bayar as $b){                                            
                                        ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="id_channel" value="<?=  $b['paymentMethod']?>">
                                            <img src="<?=  $b['paymentImage']?>">
                                        </div>
                                        
                                    <?php
                                        }
                                    ?>
                                    
                                </td>
                                <td><input type="hidden" name="total" value="<?= $total['total']?>"></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>
                                    <button class="btn btn-sm btn-danger" type="submit">Checkout</button>
                                </td>
                            </tr>

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