<?php
if(isset($_POST['edit_shift'])){
    $id_shift       = $_POST['edit_shift'];
    $nama_shift     = $_POST['nama_shift'];
    $kode           = $_POST['kode'];
    $jam_mulai      = $_POST['jam_mulai'];
    $jam_selesai    = $_POST['jam_selesai'];
    $has_shift      = md5(uniqid());
    $sql_shift      = mysqli_query($host,"SELECT * FROM shift_perawat WHERE id='$id_shift'");
    $count_shift    = mysqli_num_rows($sql_shift);
    if($count_shift >0){
        $update_shift   = mysqli_query($host,"UPDATE shift_perawat SET 
                            nama_shift      = '$nama_shift',
                            kode            = '$kode',
                            jam_mulai       = '$jam_mulai',
                            jam_selesai     = '$jam_selesai',
                            has_shift       = '$has_shift' WHERE 
                            id              = '$id_shift'");
        if($update_shift){
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/shift/master.php\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/shift/master.php\"</script>";
        }
    }else{
        $_SESSION['status']="Data gagal disimpan, id tidak ditemukan";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/shift/master.php\"</script>";
    }
}

?>