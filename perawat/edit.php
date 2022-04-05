<?php
include("../auth/session.php");
include("../function/function.php");
$kode           = $_GET['key'];
$sql_anggota    = mysqli_query($host, "SELECT * FROM nira WHERE kode='$kode'");
$data_anggota   = mysqli_fetch_array($sql_anggota);
$judul          = "Data Base Pasien";
$template       = "../theme/table.php";
$wrapp          = "../core/wrapp.php";
$content        = "../views/perawat/edit.php";
include($template);

?>