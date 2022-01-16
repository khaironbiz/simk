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
function has_ruangan($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE id = '$id'");
    $data     = mysqli_fetch_array($sql);
    $master   = $data['has_ruangan'];
    return $master;
}
function id_ruangan($ruangan){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE ruangan = '$ruangan'");
    $data     = mysqli_fetch_array($sql);
    $master   = $data['id'];
    return $master;
}

?>