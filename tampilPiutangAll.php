<?php

    include 'config.php';
    $id = $_GET["x-ids"];

    $hasil = [
        "hasil" => [
            ["status" => 200, "msg" => "Pengambilan Data Sukses"]
        ],
        "list_pinjaman" => get_list(2, $id),
    ];

    echo json_encode($hasil);