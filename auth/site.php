<?php
//konfigurasi server
if(isset($_SERVER['HTTPS'])){
$https          = $_SERVER['HTTPS'];
}else{
    $https      = FALSE;
}

$url_1          = "http://localhost/simk";
$url_2          = "https://ppni.rspon.net/simk";
$url_3          = "http://ppni.rspon.net/simk";
$server_host = $_SERVER['SERVER_NAME'];
if($server_host == "localhost"){
    $site_url   = $url_1;
}elseif($https=="on"){
$site_url   = $url_2;
}else{
    $site_url   = $url_3;
}


$nama_web           = "DPK PPNI RSPON";
$nama_perusahaan    = "DPK PPNI RSPON";
$alamat_perusahaan  = "Jl. MT Haryono Kavling 11 Cawang, Jakarta Timur, DKI Jakarta 13630";
$deskripsi_web      = "Sistem Informasi Manajemen Anggota";
$version_web        = "2.0.0";
?>
<script>
    var base_url = <?= $site_url ?>;
</script>
