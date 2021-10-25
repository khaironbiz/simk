<?php
include("../auth/session.php");
$key        = $_GET['id'];
$sql_rs     = mysqli_query($host, "SELECT * FROM rs_bidang
                            JOIN rs_direktorat on rs_direktorat.id_rs_direktorat=rs_bidang.id_direktorat
                            JOIN rs on rs.id_rs=rs_bidang.id_rs
                            WHERE rs_bidang.has_rs_bidang='$key'");
$count_rs   = mysqli_num_rows($sql_rs);
$data_rs    = mysqli_fetch_array($sql_rs);
$judul      = $data_rs['nama_bidang'];
$template   = "../theme/table-simple.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/unit/sub-sub-detail.php";
include($template);

?>