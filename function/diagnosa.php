<?php
function dx_medis($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM dx_medis WHERE id = '$id'");
    $data     = mysqli_fetch_array($sql);
    $master   = $data['dx_medis'];
    return $master;
}
?>