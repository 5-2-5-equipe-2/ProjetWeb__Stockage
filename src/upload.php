<?php
$target_dir = "/home/fileszfhjsdbn/www/ProjetWeb__Stockage/src/files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$name_file = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" && $imageFileType != "svg"
) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  try {

    $name_file= explode(".", $name_file);

    $name_file = $name_file [0]. rand(100000000, 10000000000000) . "." . $name_file[1];
    // $f2 = fopen("$name_file", "w");
    // fwrite($f2, fread($f, filesize($_FILES["fileToUpload"]["tmp_name"])));
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $name_file);
  } catch (Exception $e) {
    echo "Sorry, there was an error uploading your file.";
  }
}
