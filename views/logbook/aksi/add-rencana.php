<?php
if(isset($_POST['add_perencanaan'])){
    $tahun          = date('Y');
    $id_jabfung     = $_POST['id_jabfung'];
    $N              = count($id_jabfung);
    for($i=0; $i < $N; $i++){
        $sql_jabfung_input  = mysqli_query($host, "SELECT *FROM jabfung_ak where id='$id_jabfung[$i]'");
        $id_jab[$i]         = mysqli_fetch_array($sql_jabfung_input);
        $ak_ini[$i]         = $id_jab[$i]['ak'];
        $level_ini[$i]      = $id_jab[$i]['jabatan'];
        $id_a[$i]           = $id_jab[$i]['id_a'];
        $id_b[$i]           = $id_jab[$i]['id_b'];
        $id_c[$i]           = $id_jab[$i]['id_c'];
        $id_d[$i]           = $id_jab[$i]['id_d'];
        $has[$i]            = md5(uniqid());
        $time[$i]           = date('Y-m-d H:i:s');
        $coba[$i]           = mysqli_query($host,"INSERT INTO jabfung_rencana SET 
                        id_th               = '$tahun',
                        id_perawat          = '$user_check',
                        level               = '$level_ini[$i]',
                        id_jabfung          = '$id_jabfung[$i]',
                        kredit              = '$ak_ini[$i]',
                        id_a                = '$id_a[$i]',
                        id_b                = '$id_b[$i]',
                        id_c                = '$id_c[$i]',
                        id_d                = '$id_d[$i]',
                        created_at          = '$time[$i]',
                        has_jabfung_rencana = '$has[$i]'");
        $cek            = mysqli_query($host, $coba[$i]);
    }
    if($cek){
        $_SESSION['status']="Data sukses disimpan";
        $_SESSION['status_info']="success";
        echo "<script>document.location=\"$site_url/logbook/\"</script>";
    }else{
        $_SESSION['status']="Data gagal disimpan";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/logbook/\"</script>";
    }
}
    

?>