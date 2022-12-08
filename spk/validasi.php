<?php
include("../auth/session.php");
$has_spk    = $_GET['key'];
$sql_spk    = mysqli_query($host,"SELECT * FROM spk_perawat 
                            JOIN nira on nira.nira=spk_perawat.id_perawat 
                            JOIN db_sub_master on db_sub_master.id=spk_perawat.level_pk 
                            WHERE spk_perawat.has='$has_spk'");
$spk_detail = mysqli_fetch_array($sql_spk);

$judul      = "Validasi SPK ".$spk_detail['nira'];
$template   = "../theme/table.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/spk/validasi.php";
include("../views/spk/aksi/validasi-spk.php");
include($template);



?>