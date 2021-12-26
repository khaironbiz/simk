<?php
include('auth/koneksi.php');
//$id         = $_GET['id'];
if(isset($_GET['has'])){
	$has        = $_GET['has'];
	//ambil POST dan sesuaikan dengan database
	$ambildb    = mysqli_query($host, "SELECT nama FROM pelatihan_absen WHERE has='$has'");
	$count_has	= mysqli_num_rows($ambildb);
	if($count_has >0){
		$row        = mysqli_fetch_array($ambildb);
		$hasil      = $row['nama'];
		$nama       = $hasil ;
		$gambar 	= "gambar/123.jpeg";
		$nomor  	= "123/PP.HIPENI/K/S/2020";
		$image  	= imagecreatefromjpeg($gambar);
		$white  	= imageColorAllocate($image, 255, 255, 255);
		$black  	= imageColorAllocate($image, 255, 127, 0);
		$font   	= "./QuinchoScript_PersonalUse.ttf";
		$size   	= 60;
		$size2  	= 20;
		//definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
		$image_width = imagesx($image);  
		//membuat textbox agar text centered
		$text_box       = imagettfbbox($size,0,$font,$nama);
		$text_width     = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
		$text_height    = $text_box[3]-$text_box[1];
		$x              = ($image_width/2) - ($text_width/2);
		
		//text kedua
		$image_width = imagesx($image);  
		//membuat textbox agar text centered
		$text_box2      = imagettfbbox($size,0,$font,$nomor);
		$text_width2    = $text_box2[2]-$text_box2[0]; // lower right corner - lower left corner
		$text_height2   = $text_box2[3]-$text_box2[1];
		$x2             = ($image_width/2) - ($text_width2/2);
		//generate sertifikat beserta namanya
		//imagettftext($image, $size2, 0, $x2, 550, $black, $font, $nomor);
		imagettftext($image, $size, 0, $x, 690, $black, $font, $nama);
		//tampilkan di browser
		header("Content-type:  image/jpeg");
		imagejpeg($image);
		imagedestroy($image);
	}else{
		echo "Data Tidak Valid";
	}
	
}else{
	echo "Halaman Tidak Ditemukan";
}

?>
