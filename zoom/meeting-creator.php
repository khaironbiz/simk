<?php
if(isset($_POST['topik'])){
	include('config.php');
	include('api.php');

    //post
    $durasi_jam     = $_POST['durasi_jam']*60*60;
    $durasi_menit   = $_POST['durasi_menit']*60;
    $durasi         = $durasi_jam+$durasi_menit;
    $start          = strtotime($_POST['date_meeting']." ".$_POST['waktu_awal']);
    $finish         = $start+$durasi;
    $topik          = $_POST['topik'];
    $passcode       = $_POST['passcode'];





	$key_meeting 	= uniqid();
	//setup meeting 
	$arr['topic']		= $topik;
	$arr['start_date']	= date("Y-m-dTH:i:sz", $start);
	$arr['duration']	= ($durasi/60);
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