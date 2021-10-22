<?php
include("../auth/session.php");
$key        = $_GET['id'];
$sql_rs     = mysqli_query($host, "SELECT * FROM rs_direktorat 
                            JOIN rs on rs.id_rs=rs_direktorat.id_rs
                            WHERE rs_direktorat.has_rs_direktorat='$key'");
$count_rs   = mysqli_num_rows($sql_rs);
$data_rs    = mysqli_fetch_array($sql_rs);
$judul      = $data_rs['nama_direktorat'];
$template   = "../theme/table-simple.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/unit/sub-detail.php";
include($template);

?>