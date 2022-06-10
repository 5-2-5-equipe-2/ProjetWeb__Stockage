<?php

if (isset($_POST["file_name"]))
$file_name = $_POST["file_name"];
$file_content_b64 = $_POST["file_content"];
$file_name = explode(".", $file_name);

$file_name = $file_name[0] . rand(1000000000000, 10000000000000) . "." . $file_name[1];
file_put_contents("files/$file_name", base64_decode($file_content_b64));
// redirect to the page where the image is uploaded
print_r($_SERVER);
echo "{$_SERVER["HTTP_HOST"]}/files/$file_name";
// header("Location: getfile.php?file_name=$file_name");