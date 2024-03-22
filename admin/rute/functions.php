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
    $id_maskapai = htmlspecialchars($data["id_maskapai"]);
    $rute_asal = htmlspecialchars($data["rute_asal"]);
    $rute_tujuan = htmlspecialchars($data["rute_tujuan"]);
    $tanggal_pergi = htmlspecialchars($data["tanggal_pergi"]);

    $query = "INSERT INTO rute VALUES (NULL, '$id_maskapai', '$rute_asal', '$rute_tujuan', '$tanggal_pergi')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn; 
    mysqli_query($conn, "DELETE FROM rute WHERE id_rute = '$id'");
    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    
    $id = htmlspecialchars($data["id_rute"]);
    $id_maskapai = htmlspecialchars($data["id_maskapai"]);
    $rute_asal = htmlspecialchars($data["rute_asal"]);
    $rute_tujuan = htmlspecialchars($data["rute_tujuan"]);
    $tanggal_pergi = htmlspecialchars($data["tanggal_pergi"]);

    $query = "UPDATE rute SET
    id_maskapai = '$id_maskapai',
    rute_asal = '$rute_asal',
    rute_tujuan = '$rute_tujuan',
    tanggal_pergi = '$tanggal_pergi' WHERE id_rute = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}