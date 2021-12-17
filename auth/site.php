<?php
//site local atau hosting
$server_host = $_SERVER['SERVER_NAME'];
if($server_host == "localhost"){
    $server=1;
}else{
$server=2;
}
if($server==1){
$site_url           = "http://localhost/simk";
}elseif($server==2){
    $site_url           = "https://ppni.rspon.net/simk";
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
