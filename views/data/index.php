<?php
$no             = 1;
$sql_perawat    = mysqli_query($host, "SELECT * FROM regulasi_jenis ORDER BY jenis_regulasi");
$data[]         = jeson_encode(mysqli_fetch_array($sql_perawat));
echo $data;

?>