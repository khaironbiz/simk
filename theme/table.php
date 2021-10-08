<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $site_url;?>/assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
<!-- DataTables  & Plugins -->
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= $site_url;?>/assets/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $site_url;?>/assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $site_url;?>/assets/AdminLTE/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"]
      //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
