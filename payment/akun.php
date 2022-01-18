<?php
include('../auth/session.php');
//setup duitku
    $id_akun            = "1597055345";
    $cari_akun          = mysqli_query($host,"SELECT * FROM akun_duitku WHERE has='$id_akun'");
    $data_akun          = mysqli_fetch_array($cari_akun);
    $key_akun           = $data_akun['api'];
    $merchant_code      = $data_akun['merchant_code'];
echo $merchant_code."<br>";
echo $key_akun ."<br>";
    ?>