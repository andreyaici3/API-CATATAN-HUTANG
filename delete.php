<?php
include 'config.php';
@$id = $_POST["x-id"];

if ($id != ""){
    if (delete($id) > 0){
        $hasil = [
            "hasil" => [
                ["status" => 200, "msg" => "Hapus Data Berhasil"]
            ]
        ];
    } else {
        $hasil = [
            "hasil" => [
                ["status" => 403, "msg" => "Hapus Data Gagal"]
            ]
        ];
    }
}else {
    $hasil = [
        "hasil" => [
            ["status" => 403, "msg" => "Hapus Data Gagal"]
        ]
    ];
}

echo json_encode($hasil);