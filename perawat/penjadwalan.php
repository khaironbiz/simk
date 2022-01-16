<?php
include("../auth/session.php");
include("../function/function.php");

$judul      = "Perawat ". $data_pengguna['ruangan'];
$template   = "../theme/table-simple.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/perawat/penjadwalan.php";
include($template);



?>