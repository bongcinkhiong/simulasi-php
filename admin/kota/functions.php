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
    $nama_kota = htmlspecialchars($data["nama_kota"]);

    $query = "INSERT INTO kota VALUES (NULL, '$nama_kota')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn; 
    mysqli_query($conn, "DELETE FROM kota WHERE id_kota = '$id'");
    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    
    $id = htmlspecialchars($data["id_kota"]);
    $nama_kota = htmlspecialchars($data["nama_kota"]);

    $query = "UPDATE kota SET
    nama_kota = '$nama_kota' WHERE id_kota = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}