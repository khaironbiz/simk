<?php
include('../auth/session.php');
$tahun_ini  = date('Y');
$awal_tahun = $tahun_ini."-01-01 00:00:00";
$time_tahun = strtotime($awal_tahun);
$time_validasi  = time();
$time_lapor = $data_pengguna['time_validasi'];

if(isset($_SESSION['login_user'])){
    if(isset($_POST['ktp'])){
        $ktp            = $_POST['ktp'];
        $npwp           = $_POST['npwp'];
        $no_ruangan     = $_POST['ruangan'];
        $sql_room       = mysqli_query($host,"SELECT * FROM ruangan WHERE no='$no_ruangan'");
        $room           = mysqli_fetch_array($sql_room);
        $nama_ruangan   = $room['ruangan'];
        $id_ruangan     = $room['id'];
        
        
        $update_nira    = mysqli_query($host,"UPDATE nira SET 
                            ktp             = '$ktp',
                            npwp            = '$npwp',
                            ruangan         = '$nama_ruangan',
                            id_ruangan      = '$id_ruangan',
                            time_validasi   = '$time_validasi'
                            WHERE nira      = '$user_check'");
        if($update_nira){
            header("location: $site_url/user");
        }
    }else{
        if($time_lapor > $time_tahun){
            header("location: $site_url/user");
        }else{
            echo "Harus lapor";
        }
        
    }

}else{
header("location: $site_url");

}
?>
<!doctype html>
<html lang="en">
<head>
	<title>Validasi Data</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="icon" href="image/LOGO-PPNI-TER-HAKI.png">
    <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="https://ppni.or.id/admin/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/vendor/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/vendor/select2/select2.min.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/css/util.css">
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/css/main.css">
    <!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(https://ppni.or.id/admin/login1/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						DPK PPNI RSPON
					</span>
				</div>
				<form class="login100-form validate-form" action="" method="POST">
					<div class="wrap-input100 validate-input m-b-2" data-validate="Username is required">
						<span class="label-input100">No KTP</span>
						<input class="input100" type="text" name="ktp" placeholder="Nomor KTP" value="<?= $data_pengguna['ktp']?>">
					</div>
					<div class="wrap-input100 validate-input m-b-2" data-validate = "Password is required">
						<span class="label-input100">NPWP</span>
						<input class="input100" type="text" name="npwp" placeholder="Enter password" value="<?= $data_pengguna['npwp']?>">
						
					</div>
                    <div class="wrap-input100 validate-input m-b-21" data-validate = "Password is required">
						<span class="label-input100">Ruangan</span>
						<select class="input100 mt-3" name="ruangan">
                            <?php
                            $sql_ruangan = mysqli_query($host,"SELECT * FROM ruangan ORDER BY ruangan");
                            while($data_ruangan = mysqli_fetch_array($sql_ruangan)){
                            ?>
                            <option value="<?= $data_ruangan['no']?>"
                            <?php
                            if($data_pengguna['id_ruangan'] === $data_ruangan['id']){
                                echo "selected";
                            }

                            ?>
                            
                            
                            ><?= $data_ruangan['ruangan']?></option>
                            <?php
                            }
                            ?>
                        </select>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Validasi
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="https://ppni.or.id/admin/login1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="https://ppni.or.id/admin/login1/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="https://ppni.or.id/admin/login1/vendor/bootstrap/js/popper.js"></script>
	<script src="https://ppni.or.id/admin/login1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="https://ppni.or.id/admin/login1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="https://ppni.or.id/admin/login1/vendor/daterangepicker/moment.min.js"></script>
	<script src="https://ppni.or.id/admin/login1/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="https://ppni.or.id/admin/login1/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="https://ppni.or.id/admin/login1/js/main.js"></script>

</body>
</html>