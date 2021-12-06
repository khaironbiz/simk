<?php
include("../auth/session.php");
$sql_ruangan    = mysqli_query($host,"SELECT * FROM ruangan WHERE pelayanan ='Y' ORDER BY id_instalasi ASC, id ASC");
$judul          = "Bed Manajemen";
$template       = "../theme/table-simple.php";
$wrapp          = "../core/wrapp.php";
$content        = "../views/pasien/pasien-ruangan.php";
include($template);



?>