<?php

// Downloads source image, saves it.
$s_image_file = file_get_contents('https://i.pinimg.com/474x/83/21/cd/8321cd078732b3d4a5951917692eec67--ladybird-ladybird-lady-bugs.jpg');
$s_original_img_path = 'Resource'.DIRECTORY_SEPARATOR.'original_image.jpg';
file_put_contents($s_original_img_path, $s_image_file);

$a_original_img_info = getimagesize($s_original_img_path);
$x_image_original = imagecreatefromjpeg($s_original_img_path);
// Crops original image.
$x_image_crop = imagecrop($x_image_original, [
    'x' => 0,
    'y' => 0,
    'width' => $a_original_img_info[0]/2,
    'height' => $a_original_img_info[1]
]);
// Flips cropped image.
imageflip($x_image_crop,IMG_FLIP_HORIZONTAL);
// Copies cropped and flipped image to original image.
imagecopy($x_image_original, $x_image_crop, $a_original_img_info[0]/2, 0, 0, 0,
    $a_original_img_info[0]/2, $a_original_img_info[1]);

// Saves new image, displays result.
if(imagepng($x_image_original, 'new_image.png'))
    echo 'New image created.';
else
    echo 'Error! New image did not create.';