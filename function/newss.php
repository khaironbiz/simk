<?php
function newss_nafas($nafas){
        if($nafas <30){
            $master     = 2;
        }if($nafas <21){
            $master     = 1;
        }if($nafas <18){
            $master     = 0;
        }if($nafas < 9){
            $master     = 1;
        }if($nafas < 8){
            $master     = 2;
        }if($nafas > 29){
            $master     = 3;
        }
    return $master;
}
function newss_nadi($nadi){
        if($nadi <130){
            $master     = 2;
        }if($nadi <111){
            $master     = 1;
        }if($nadi <101){
            $master     = 0;
        }if($nadi < 51){
            $master     = 1;
        }if($nadi < 40){
            $master     = 2;
        }
        if($nadi >= 130){
            $master     = 3;
        }
    return $master;
}
function newss_suhu($suhu){
        if($suhu <=38.55){
            $master     = 1;
        }if($suhu <37.6){
            $master     = 0;
        }if($suhu <36.05){
            $master     = 1;
        }if($suhu < 35.05){
            $master     = 2;
        }if($suhu > 38.55){
            $master     = 2;
        }
    return $master;
}
function newss_sistolik($sistolik){
        if($sistolik <=220){
            $master     = 2;
        }if($sistolik <200){
            $master     = 1;
        }if($sistolik <160){
            $master     = 0;
        }if($sistolik < 101){
            $master     = 1;
        }if($sistolik < 81){
            $master     = 2;
        }if($sistolik < 71){
            $master     = 3;
        }
        if($sistolik > 220){
            $master     = 3;
        }
    return $master;
}
function newss($newss_score){
        if($newss_score <6){
            $master     = "orange";
        }if($newss_score < 4){
            $master     = "yellow";
        }if($newss_score < 2){
            $master     = "success";
        }if($newss_score > 6){
            $master     = "danger";
        }
    return $master;
}
?>
