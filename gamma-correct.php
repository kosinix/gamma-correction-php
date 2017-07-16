<?php
$filename = 'gamma-1.0-or-2.2.png';

// Init original and new images in "true" color
$src = imagecreatefrompng($filename);
$width = imagesx($src);
$height = imagesy($src);

$dest_width = $width * 0.5;
$dest_height = $height * 0.5;
$dest = imagecreatetruecolor($dest_width, $dest_height);

// $rgb = imagecolorat($src, 141, 140);
// $r = ($rgb >> 16) & 0xFF;
// $g = ($rgb >> 8) & 0xFF;
// $b = $rgb & 0xFF;
// echo $r, $g, $b;

// Correct gamma of original from 2.2 to 1.0
imagegammacorrect($src, 2.2, 1.0);
// PHP uses the ff formula: https://github.com/php/php-src/blob/master/ext/gd/gd.c
// gamma = input / output;
// (int) ((pow((red   / 255.0), gamma) * 255) + .5)

// $rgb = imagecolorat($src, 141, 140);
// $r = ($rgb >> 16) & 0xFF;
// $g = ($rgb >> 8) & 0xFF;
// $b = $rgb & 0xFF;
// echo $r, $g, $b;

// Resample using nearest neighbor
imagecopyresampled($dest, $src, 0, 0, 0, 0, $dest_width, $dest_height, $width, $height);
// Correct gamma of new from 1.0 to 2.2
imagegammacorrect($dest, 1.0, 2.2);

// Output
header('Content-Type: image/png');
imagepng($dest);
imagepng($dest, 'gamma-correct.png');

