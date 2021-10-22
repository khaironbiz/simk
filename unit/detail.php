<?php
include("../auth/session.php");
$key        = $_GET['id'];
$sql_rs     = mysqli_query($host, "SELECT * FROM rs WHERE has_rs='$key'");
$count_rs   = mysqli_num_rows($sql_rs);
$data_rs    = mysqli_fetch_array($sql_rs);
$judul      = $data_rs['nama_rs'];
$template   = "../theme/table-simple.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/unit/detail.php";
include($template);

?>