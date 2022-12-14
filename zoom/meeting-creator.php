<?php
include('../auth/koneksi.php');
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





	$key_meeting 	    = uniqid();
	//setup meeting 
	$arr['topic']		= $topik;
	$arr['start_date']	= date("Y-m-d H:i:s", $start);
	$arr['duration']	= ($durasi/60);
	$arr['password']	= $passcode;
	$arr['type']		= '2';
	$result=createMeeting($arr);
	if(isset($result->id)){
        $id             = $result->id;
        $host_id        = $result->host_id;
        $host_email     = $result->host_email;
        $meeting_topic  = $result->topic;
        $meeting_type   = $result->type;
        $meeting_status = $result->status;
        $start_time     = strtotime($result->start_time);
        $end_time       = $start_time+($result->duration*60);
        $timezone       = $result->timezone;
        $start_url      = $result->start_url;
        $join_url       = $result->join_url;
        $password       = $result->password;


        $time           = time();
        $create_meeting = mysqli_query($host, "INSERT INTO zoom_meeting SET
                                    id              = '$id',
                                    host_id         = '$host_id',
                                    host_email      = '$host_email',
                                    meeting_topic   = '$meeting_topic',
                                    meeting_type    = '$meeting_type',
                                    meeting_status  = '$meeting_status',
                                    start_time      = '$start',
                                    end_time        = '$finish',
                                    timezone        = '$timezone',
                                    start_url       = '$start_url',
                                    join_url        = '$join_url',
                                    created_at      = '$time',
                                    created_by      = '',
                                    password        = '$password',
                                    has             = '$key_meeting'");
        if($create_meeting){
            header("location: $join_url"); // Mengarahkan url meeting
        }else{
            echo "Gagal Simpan";
        }

//		echo "Join URL: <a href='".$result->join_url."'>".$result->join_url."</a><br/>";
//        echo "Password: ".$result->password."<br/>";
//		echo "Password: ".$result->password."<br/>";
//		echo "Start Time: ".$result->start_time."<br/>";
//		echo "Duration: ".$result->duration."<br/>";
//        var_dump($result);
	}else{
		echo '<pre>';
		print_r($result);
	}
}

?>