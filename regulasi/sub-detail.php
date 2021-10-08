<?php
include("../auth/site.php");
include("../auth/koneksi.php");
$key        = $_GET['id'];
$sql_key    = mysqli_query($host,"SELECT * FROM regulasi WHERE has_regulasi='$key'");
$data       = mysqli_fetch_array($sql_key);
$judul      = $data['nama_regulasi'];
$template   = "../theme/table.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/regulasi/sub-detail.php";
include($template);



?>