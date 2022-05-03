<?php
// main frame
$framePath = 'images/frame.png';
$frame = imageCreateFromPng($framePath);
imageAlphaBlending($frame, true);
imageSaveAlpha($frame, true);

// image 1
$img1Path = 'images/category1.png';
$img1 = imageCreateFromPng($img1Path);
imageAlphaBlending($img1, true);
imageSaveAlpha($img1, true);
$frameImg1 = ['width' => 348, 'height' => 217, 'x' => 271, 'y' => 255, 'rotate' => 6.6];
$scale = imagescale($img1, $frameImg1['width'] * 2, $frameImg1['height'] * 2);
$rotate = imagerotate($frame, -$frameImg1['rotate'], 0);


$frameImg1['firstPixel-x'] = $frameImg1['x'] - $frameImg1['width'] / 2 + 40;
$frameImg1['firstPixel-y'] = $frameImg1['y'] - $frameImg1['height'] / 2 + 25;

imagecopymerge($rotate, $scale, $frameImg1['firstPixel-x'], $frameImg1['firstPixel-y'], 0, 0, $frameImg1["width"], $frameImg1["height"], 100);

$rotate = imagerotate($rotate, $frameImg1['rotate'], 0);
/* Output image to browser */
header("Content-type: image/png");
imagePng($rotate);

imagedestroy($frame);
imagedestroy($img1);