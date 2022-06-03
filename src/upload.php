<?php
$target_dir = "/var/www/html/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "svg") {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  try {
    echo "######/n";
    echo $_FILES["fileToUpload"]["tmp_name"];
    $name_file=end(explode("/",$_FILES["fileToUpload"]["tmp_name"]));
    echo $name_file;
    $name_file=explode(".",$name_file);
    $f =fopen($_FILES["fileToUpload"]["tmp_name"],"r");
    // fpassthru($f);
    $name_file = $name_file[0].rand(1, 10000000000000).".".$name_file[1];
    $f2=fopen("uploads/$name_file","w");
    fwrite($f2,fread($f,filesize($_FILES["fileToUpload"]["tmp_name"])));
  } catch (Exception $e) {
    echo "Sorry, there was an error uploading your file.";
  }}
