<?php
include('../auth/session.php');
if(isset($_POST['total'])){
    $id_invoice     = uniqid();
    $total          = $_POST['total'];
    $id_channel     = $_POST['id_channel'];
    $cari_channel   = mysqli_query($host,"SELECT * FROM channel_dana WHERE id='$id_channel'");
    $data_cahnnel   = mysqli_fetch_array($cari_channel);
    $payment        = $data_cahnnel['kode'];
    // echo $total. "<br>";
    // echo $id_channel;
    $create_invoice = mysqli_query($host,"INSERT INTO invoice SET 
                        id_invoice  = '$id_invoice',
                        id_customer = '$user_check',
                        biaya_real  = '$total',
                        id_bank     = '$id_channel'");
    if($create_invoice){
        $update_invoice_detail = mysqli_query($host,"UPDATE invoice_detail SET
                        id_invoice  = '$id_invoice' WHERE 
                        id_customer = '$user_check' AND 
                        id_invoice  = ''");
    }
    //cari pengguna
    $email_pengguna     = $data_pengguna['email'];
    $hp_pengguna        = $data_pengguna['hp'];
    $nama_pengguna      = $data_pengguna['nama'];
    //setup duitku
    $id_akun            = "1597055345";
    $cari_akun          = mysqli_query($host,"SELECT * FROM akun_duitku WHERE has='$id_akun'");
    $data_akun          = mysqli_fetch_array($cari_akun);
    $key_akun           = $data_akun['api'];
    $merchant_code      = $data_akun['merchant_code'];

    //
    $merchantCode       = $merchant_code; // dari dashboard duitku
    $merchantKey        = $key_akun; // dari dashboard duitku
    $paymentAmount      = $total;
    $paymentMethod      = $payment; // VC = Credit Card
    $merchantOrderId    = $id_invoice; // dari merchant, unik
    $productDetails     = 'Tes pembayaran menggunakan Duitku';
    $email              = $email_pengguna; // email pelanggan anda
    $phoneNumber        = $hp_pengguna ; // nomor telepon pelanggan anda (opsional)
    $additionalParam    = ''; // opsional
    $merchantUserInfo   = ''; // opsional
    $customerVaName     = $nama_pengguna; // tampilan nama pada tampilan konfirmasi bank
    $callbackUrl        = 'https://ppni.rspon.net/simk/payment/callback.php'; // url untuk callback
    $returnUrl          = 'https://ppni.rspon.net/simk/dashboard/'; // url untuk redirect
    $expiryPeriod       = 10; // atur waktu kadaluarsa dalam hitungan menit
    $signature          = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);
    // Customer Detail
    $firstName = $nama_pengguna;
    $lastName = "DPK PPNI RSPON";
    // Address
    $alamat = "Jl. Kembangan Raya";
    $city = "Jakarta";
    $postalCode = "11530";
    $countryCode = "ID";
    $address = array(
        'firstName'     => $firstName,
        'lastName'      => $lastName,
        'address'       => $alamat,
        'city'          => $city,
        'postalCode'    => $postalCode,
        'phone'         => $phoneNumber,
        'countryCode'   => $countryCode
    );
    $customerDetail = array(
        'firstName'         => $firstName,
        'lastName'          => $lastName,
        'email'             => $email,
        'phoneNumber'       => $phoneNumber,
        'billingAddress'    => $address,
        'shippingAddress'   => $address
    );
    // $item1 = array(
    //     'name' => 'Test Item 1',
    //     'price' => 10000,
    //     'quantity' => 1);
    // $item2 = array(
    //     'name' => 'Test Item 2',
    //     'price' => 30000,
    //     'quantity' => 3);
    // $itemDetails = array(
    //     $item1, $item2
    // );
    $params = array(
        'merchantCode' => $merchantCode,
        'paymentAmount' => $paymentAmount,
        'paymentMethod' => $paymentMethod,
        'merchantOrderId' => $merchantOrderId,
        'productDetails' => $productDetails,
        'additionalParam' => $additionalParam,
        'merchantUserInfo' => $merchantUserInfo,
        'customerVaName' => $customerVaName,
        'email' => $email,
        'phoneNumber' => $phoneNumber,
        // 'itemDetails' => $itemDetails,
        'customerDetail' => $customerDetail,
        'callbackUrl' => $callbackUrl,
        'returnUrl' => $returnUrl,
        'signature' => $signature,
        'expiryPeriod' => $expiryPeriod
    );

    $params_string = json_encode($params);
    //echo $params_string;
    //$url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
    $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
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
    $request = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpCode == 200)
    {
        $result         = json_decode($request, true);
        $biaya_total    = $result['amount'];
        $account        = $result['vaNumber'];
        $status_code    = $result['statusCode'];
        $keterangan     = $result['statusMessage'];
        $id_external    = $result['reference'];
        $input_va       = mysqli_query($host,"UPDATE invoice SET 
                    account         = '$account',
                    biaya_total     = '$biaya_total',
                    id_external     = '$id_external',
                    status          = '$status_code',
                    keterangan      = '$keterangan' WHERE 
                    id_invoice      = '$id_invoice'");
        header('location: '. $result['paymentUrl']);
        echo "paymentUrl :". $result['paymentUrl'] . "<br />";
        echo "merchantCode :". $result['merchantCode'] . "<br />";
        echo "reference :". $result['reference'] . "<br />";
        echo "vaNumber :". $result['vaNumber'] . "<br />";
        echo "amount :". $result['amount'] . "<br />";
        echo "statusCode :". $result['statusCode'] . "<br />";
        echo "statusMessage :". $result['statusMessage'] . "<br />";
    }
    else
    {
        echo $httpCode;
    }
}
?>