<?php

$host = "localhost";
$user = "daaw4477_dq";
$pass = "joya_123";
$dtbs = "daaw4477_db_pab";

// $host = "localhost";
// $user = "root";
// $pass = "";
// $dtbs = "db_pab";

$koneksi = mysqli_connect($host, $user, $pass, $dtbs);


function get_login($table, $kondisi = ""){
    if($kondisi != null){
        $query = "SELECT * FROM " . $table . " WHERE " . $kondisi;
    } else {
        $query = "SELECT * FROM " . $table;
    }
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $hasil = [];
    while($row = mysqli_fetch_array($result)){
        $hasil[] = array(
            "id" => $row["id"],
            "nama" => $row["nama_lengkap"],
            "username" => $row["username"]
        );
    }
    return $hasil;
}

function register($nama, $email, $pass){
    global $koneksi;
    $query = "INSERT INTO tb_user VALUES('', '$nama', '$email', '$pass')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function delete($id){
    global $koneksi;
    $query = "DELETE FROM tb_hutang_piutang WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function add($keterangan = "", $nominal, $tanggal, $jenis, $status, $tanggal_lunas, $id_user){
    global $koneksi;
    $query = "INSERT INTO tb_hutang_piutang VALUES('', '$keterangan', '$nominal', '$tanggal', '$tanggal_lunas', '$jenis', '$status', '$id_user')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function edit($keterangan = "", $nominal, $tanggal, $jenis, $status, $tanggal_lunas, $id){
    global $koneksi;
    $query = "UPDATE `tb_hutang_piutang` SET `keterangan` = '$keterangan', `nominal` = '$nominal', `tanggal` = '$tanggal', `tanggal_lunas` = '$tanggal_lunas', `status` = '$status', `jenis` = '$jenis' WHERE `tb_hutang_piutang`.`id` = '$id'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function get_total_hutang($jenis, $id_user){
    global $koneksi;
    $query = "SELECT SUM(tb_hutang_piutang.nominal) AS hutang FROM `tb_hutang_piutang` WHERE jenis = $jenis AND status ='2' AND id_user='$id_user'";
    $result = mysqli_query($koneksi, $query);
    $hasil = [];
    while($row = mysqli_fetch_array($result)){
        $hasil[] = array(
            "jumlah" => $row["hutang"]
        );
    }
    return $hasil;
}

function get_list($jenis, $id_user){
    global $koneksi;
    $query = "SELECT * FROM `tb_hutang_piutang` WHERE jenis = $jenis AND id_user='$id_user'";
    $result = mysqli_query($koneksi, $query);
    $hasil = [];
    while($row = mysqli_fetch_array($result)){
        $hasil[] = array(
            "id"    => $row["id"],
            "keterangan" => $row["keterangan"],
            "nominal" => $row["nominal"],
            "tanggal" => $row["tanggal"],
            "tanggal_lunas" => $row["tanggal_lunas"],
            "jenis" => $row["jenis"],
            "status" => $row["status"],
        );
    }
    return $hasil;
}

