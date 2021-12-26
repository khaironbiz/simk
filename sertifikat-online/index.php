<?php
include('auth/koneksi.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Certificate Online</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="col-md-12 ">
			<div class="panel panel-primary">
	  			<div class="panel-heading"><h4>The Role of Stroke Nurse in Optimizing Stroke Care</h4></div>
	 				<div class="panel-body">
						<div class="konten">
						    <div class="table-responsive">
							<form action="index.php" method="post">
								<strong>Masukkan Email</strong><br>
								<input type="text" class="form-control" name="id" placeholder="Email" ></input>
								<input type="submit" class="btn btn-primary" value="Check" name="certificate"></input><br><br><br>
							</form>
							<table class="table table-striped">
								<tr>
									<td>Email</td>
									<td>Nama</td>
									<td>Masuk</td>
									<td>Keluar</td>
									<td>Sertifikat</td>
									<td>Hadir</td>
									<td>Edit Nama</td>
								</tr>	
								<?php
									
								if(isset($_POST["id"])){
									$getid 		= $_POST["id"];
									$webinar    = "Webinar 1";
									//ambil POST dan sesuaikan dengan database
									$ambildb 	= mysqli_query($host,"SELECT * FROM pelatihan_absen 
													WHERE nama_webinar='$webinar' and email ='$getid'");
									while ($row = mysqli_fetch_array($ambildb)){
											$hasil 			= $row['nama'];
											$email  		= $row['email'];
											$id_ini 		= $row['id'];
											$count_hasil    = mysqli_num_rows($ambildb);
											$sql_ini		= mysqli_query($host, "SELECT sum(hadir) as hadir FROM pelatihan_absen 
																WHERE email ='$email'");
											$hadir  		= mysqli_fetch_array($sql_ini);
									?>
									<tr>
										<td><?= $row['email'];?></td>
										<td><?=  $row['nama'];?></td>
										<td><?=  $row['time_joint'];?></td>
										<td><?=  $row['time_leave'];?></td>
										<td>
											<?php if($row['status'] !=''){ ?><a href="certificate.php?has=<?=  $row['has'];?>">Print</a><?php }?>
										</td>
										<td>
											<?php if($row['status'] !=''){echo $row['hadir'];}?>
										</td>
										<td>
											<?php 
											if($row['status'] !=''){ 
											?>
											<a href="nama-edit.php?key=<?=  $row['has'];?>">Edit Nama</a>
											<?php 
											}
											?>
										</td>
									</tr>
								<?php
									}
								}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
