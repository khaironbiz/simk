<?php
include("../auth/session.php");
include("../function/function.php");

if(isset($_GET['nira'])){
    $get_nira   = $_GET['nira'];
    $nira       = mysqli_fetch_array(mysqli_query($host, "SELECT * FROM nira WHERE nira = '$get_nira'"));
    if(isset($_POST['update_ruangan'])){
        $nira_post          = $_POST['nira'];
        $id_ruangan_post    = $_POST['ruangan'];
        $ruangan_post       = mysqli_fetch_array(mysqli_query($host, "SELECT * FROM ruangan WHERE id = '$id_ruangan_post'"));
        $nama_ruangan_post  = $ruangan_post['ruangan'];
        $id_pk_post         = $_POST['level_pk'];
        $level_pk_post      = mysqli_fetch_array(mysqli_query($host, "SELECT * FROM db_sub_master WHERE id = '$id_pk_post'"));
        $nama_level_pk_post = $level_pk_post['nama_submaster'];
//        var_dump($level_pk_post);
       $update_nira = mysqli_query($host, "UPDATE nira SET 
                id_ruangan      = '$id_ruangan_post', 
                ruangan         = '$nama_ruangan_post',
                id_pk           = '$id_pk_post',
                pk              = '$nama_level_pk_post' WHERE nira = '$nira_post' ");
    }

}else{

}
$ruangan    = mysqli_query($host, "SELECT * FROM ruangan ORDER BY id ASC ");
$level_pk   = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='14' ORDER BY id ASC ");
$judul      = "Penempatan Perawat";
$template   = "../theme/table-simple.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/perawat/ruangan.php";
include($template);

?>