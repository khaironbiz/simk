<?php
if(isset($_POST['mutasi_antar_ruang'])){
    $has_penempatan = $_POST['mutasi_antar_ruang'];
    $id_penempatan  = $_POST['id_penempatan'];
    $id_perawat     = $_POST['id_perawat'];
    $ruangan_asal   = $_POST['ruangan_asal'];
    $ruangan_baru   = $_POST['ruangan_baru'];
    $nomor_surat    = $_POST['nomor_surat'];
    $has_baru       = md5(uniqid());
    $sql            = mysqli_query($host,"SELECT * FROM penempatan_detail WHERE id_penempatan='$id_penempatan' AND id_perawat='$id_perawat'");
    $count          = mysqli_num_rows($sql);
    $time           = time();
    if($count <1 ){
        $input_data = mysqli_query($host, "INSERT INTO penempatan_detail SET
                              id_penempatan     = '$id_penempatan',
                              nomor_surat       = '$nomor_surat',
                              id_perawat        = '$id_perawat',
                              ruangan_asal      = '$ruangan_asal',
                              ruangan_baru      = '$ruangan_baru',
                              created_at        = '$time',
                              has               = '$has_baru'");
        $update_nira = mysqli_query($host,"UPDATE nira SET id_ruangan='$ruangan_baru' WHERE nira='$id_perawat'");
        if($input_data){
            // memanggil library php qrcode
            include "../../assets/phpqrcode/qrlib.php";
            // nama folder tempat penyimpanan file qrcode
            $penyimpanan = "../../assets/temp/mutasi/";
            // membuat folder dengan nama "temp"
            if (!file_exists($penyimpanan))
                mkdir($penyimpanan);
            // isi qrcode yang ingin dibuat. akan muncul saat di scan
            $isi = "https://rspon.net/surat/mutasi-perawat.php?key=".$has_baru;
            // perintah untuk membuat qrcode dan menyimpannya dalam folder temp
            $create_qr = QRcode::png($isi, $penyimpanan . $has_baru.".png");
            if($create_qr){

            }else{
                $_SESSION['status']="Gagal membuat QR";
                $_SESSION['status_info']="danger";
                echo "<script>document.location=\"$site_url/perawat/mutasi-antar-ruang.php?key=$has_penempatan\"</script>";
            }
            $_SESSION['status']="Data berhasil disimpan";
            $_SESSION['status_info']="success";
            echo "<script>document.location=\"$site_url/perawat/mutasi-antar-ruang.php?key=$has_penempatan\"</script>";
        }else{
            $_SESSION['status']="Data gagal disimpan";
            $_SESSION['status_info']="danger";
            echo "<script>document.location=\"$site_url/perawat/mutasi-antar-ruang.php?key=$has_penempatan\"</script>";
        }
    }else{
        $_SESSION['status']="Tidak Boleh Input Double";
        $_SESSION['status_info']="danger";
        echo "<script>document.location=\"$site_url/perawat/mutasi-antar-ruang.php?key=$has_penempatan\"</script>";
    }
}
?>