<?php
require_once ('../auth/session.php');

$sql = mysqli_query($host, "SELECT * FROM nira ORDER BY nama ASC");


$response = array();

while($x = mysqli_fetch_array($sql)){
    $h['id']            = $x["id"];
    $h['nama']          = $x["nama"];
    $h['nira']          = $x["nira"];
    $h['email']         = $x["email"];
    $h['phone']         = $x["hp"];
    $h['pendidikan']    = $x["pendidikan"];
    $h['universitas']   = $x["universitas"];
    $h['th_lulus']      = $x["th_lulus"];
    $h['str']           = $x["str"];
    $h['str_ahir']      = $x["str_ahir"];
    $h['pk']            = $x["spk_pk"];
    $h['no_spk']        = $x["no_skk"];
    $h['exp_spk']       = $x["exp_skk"];


    array_push($response, $h);
}
echo

$json_data      = json_encode($response);;
$create_json    = file_put_contents('myfile.json', $json_data);
if($create_json){
    echo "sukses buat json";
}



//var_dump($data);