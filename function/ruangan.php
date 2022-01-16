<?php

function ruangan($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['ruangan'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function kamar($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['ruangan'];
    }else{
        $master = "NULL";
    }
    
    return $master;
}
function has_ruangan($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['has_ruangan'];
    }else{
        $master = "NULL";
    }
    
    return $master;
}
function id_ruangan($ruangan){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE ruangan = '$ruangan'");
    if(mysqli_num_rows($sql) >0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['id'];
    }else{
        $master = "NULL";
    }
    
    
    return $master;
}

?>