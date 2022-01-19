<?php

     // Set your merchant code (Note: Server key for sandbox and production mode are different)
    $merchantCode = "D2881"; 
    // Set your merchant key (Note: Server key for sandbox and production mode are different)
    $merchantKey = "e09dd1d01a70d0f4d6953c711d4fa776";

    $datetime = date('Y-m-d H:i:s');  
    $paymentAmount = 100000;
    $signature = hash('sha256',$merchantCode . $paymentAmount . $datetime . $merchantKey);

    $itemsParam = array(
        'merchantcode' => $merchantCode,
        'amount' => $paymentAmount,
        'datetime' => $datetime,
        'signature' => $signature
    );

    class emp{}

    $params = array_merge((array)$itemsParam);

    $params_string = json_encode($params);

    //$url = 'https://sandbox.duitku.com/webapi/api/merchant/paymentmethod/getpaymentmethod'; 
    $url    = 'https://passport.duitku.com/webapi/api/merchant/paymentmethod/getpaymentmethod';
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
            $request ;
            $result = json_decode($request, true);
            $bayar  = $result['paymentFee'];
            
            
            //echo $result['responseCode'];
            
    }
    else{
            $response = new emp();
            $response->statusMessage = "Server Error . $httpCode ";
            $response->error = $httpCode;
            die(json_encode($response)); 

    }

?>
