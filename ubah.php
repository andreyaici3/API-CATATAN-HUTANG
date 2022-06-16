<?php
include 'config.php';

@$ket = $_POST["x-keterangan"];
@$nom = $_POST["x-nominal"];
@$tgl = date('Y-m-d');
@$jns = $_POST["x-jenis"];
@$sts = $_POST["x-status"];
@$lns = ($_POST["x-lunas"]=="")? "" : $_POST["x-lunas"];
@$id = $_POST["x-id"];

if ($id != ""){
    if (edit($ket, $nom, $tgl, $jns, $sts, $lns, $id) > 0){
        $hasil = [
            "hasil" => [
                ["status" => 200, "msg" => "Ubah Data Berhasil"]
            ]
        ];
    } else {
        $hasil = [
            "hasil" => [
                ["status" => 403, "msg" => "Ubah Data Gagal"]
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