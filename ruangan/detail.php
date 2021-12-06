<?php
include("../auth/session.php");
$key            = $_GET['key'];
$sql_ruangan    = mysqli_query($host,"SELECT * FROM ruangan WHERE has_ruangan ='$key'");     
$ruangan        = mysqli_fetch_array($sql_ruangan);                
$judul          = $ruangan['ruangan'];
$template       = "../theme/table-simple.php";
$wrapp          = "../core/wrapp.php";
$content        = "../views/ruangan/detail.php";
include($template);



?>