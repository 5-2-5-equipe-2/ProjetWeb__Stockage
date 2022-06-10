<?php
//$origin = "http://" . $_SERVER['HTTP_HOST'] . ":3000";
$origin = "http://localhost:3000";
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Origin: $origin");
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}
//    echo "Origin: $origin";
header("Access-Control-Allow-Origin: $origin");
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

if (isset($_POST["file_name"])) {
    $file_name = $_POST["file_name"];
    $file_content_b64 = $_POST["file_content"];
    $file_name = explode(".", $file_name);

    $file_name = $file_name[0] . rand(1000000000000, 10000000000000) . "." . $file_name[1];
    file_put_contents("files/$file_name", base64_decode($file_content_b64));
    // redirect to the page where the image is uploaded
    // print_r($_SERVER);
    echo json_encode(array("url" => "{$_SERVER["HTTP_HOST"]}/files/$file_name"));
    // return "{$_SERVER["HTTP_HOST"]}/files/$file_name";
    // header("Location: getfile.php?file_name=$file_name");
} else {
    echo "Method not supporterd!!";
}
