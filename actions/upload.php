<?php

$target_dir = $_SERVER['DOCUMENT_ROOT'].IMAGES_URL;
$target_file = $target_dir . basename($_FILES["picture"]["name"]);
$uploadOk = 1;
$imageExists = 0;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $imageExists = 1;
}
// Check file size
if ($_FILES["picture"]["size"] > 500000) {
    $uploadOk = 0;
}

if (!$imageExists) {
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk != 0) {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }
}
