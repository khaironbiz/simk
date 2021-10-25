<?php
include("../auth/session.php");

$no             = 1;
$sql_perawat    = mysqli_query($host, "SELECT * FROM regulasi_jenis ORDER BY jenis_regulasi");
while($row  = mysqli_fetch_assoc($sql_perawat)){
    $data[]=$row;
    $json_data  = json_encode($data);
    echo $json_data;

}

?>