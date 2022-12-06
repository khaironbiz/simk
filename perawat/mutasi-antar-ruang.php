<?php

include("../auth/session.php");
include("../function/function.php");

$judul          = "Mutasi Perawat Antar Ruang";
$has_penempatan = $_GET['key'];
$sql_penempatan = mysqli_query($host, "SELECT * FROM penempatan_tanggal WHERE has = '$has_penempatan'");
$data_pemempatan= mysqli_fetch_array($sql_penempatan);
$template       = "../theme/table-simple.php";
$wrapp          = "../core/wrapp.php";
$content        = "../views/perawat/mutasi-antar-ruang.php";

include($template);

?>