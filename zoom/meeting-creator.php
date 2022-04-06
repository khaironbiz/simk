<?php
if(isset($_POST['create_meeting'])){
	include('config.php');
	include('api.php');
	$date_meeting 	= $_POST['date_meeting'];
	$waktu_awal 	= $_POST['waktu_awal'];
	$start_date 	= $date_meeting." ".$waktu_awal;
	$durasi 		= $_POST['durasi'];
	$topik 			= $_POST['topik'];
	$passcode 		= $_POST['pascode'];
	$key_meeting 	= uniqid();
	//setup meeting 
	$arr['topic']		= $topik;
	$arr['start_date']	= $date_meeting;
	$arr['duration']	= $durasi;
	$arr['password']	= $passcode;
	$arr['type']		= '2';
	$result=createMeeting($arr);
	if(isset($result->id)){
		echo "Join URL: <a href='".$result->join_url."'>".$result->join_url."</a><br/>";
		echo "Password: ".$result->password."<br/>";
		echo "Start Time: ".$result->start_time."<br/>";
		echo "Duration: ".$result->duration."<br/>";
	}else{
		echo '<pre>';
		print_r($result);
	}
}

?>