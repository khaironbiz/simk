<?php

function nama_shift($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM shift_perawat WHERE kode = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['nama_shift'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function masuk_shift($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM shift_perawat WHERE kode = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['jam_mulai'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function keluar_shift($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM shift_perawat WHERE kode = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['jam_selesai'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function count_shift($shift){
    include('../auth/koneksi.php');
    $sql    = mysqli_query($host,"SELECT * FROM laporan_shift_perawat WHERE shift = '$shift'");
    $count  = mysqli_num_rows($sql);    
    return $count;
}
?>