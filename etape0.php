<?php
//etape 0 et 1
function my_merge_image($first, $second, $filename){

  list($img1_width, $img1_height) = getimagesize($first);
  list($img2_width, $img2_height) = getimagesize($second);


  $source1 = imagecreatefrompng($first);
  $source2 = imagecreatefrompng($second);

  $new_width = $img1_width > $img2_width ? $img1_width : $img2_width;
  $new_height = $img1_height + $img2_height;
  $new = imagecreatetruecolor($new_width, $new_height);

  imagealphablending($new, false);
  imagesavealpha($new, true);

  imagecopy($new, $source1, 0, 0, 0, 0, $img1_width, $img1_height);
  imagecopy($new, $source2, 0, $img1_height, 0, 0, $img2_width, $img2_height);
  imagepng($new, "$filename");

  $fp = fopen("style.css", 'w');
  fwrite($fp, ".my_sprite {
    background-image: url(".$filename.");
    background-repeat: no-repeat;
    display: block;
    background-color:pink;
  }\n");

  fwrite($fp, "#img1 {
    width: ".$img1_width."px;
    height: ".$img1_height."px;
    background-position: 0px 0px;
  }\n");

  fwrite($fp, "#img2 {
    width: ".$img2_width."px;
    height: ".$img2_height."px;
    background-position: 0px -".$img1_height."px;
  }");
  fclose($fp);
}
//etape2
function my_scandir($dir_path){

  if ($handle = opendir('.')) {

   while (false !== ($entry = readdir($handle))) {

       if (substr($entry, -3) == "png") {
           echo "$entry\n";
       }
   }
   closedir($handle);
}
}

my_merge_image($argv[1], $argv[2], "laurine.png");
my_scandir("CssGenerator");
 ?>
