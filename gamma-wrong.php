<?php

$filename = 'gamma-1.0-or-2.2.png';

// Init original and new images in "true" color
$src = imagecreatefrompng($filename);
$width = imagesx($src);
$height = imagesy($src);

$dest_width = $width * 0.5;
$dest_height = $height * 0.5;
$dest = imagecreatetruecolor($dest_width, $dest_height);

// Resample using nearest neighbor
imagecopyresampled($dest, $src, 0, 0, 0, 0, $dest_width, $dest_height, $width, $height);

// Output
header('Content-Type: image/png');
imagepng($dest);
imagepng($dest, 'gamma-wrong.png');
