<?php
$url    = "http://localhost/simk/muskom/calon-ketua-dpk.php";
$page   = $url;//$_SERVER['PHP_SELF'];
$sec    = "10";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php
        echo "Watch the page reload itself in 10 second!";
    ?>
    </body>
</html>