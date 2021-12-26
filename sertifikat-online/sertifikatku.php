<?php
$dest   = imagecreatefrompng('gambar/123.png');
$src    = imagecreatefrompng('gambar/qr.png');

imagealphablending($dest, true);
imagesavealpha($dest, true);

imagecopymerge($dest, $src, 350, 1090, 0, 0, 150, 150, 100); //have to play with these numbers for it to work for you, etc.

header('Content-Type: image/png');
imagepng($dest);


imagedestroy($dest);
imagedestroy($src);
?>