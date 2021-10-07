
<!doctype html>
<html lang="en">

<head>
	<title>SignIn</title>
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
						ACARA KESEHATAN <br>
						RESET PASSWORD
					</span>
				</div>
				<form class="login100-form validate-form" action="../auth/reset-account.php" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="username" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-30">
						
                        <div>
							<a href="<?= $site_url ?>" class="txt1">
								Login
							</a>
						</div>
                        <div>
							<a href="<?= $site_url ?>/registrasi" class="txt1">
								Registrasi
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
					    
						<button class="login100-form-btn">
							Reset Account
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

</body>
</html>