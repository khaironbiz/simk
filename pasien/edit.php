<?php
include("../auth/session.php");
include("../function/function.php");
$key            = $_GET['key'];
$key_trx_ruangan= key_trx_ruangan($key);
$has_px_daftar  = has_px_daftar($key_trx_ruangan);
$nrm            = pasien_daftar_has($has_px_daftar);

$sql_pasien = mysqli_query($host,"SELECT * FROM pasien_db WHERE nrm='$nrm'");
$count_pasien=mysqli_num_rows($sql_pasien);
$data_pasien= mysqli_fetch_array($sql_pasien);
if($count_pasien <1){
    $judul      = "Page Not Found";
    $template   = "../theme/table.php";
    $wrapp      = "../core/wrapp.php";
    $content    = "../views/page/not-found.php";
}else{
    $judul      = $data_pasien['nama_pasien'];
    $template   = "../theme/table.php";
    $wrapp      = "../core/wrapp.php";
    $content    = "../views/pasien/edit.php";
}
include($template);
?>