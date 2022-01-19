<?php
include('../auth/session.php');
    $cek_invoice        = $_GET['key'];
    $merchantCode       = 'D2881'; // from duitku
    $merchantKey        = 'e09dd1d01a70d0f4d6953c711d4fa776'; // from duitku
    $merchantOrderId    = $cek_invoice; // from merchant, unique
    $signature          = md5($merchantCode . $merchantOrderId . $merchantKey);
    $params = array(
        'merchantCode'      => $merchantCode,
        'merchantOrderId'   => $merchantOrderId,
        'signature'         => $signature
    );

    $params_string = json_encode($params);
    //$url = 'https://sandbox.duitku.com/webapi/api/merchant/transactionStatus';
    $url    = 'https://passport.duitku.com/webapi/api/merchant/transactionStatus';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($params_string))                                                                       
    );   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    //execute post
    $request    = curl_exec($ch);
    $httpCode   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpCode == 200)
    {
        $result = json_decode($request, true);
        $merchantOrderId    = $result['merchantOrderId'];
        $reference          = $result['reference'];
        $amount             = $result['amount'];
        $statusCode         = $result['statusCode'];
        $statusMessage      = $result['statusMessage'];
        $update_callback    = mysqli_query($host,"UPDATE invoice SET 
                                    callback    = '$statusCode',
                                    pesan       = '$statusMessage'  WHERE id_invoice='$merchantOrderId'");
        
    }else{
        echo $httpCode;
    }
        
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Status Transaksi</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5">
                        <div class="card-header">
                            <b>Status Transaksi</b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Nomor Invoice</label>
                                <div class="col-sm-8"><?= $merchantOrderId?></div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Reference</label>
                                <div class="col-sm-8"><?= $reference?></div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Jumlah</label>
                                <div class="col-sm-8"><?= $amount?> </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8"><?= $statusCode?></div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-sm-8"><?= $statusMessage?></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="transaksi.php" class="btn btn-sm btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>