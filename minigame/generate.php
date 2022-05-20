<?php
define('FRAME', ['WIDTH' => 700, 'HEIGHT' => 700]);

// Coordinates: Top-left, Top-right, bottom-right, bottom-left
$coordinates = [
    array(['x' => 93, 'y' => 169], ['x' =>  426, 'y' => 131], ['x' => 451, 'y' => 337], ['x' => 116, 'y' => 375]),
    array(['x' => 369, 'y' => 389], ['x' =>  629, 'y' => 420], ['x' => 610, 'y' => 581], ['x' => 349, 'y' => 549])
];
$attrs  = json_decode($_POST['attrs']);
$files = $_FILES['file'];
foreach ($files['name'] as $i => $name) {
    if (0 < $files['error'][$i]) {
        echo 'Error: ' . $files['error'][$i] . '<br>';
    } else {
        move_uploaded_file($files['tmp_name'][$i], 'uploads/' . $files['name'][$i]);
        $attrs[$i]->src =  'uploads/' . $files['name'][$i];
    }
}

$frameSize = constant('FRAME');
$frame = imagecreatefrompng('images/frame.png');
$result = imagecreatetruecolor($frameSize['WIDTH'], $frameSize['HEIGHT']);

// DEFINE MAGENTA AS THE TRANSPARENCY COLOR AND FILL THE IMAGE FIRST
$transparentColor = imagecolorallocatealpha($result, 0, 0, 0, 127);
imagecolortransparent($result, $transparentColor);
imagefill($result, 0, 0, $transparentColor);

imagesavealpha($result, true);

foreach ($attrs as $i => $attr) {
    $imageSize = getimagesize($attr->src);
    $w = $attr->width * $attr->s;
    $h = $w * $imageSize[1] / $imageSize[0];
    $image = imagecreatefrompng($attr->src);
    $image = imagescale($image, $w);
    $image = imagerotate($image, $attr->angle, $transparentColor);

    $delX = abs($h * sin(deg2rad($attr->angle)));
    $delY = abs($w * sin(deg2rad($attr->angle)));

    $srcX = $coordinates[$i][0]['x'] + $attr->x - ($attr->angle > 0 ? 0 : $delX);
    $srcY = $coordinates[$i][0]['y'] + $attr->y - ($attr->angle > 0 ? $delY : 0);

    $srcW = $delX + $w * cos(deg2rad($attr->angle));
    $srcH = $delY + $h * cos(deg2rad($attr->angle));

    imagealphablending($image, true);
    imagecopy($result, $image, $srcX, $srcY, 0, 0, $srcW, $srcH);
    imagealphablending($image, true);
    imagedestroy($image); // FREE UP SOME MEMORY
}


imagealphablending($frame, false);
imagecopyresampled($result, $frame, 0, 0, 0, 0, 700, 700, 700, 700);
imagealphablending($frame, true);
imagedestroy($frame); // FREE UP SOME MEMORY

imagealphablending($result, false);
imagesavealpha($result, true);

header('Content-Type: ' . image_type_to_mime_type(IMAGETYPE_PNG));
imagepng($result);