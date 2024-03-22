<?php

require 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">E - Ticketing</div>
        <div class="menu">
            <a href="/e-ticketing/index.php">Beranda</a>
            <a href="/e-ticketing/index.php">Jadwal Penerbangan</a>
            <a href="/e-ticketing/cart.php">Pemesanan Tiket</a>
            <a href="/e-ticketing/history.php">Riwayat Pemesanan</a>
        </div>
        <div class="authentication">
            <?php if(isset($_SESSION["username"])) {
                ?>
                <span>Halo, <?= $_SESSION["nama_lengkap"]; ?></span>
                <a href="logout.php">Logout</a>
                <?php
            }else{
                ?>
                <a href="auth/login/">Login</a>
                <a href="auth/register/">Register</a>
                <?php
            } ?>
        </div>
    </div>

</body>
</html>