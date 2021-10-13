<?php
include("../auth/session.php");
$key        = $_GET['id'];
$sql_key    = mysqli_query($host,"SELECT * FROM form WHERE has_form='$key'");
$data       = mysqli_fetch_array($sql_key);
$judul      = $data['nama_form'];
$template   = "../theme/table.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/form/detail.php";
include($template);



?>