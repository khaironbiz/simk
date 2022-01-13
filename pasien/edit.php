<?php
include("../auth/session.php");
include("../function/function.php");
$key        = $_GET['key'];
$sql_pasien = mysqli_query($host,"SELECT * FROM pasien_db WHERE has_pasien_db='$key'");
$data_pasien= mysqli_fetch_array($sql_pasien);
$judul      = $data_pasien['nama_pasien'];
$template   = "../theme/table.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/pasien/edit.php";
include($template);



?>