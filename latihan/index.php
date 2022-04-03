<?php

$dest   = imagecreatefrompng('../assets/img/sertifikat/1.png');
$src    = imagecreatefrompng('../assets/img/qr/001.png');

imagealphablending($dest, false);
imagesavealpha($dest, true);

imagecopymerge($dest, $src, 530, 1000, 0, 0, 111, 111, 100); //have to play with these numbers for it to work for you, etc.

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
// $sertifikat = "../assets/img/sertifikat/1.png";
// echo round(microtime(true)).'.png'.microtime(true).md5(microtime(true)) ;

?>
<!-- <img src="<?= $sertifikat?>"> -->