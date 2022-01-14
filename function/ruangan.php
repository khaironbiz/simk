<?php

function ruangan($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE id = '$id'");
    $data     = mysqli_fetch_array($sql);
    $master   = $data['ruangan'];
    return $master;
}
function kamar($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE id = '$id'");
    $data     = mysqli_fetch_array($sql);
    $master   = $data['ruangan'];
    return $master;
}

?>