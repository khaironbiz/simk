<?php
include('../auth/session.php');
//setup duitku
    $id_akun            = "1597055345";
    $cari_akun          = mysqli_query($host,"SELECT * FROM akun_duitku WHERE has='$id_akun'");
    $data_akun          = mysqli_fetch_array($cari_akun);
    $key_akun           = $data_akun['api'];
    $merchant_code      = $data_akun['merchant_code'];

$apiKey = $key_akun; // Your api key
$merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null; 
$amount = isset($_POST['amount']) ? $_POST['amount'] : null; 
$merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null; 
$productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : null; 
$additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null; 
$paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null; 
$resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : null; 
$merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null; 
$reference = isset($_POST['reference']) ? $_POST['reference'] : null; 
$signature = isset($_POST['signature']) ? $_POST['signature'] : null; 

if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature))
{
    $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
    $calcSignature = md5($params);

    if($signature == $calcSignature)
    {
        //Your code here
        $update_invoice = mysqli_query($host,"UPDATE invoice SET 
                            status      = '$resultCode' WHERE 
                            id_invoice  = '$merchantOrderId'");
        echo "SUCCESS"; // Please response with success
    }
    else
    {
        throw new Exception('Bad Signature');
    }
}
else
{
    throw new Exception('Bad Parameter');
}
?>
