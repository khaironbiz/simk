<?php
include("../auth/session.php");
$key            = $_GET['key'];
$sql_ruangan    = mysqli_query($host,"SELECT * FROM ruangan_kamar 
                    JOIN ruangan on ruangan.id= ruangan_kamar.id_ruangan 
                    JOIN db_sub_master on db_sub_master.id=ruangan_kamar.id_kelas_perawatan
                    WHERE ruangan_kamar.has_ruangan_kamar ='$key'");     
$ruangan        = mysqli_fetch_array($sql_ruangan);                
$judul          = $ruangan['no_kamar'];
$template       = "../theme/table-simple.php";
$wrapp          = "../core/wrapp.php";
$content        = "../views/ruangan/edit-kamar.php";
include($template);



?>