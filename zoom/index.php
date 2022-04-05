<?php
include('config.php');
include('api.php');
$now = strtotime('2022-04-06 07:15:00');
$arr['topic']='BNLS RSPON';
$arr['start_date']=date('2022-04-06 07:15:00');
$arr['duration']=120;
$arr['password']='hipeni';
$arr['type']='2';
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
?>