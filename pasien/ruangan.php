<?php
include("../auth/session.php");
//include("../function/function.php");
include("../function/diagnosa.php");
include("../function/master.php");
include("../function/newss.php");
include("../function/pasien.php");
include("../function/perawat.php");
include("../function/ruangan.php");
include("../function/shift.php");
include("../function/usia.php");
include("../function/wilayah.php");
$judul          = "Pasien Dirawat";
$template       = "../theme/table-simple.php";
$wrapp          = "../core/wrapp.php";
$content        = "../views/pasien/pasien-ruangan.php";
include($template);



?>