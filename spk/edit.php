<?php
include("../auth/session.php");
$has_spk    = $_GET['key'];
$sql_spk    = mysqli_query($host,"SELECT nira.nira, nira.nama, nira.spk_pk,  spk_perawat.* FROM spk_perawat 
                            JOIN nira on nira.nira=spk_perawat.id_perawat 
                            
                            WHERE spk_perawat.has='$has_spk'");
$spk_detail = mysqli_fetch_array($sql_spk);

$judul      = "Edit SPK ".$spk_detail['nira'];
$template   = "../theme/table.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/spk/edit.php";
include("../views/spk/aksi/edit-spk.php");
include($template);



?>