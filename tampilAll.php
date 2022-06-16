<?php

    include 'config.php';

    $hasil = [
        "hasil" => [
            ["status" => 200, "msg" => "Pengambilan Data Sukses"]
        ],
        "Hutang" => get_total_hutang(1),
        "piutang" => get_total_hutang(2),
    ];

    echo json_encode($hasil);