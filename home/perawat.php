<?php
include("../auth/site.php");
include("../auth/koneksi.php");
$judul      = "Tabel Anggota PPNI";
$template   = "../theme/table.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/anggota/perawat.php";
include($template);



?>