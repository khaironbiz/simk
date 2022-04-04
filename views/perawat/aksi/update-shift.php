<?php
if(isset($_POST['batal_realisasi'])){
    $has_laporan_shift_perawat = $_POST['batal_realisasi'];
    $delete     = mysqli_query("DELETE laporan_shift_perawat WHERE has_laporan_shift_perawat = '$has_laporan_shift_perawat'");
    if($input_data){
        $_SESSION['status']="Data berhasil dihapus";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/perawat/penjadwalan.php\"</script>";
    }else{
        $_SESSION['status']="Data gagal dihapus";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/perawat/penjadwalan.php\"</script>";
    }
    
}
?>
