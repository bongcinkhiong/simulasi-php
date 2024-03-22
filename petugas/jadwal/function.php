<?php

require '../../koneksi.php';

function query($query){

    global $conn;

    $rows = [];

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;    
}

function tambah($data){

    global $conn;
    $id_rute = htmlspecialchars($data["id_rute"]);
    $waktu_berangkat = htmlspecialchars($data["waktu_berangkat"]);
    $waktu_tiba = htmlspecialchars($data["waktu_tiba"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO jadwal_penerbangan VALUES (NULL, '$id_rute', '$waktu_berangkat', '$waktu_tiba', '$harga')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn; 
    mysqli_query($conn, "DELETE FROM jadwal_penerbangan WHERE id_jadwal = '$id'");
    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    
    $id = htmlspecialchars($data["id_jadwal"]);
    $id_rute = htmlspecialchars($data["id_rute"]);
    $waktu_berangkat = htmlspecialchars($data["waktu_berangkat"]);
    $waktu_tiba = htmlspecialchars($data["waktu_tiba"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "UPDATE jadwal_penerbangan SET
    id_rute = '$id_rute',
    waktu_berangkat = '$waktu_berangkat',
    waktu_tiba = '$waktu_tiba',
    harga = '$harga' WHERE id_jadwal = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}