<?php

$file_name=$_POST['file_name'];
$file_content_b64=$_POST['file_content'];
$name_file= explode(".", $name_file);

$name_file = $name_file [0]. rand(1000000000000, 10000000000000) . "." . $name_file[1];
file_put_contents($name_file, base64_decode($file_content_b64));
