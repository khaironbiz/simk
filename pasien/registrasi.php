<?php
include("../auth/session.php");
$has_lay    = $_GET['admisi'];
$sql_lay    = mysqli_query($host,"SELECT * FROM db_sub_master WHERE has='$has_lay'");
$data_lay   = mysqli_fetch_array($sql_lay);
$key        = $_GET['key'];
$sql_pasien = mysqli_query($host,"SELECT * FROM pasien_db WHERE has_pasien_db='$key'");
$data_pasien= mysqli_fetch_array($sql_pasien);
$judul      = "Pendaftaran Pelayanan";
$template   = "../theme/table-simple.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/pasien/registrasi.php";
include($template);



?>