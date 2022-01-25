<?php
include("../auth/session.php");
include("../function/function.php");
$key            = $_GET['key'];
$key_trx_ruangan= key_trx_ruangan($key);
$has_px_daftar  = has_px_daftar($key_trx_ruangan);
$nrm            = pasien_daftar_has($has_px_daftar);
$sql_pasien     = mysqli_query($host,"SELECT * FROM pasien_db WHERE nrm='$nrm'");
$count_pasien   = mysqli_num_rows($sql_pasien);
$data_pasien    = mysqli_fetch_array($sql_pasien);
//data pasien_ruangan
$cari_pasien_ruangan    = mysqli_query($host,"SELECT * FROM pasien_daftar_ruangan WHERE has_pasien_daftar_ruangan = '$key'");
$data_pasien_ruangan    = mysqli_fetch_array($cari_pasien_ruangan);
if($count_pasien < 1){
    $judul      = "Page Not Found";
    $template   = "../theme/table.php";
    $wrapp      = "../core/wrapp.php";
    $content    = "../views/page/not-found.php";
}else{
    $judul      = $data_pasien['nama_pasien'];
    $template   = "../theme/table.php";
    $wrapp      = "../core/wrapp.php";
    $content    = "../views/pasien/keperawatan.php";
}

include($template);



?>