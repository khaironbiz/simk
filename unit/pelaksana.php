<?php
include("../auth/session.php");
$key        = $_GET['id'];
$sql_rs     = mysqli_query($host, "SELECT * FROM rs_sub_bidang
                            JOIN rs_bidang on rs_bidang.id_rs_bidang=rs_sub_bidang.id_bidang
                            JOIN rs_direktorat on rs_direktorat.id_rs_direktorat=rs_bidang.id_direktorat
                            JOIN rs on rs.id_rs=rs_bidang.id_rs
                            WHERE rs_sub_bidang.has_rs_sub_bidang='$key'");
$count_rs   = mysqli_num_rows($sql_rs);
$data_rs    = mysqli_fetch_array($sql_rs);
$judul      = $data_rs['nama_sub_bidang'];
$template   = "../theme/table-simple.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/unit/pelaksana.php";
include($template);

?>