<?php
require_once 'config.php';

$user = $_POST["x-uname"];
$pass = $_POST["x-pass"];

$hasils = get_login('tb_user', "username = '$user' AND password = '$pass'");
if ($hasils == []){
    $hasil["hasil"][] = array("msg" => "403");
    $hasil["result"][] = null;
} else {
    $hasil["hasil"][] = array("msg" => "200");
    $hasil["result"] = $hasils;
}

echo json_encode($hasil);

