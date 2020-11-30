<?php
function my_merge_image($first_img_path, $second_img_path){
    $width = 800;
    $height = 600;

    header("Content-Type: image/png");
    $sprite = imagecreatetruecolor($width, $height);

    $image_a = imagecreatefrompng($first_img_path);
    imagecopyresampled($sprite, $image_a, 0, 0, 0, 0, 500, 206, 600, 500);

    $image_b = imagecreatefrompng($second_img_path);
    imagecopyresampled($sprite, $image_b, 408, 0, 0, 0, 500, 206, 600, 500);

    // OTHERS IMAGES
    // $image_c = imagecreatefrompng($);
    // imagecopyresampled($sprite, $image_c, 0, 200, 0, 0, 500, 206, 600, 500);

    // $image_d = imagecreatefrompng($);
    // imagecopyresampled($sprite, $image_d, 408, 200, 0, 0, 500, 206, 600, 500);

    imagepng($sprite, "merge.png");
    imagepng($sprite);

}
my_merge_image("a.png", "b.png");
?>
