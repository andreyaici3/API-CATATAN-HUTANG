<?php
require_once 'config.php';

@$user = $_POST["x-uname"];
@$pass = $_POST["x-pass"];
@$nama = $_POST["x-name"];

if ($user != "" && $pass != "" && $nama != ""){
    if (register($nama, $user, $pass) > 0){
        $hasil = [
            "hasil" => [
                ["status" => 200, "msg" => "Pendaftaran Berhasil, Silahkan Login"]
            ]
        ];
    } else {
        $hasil = [
            "hasil" => [
                ["status" => 403, "msg" => "Pendaftaran Gagal"]
            ]
        ];
    }
}else {
    $hasil = [
        "hasil" => [
            ["status" => 403, "msg" => "Mohon Isi Semua Kolom"]
        ]
    ];
}

echo json_encode($hasil);
