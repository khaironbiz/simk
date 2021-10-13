<?php
include("../auth/session.php");
include("../core/security/admin-akses.php");
if($count_admin < 1){
echo "<script>document.location=\"$site_url/auth/logout.php\"</script>";
}
$judul      = "Administrator Data";
$template   = "../theme/table.php";
$wrapp      = "../core/wrapp.php";
$content    = "../views/admin-data/index.php";
include($template);


?>