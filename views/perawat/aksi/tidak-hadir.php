<?php
if(isset($_POST['tidak-hadir'])){
    $id_ruangan = $_POST['id_ruangan'];
    $ruangan    = ruangan($id_ruangan);
    $y          = $_POST['y'];
    $m          = $_POST['m'];
    $d          = $_POST['d'];
    $tgl        = $_POST['y']."-".$_POST['m']."-".$_POST['d'];
    $shift      = $_POST['shift'];
    $nira       = $_POST['nira'];
    $N          = count($nira);
    for($i=0; $i < $N; $i++){
    $time[$i]   = date('Y-m-d H:i:s');
    $has[$i]    = md5(uniqid());
    $coba[$i]   = "INSERT INTO laporan_shift_perawat SET 
                        id_ruangan  = '$id_ruangan',
                        ruangan     = '$ruangan',
                        id_perawat  = '$nira[$i]',
                        tgl         = '$tgl',
                        tahun       = '$y',
                        bulan       = '$m',
                        tanggal     = '$d',
                        hadir       = 'N',
                        shift       = '$shift',
                        created_at  = '$time[$i]',
                        created_by  = '$user_check',
                        has_laporan_shift_perawat = '$has[$i]'
                        ";
    $input_data     = mysqli_query($host,$coba[$i]);
    if($input_data){
        $_SESSION['status']="Data berhasil disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/perawat/penjadwalan.php\"</script>";
    }else{
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/perawat/penjadwalan.php\"</script>";
    }
    }
}
?>
