<?php
include("../auth/session.php");
include("../function/function.php");
$key            = $_GET['key'];
$nrm            = pasien_daftar_has($key);
$sql_pasien     = mysqli_query($host,"SELECT * FROM pasien_db WHERE nrm='$nrm'");
$count_pasien   = mysqli_num_rows($sql_pasien);
$data_pasien    = mysqli_fetch_array($sql_pasien);
//data pendaftaran
$key_trx        = key_trx($key);
$cari_pendaftaran= mysqli_query($host,"SELECT * FROM pasien_daftar WHERE key_trx='$key_trx'");
$pasien_daftar  = mysqli_fetch_array($cari_pendaftaran);

if($count_pasien < 1){
    $judul      = "Page Not Found";
    $template   = "../theme/table.php";
    $wrapp      = "../core/wrapp.php";
    $content    = "../views/page/not-found.php";
}else{
    $judul      = $data_pasien['nama_pasien'];
    $template   = "../theme/table.php";
    $wrapp      = "../core/wrapp.php";
    $content    = "../views/pasien/klinis.php";
}

include($template);



?>