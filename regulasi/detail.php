<?php
include("../auth/session.php");
$key        = $_GET['id'];
$sql_key    = mysqli_query($host,"SELECT * FROM regulasi_jenis WHERE has_regulasi_jenis='$key'");
$data       = mysqli_fetch_array($sql_key);
$judul      = $data['jenis_regulasi'];
$template   = "../theme/table.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/regulasi/detail.php";
include($template);



?>