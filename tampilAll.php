<?php

    include 'config.php';
    $id = $_POST["x-ids"];

    $hasil = [
        "hasil" => [
            ["status" => 200, "msg" => "Pengambilan Data Sukses"]
        ],
        "Hutang" => get_total_hutang(1, $id),
        "piutang" => get_total_hutang(2, $id),
    ];

    echo json_encode($hasil);