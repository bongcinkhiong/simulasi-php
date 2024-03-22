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

    $logo_maskapai = $_FILES["logo_maskapai"]["name"];
    $files = $_FILES["logo_maskapai"]["tmp_name"];
    $nama_maskapai = htmlspecialchars($data["nama_maskapai"]);
    $kapasitas = htmlspecialchars($data["kapasitas"]);

    $query = "INSERT INTO maskapai VALUES(NULL, '$logo_maskapai', '$nama_maskapai', '$kapasitas')";

    move_uploaded_file($files, "../../assets/images/".$logo_maskapai);

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn; 
    mysqli_query($conn, "DELETE FROM maskapai WHERE id_maskapai = '$id'");
    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    
    $id = htmlspecialchars($data["id_maskapai"]);
    $logo_maskapai = $_FILES["logo_maskapai"]["name"];
    $files = $_FILES["logo_maskapai"]["tmp_name"];
    $nama_maskapai = htmlspecialchars($data["nama_maskapai"]);
    $kapasitas = htmlspecialchars($data["kapasitas"]);

    if(empty($logo_maskapai)){
        $query = "UPDATE maskapai SET
        nama_maskapai = '$nama_maskapai',
        kapasitas = '$kapasitas' WHERE id_maskapai = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }else{
        $query = "UPDATE maskapai SET
        logo_maskapai = '$logo_maskapai',
        nama_maskapai = '$nama_maskapai',
        kapasitas = '$kapasitas' WHERE id_maskapai = '$id'";

        move_uploaded_file($files, "../../assets/images/".$logo_maskapai);
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}