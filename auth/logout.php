<html>
<head>
<title>PPNI-RSPON</title>
<meta http-equiv="Page-Enter" content="blendTrans(Duration=1.0)">
<link rel=stylesheet type="text/css" href="style.css"></head><body background="background1.jpg">
<?php
include('site.php');
echo (' <script> alert("Sampai Jumpa Lagi"); document.location = "index.php"; </script>');
session_start();
session_destroy();

header("location: $site_url"); // Mengarahkan ke halaman profil

?>
</body>
</html>