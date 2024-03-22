<?php

session_start();
require 'koneksi.php';

function query($query){

    global $conn;

    $rows = [];

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;    
}


function checkout($data){
    global $conn; 
    
    $idOrder = uniqid();
    $tanggalTransaksi = date('Y-m-d');
    $struk = bin2hex(random_bytes(10));
    $status = "proses";
    $queryOrder = "INSERT INTO order_tiket VALUES ('$idOrder', '$tanggalTransaksi', '$struk', '$status')";
    mysqli_query($conn, $queryOrder);


    foreach($_SESSION["cart"] as $id_tiket => $kuantitas) : ?>
        <?php $tiket = query("SELECT * FROM jadwal_penerbangan INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id_tiket'")[0]; 
        $totalHarga = $data["harga"] * $kuantitas;

        $id_user = $data["id_user"];
        $id_jadwal = $tiket["id_jadwal"];
        $jumlahTiket = $kuantitas;
        $sisaKapasitas = $tiket['kapasitas_kursi'] - $kuantitas;
        $totalHarga = $totalHarga;

        $queryOrderDetail = "INSERT INTO order_detail VALUES(NULL, '$id_user', '$id_jadwal', '$idOrder', '$jumlahTiket', '$totalHarga')";
        mysqli_query($conn, $queryOrderDetail);
        
        if($queryOrderDetail){
            mysqli_query($conn,"UPDATE jadwal_penerbangan SET kapasitas_kursi = '$sisaKapasitas' WHERE id_jadwal = '$id_jadwal'");
        }

    endforeach;
    unset($_SESSION["cart"]);
    return true; 
}

?>
