<?php
include 'config.php';
@$ket = $_POST["x-keterangan"];
@$nom = $_POST["x-nominal"];
@$tgl = date('Y-m-d');
@$jns = $_POST["x-jenis"];
@$sts = $_POST["x-status"];
@$lns = ($_POST["x-lunas"]=="")? "" : $_POST["x-lunas"];

if ($nom != "" && $tgl != "" && $jns != ""){
    if (add($ket, $nom, $tgl, $jns, $sts, $lns) > 0){
        $hasil = [
            "hasil" => [
                ["status" => 200, "msg" => "Tambah Data Berhasil"]
            ]
        ];
    } else {
        $hasil = [
            "hasil" => [
                ["status" => 403, "msg" => "Tambah Data Gagal"]
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