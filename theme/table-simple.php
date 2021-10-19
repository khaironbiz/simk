
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul; ?></title>
  <link rel="icon" href="https://ppni.or.id/simk/image/LOGO-PPNI.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $site_url;?>/assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $site_url;?>/assets/AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

<?php
include($wrapp);

?>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $site_url;?>/assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $site_url;?>/assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>
