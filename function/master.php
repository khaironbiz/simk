<?php
function master($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM db_master WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['nama_master'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function sub_master($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
    $data     = mysqli_fetch_array($sql);
    $master   = $data['nama_submaster'];
    }else{
        $master = "NULL";
    }
    return $master;
}
?>
