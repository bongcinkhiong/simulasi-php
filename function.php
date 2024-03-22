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
function hapus($id){
    global $conn; 
    mysqli_query($conn, "DELETE FROM jadwal_penerbangan WHERE id_jadwal = '$id'");
    return mysqli_affected_rows($conn);
}
function checkout($data){
    global $conn;

    $id_order = uniqid();
    $tanggal_transaksi = date('Y-m-d');
    $struk = bin2hex(random_bytes(10));
    $status = "proses";
    $queryOrder = "INSERT INTO order_tiket VALUES ('$id_order', '$tanggal_transaksi', '$struk', '$status')";

    mysqli_query($conn, $queryOrder);

     foreach ($_SESSION["cart"] as $id_tiket => $kapasitas) : ?>
        <?php $tiket = query("SELECT * FROM jadwal_penerbangan 
                        INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                        INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
                        WHERE jadwal_penerbangan.id_jadwal = $id_tiket")[0];

        $total_harga = $tiket['harga'] * $kapasitas;

        $id_user = $data["id_user"];
        $id_jadwal = $data["id_penerbangan"];
        $jumlah_tiket = $kapasitas;
        $total_harga = $total_harga;

        $queryOrderDetail = "INSERT INTO order_detail VALUES(NULL, '$id_user', '$id_jadwal', '$id_order', '$jumlah_tiket', '$total_harga')";
        mysqli_query($conn, $queryOrderDetail);

     endforeach;
     unset($_SESSION["cart"]);
     return true;
}

?>