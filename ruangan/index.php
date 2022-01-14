<?php
include("../auth/session.php");
$key        = $_GET['key'];
$sql        = mysqli_query($host,"SELECT * FROM db_sub_master WHERE has='$key'");
$count      = mysqli_num_rows($sql);
$data_master= mysqli_fetch_array($sql);
if($count >0){
    $judul      = "Data Base Ruangan";
    $template   = "../theme/table-simple.php";
    $wrapp      = "../core/wrapp.php";
    $content    = "../views/ruangan/index.php";
    }else{
        $judul      = "Page Not Found";
        $template   = "../theme/table-simple.php";
        $wrapp      = "../core/wrapp.php";
        $content    = "../views/page/not-found.php";
    }


    include($template);

?>