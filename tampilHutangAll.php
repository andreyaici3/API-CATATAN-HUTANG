<?php

    include 'config.php';

    $hasil = [
        "hasil" => [
            ["status" => 200, "msg" => "Pengambilan Data Sukses"]
        ],
        "list_pinjaman" => get_list(1),
    ];

    echo json_encode($hasil);