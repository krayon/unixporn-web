<?php

// Force SSL function
function isSecure() {
if(empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
    header("Location: https://www." . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit(); 
  }
}

// Random string generator
function randString($length = 7) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Create image thumbnail
function image_to_thumb($src, $dest, $thumb_width, $thumb_quality) {

    // Read the source image
    $imgext = strtolower(substr(strrchr($src,"."),1));
    if($imgext == 'jpeg') $imgext = 'jpg';
    switch($imgext){
    case 'bmp': $src_image = imagecreatefromwbmp($src); break;
    case 'gif': $src_image = imagecreatefromgif($src); break;
    case 'jpg': $src_image = imagecreatefromjpeg($src); break;
    case 'png': $src_image = imagecreatefrompng($src); break;
    default : return "Unsupported picture type!";
    }
    $src_width = imagesx($src_image);
    $src_height = imagesy($src_image);

    // Generate thumbnail height, relative to its width
    $thumb_height = floor($src_height * ($thumb_width / $src_width));

    // Create a new image with target dimensions
    $dest_image = imagecreatetruecolor($thumb_width, $thumb_height);

    // Copy source image to destination image, with new dimensions
    imagecopyresampled($dest_image, $src_image, 0, 0, 0, 0, $thumb_width, $thumb_height, $src_width, $src_height);

    // create the physical thumbnail image to its destination
    imagejpeg($dest_image, $dest, $thumb_quality);

    // Free up resources
    imagedestroy($src_image);
    imagedestroy($dest_image);
}
?>