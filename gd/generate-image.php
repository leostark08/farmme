<?php

// size of main frame
define('FRAME_SIZE', ['width' => 700, 'height' => 700]);

// Coordinates: Top-left, Top-right, bottom-right, bottom-left
define('FRAME_IMAGE_1_COORDINATES', array(['x' => 93, 'y' => 169], ['x' =>  426, 'y' => 131], ['x' => 451, 'y' => 337], ['x' => 116, 'y' => 375]));
define('FRAME_IMAGE_2_COORDINATES', array(['x' => 369, 'y' => 389], ['x' =>  629, 'y' => 420], ['x' => 610, 'y' => 581], ['x' => 349, 'y' => 549]));

$frame1coors = constant('FRAME_IMAGE_1_COORDINATES');
$frame2coors = constant('FRAME_IMAGE_2_COORDINATES');

$frameImg1 = calcFromCoordinates($frame1coors[0], $frame1coors[1], $frame1coors[2], $frame1coors[3]);
$frameImg2 = calcFromCoordinates($frame2coors[0], $frame2coors[1], $frame2coors[2], $frame2coors[3]);
$images = [
    array_merge(['url' => $_POST['imageUrl1']], array_merge(imageAttributes($_POST['image1']), $frameImg1)),
    array_merge(['url' => $_POST['imageUrl2']], array_merge(imageAttributes($_POST['image2']), $frameImg2)),
];


// main frame
$framePath = 'images/frame.png';
$frame = imageCreateFromPng($framePath);
imageAlphaBlending($frame, true);
imageSaveAlpha($frame, true);
$frameSize = constant('FRAME_SIZE');


$pointRotation0 = pointRotation($frame1coors[0]['x'], $frame1coors[0]['y'], $images[0]['rotate']);
$images[0]['firstPixelX'] = $pointRotation0['x'] + $frameSize['width'] * tan(deg2rad($images[0]['rotate']));
$images[0]['firstPixelY'] = $pointRotation0['y'];

$pointRotation1 = pointRotation($frame2coors[0]['x'], $frame2coors[0]['y'], $images[1]['rotate']);
$images[1]['firstPixelX'] = $pointRotation1['x'];
$images[1]['firstPixelY'] = $pointRotation1['y'] - $frameSize['width'] * tan(deg2rad($images[1]['rotate']));

foreach ($images as $index => $image) {

    $path = $image['url'];
    $img = imageCreateFromPng($path);
    imageAlphaBlending($img, true);
    imageSaveAlpha($img, true);

    $imageScale = imagescale($img, $image['width'] * $image['scale'], $image['height'] * $image['scale']);
    $frame = imagerotate($frame, -$image['rotate'], 0);

    imagecopymerge($frame, $imageScale, $image['firstPixelX'], $image['firstPixelY'], -$image['translateX'], -$image['translateY'], $image["width"], $image["height"], 100);

    $frame = imagerotate($frame, $image['rotate'], 0);
    $frame = imagecropauto($frame, IMG_CROP_BLACK);
}

/* Output image to browser */
header("Content-type: image/png");
imagePng($frame);

imagedestroy($frame);


function calcFromCoordinates($tl, $tr, $br, $bl)
{
    $image = array();
    // center pixel coordinates
    $image['centerX'] = ($br['x'] - $tl['x']) / 2 + $tl['x'];
    $image['centerY'] = ($br['y'] - $tl['y']) / 2 + $tl['y'];

    // image size
    $image['width'] = sqrt(pow($tr['x'] - $tl['x'], 2) + pow($tl['y'] - $tr['y'], 2));
    $image['height'] = sqrt(pow($bl['y'] - $tl['y'], 2) + pow($bl['x'] - $tl['x'], 2));

    // image rotate
    $image['rotate'] = atan(($tl['y'] - $tr['y']) / $image['width']) * (180 / pi());

    return $image;
}

function pointRotation($x, $y, $angle)
{
    return ['x' => $x * cos(deg2rad($angle)) - $y * sin(deg2rad($angle)), 'y' => $x * sin(deg2rad($angle)) + $y * cos(deg2rad($angle))];
}

function imageAttributes($string)
{
    $els = explode(',', $string);
    return [
        'translateX' => $els[0],
        'translateY' => $els[1],
        'scale' => $els[2]
    ];
}