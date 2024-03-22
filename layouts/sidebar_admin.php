<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Admin</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .iw a {
        text-decoration: none;
        color: white;
        border: 10px solid #000000;
    }

    .iw a:hover {
        text-decoration: none;
        background-color: #747264;
        border: 10px solid #0000;
        border-radius: 20px;
    }
</style>

<body>
    <div class="navbar bg-dark">
        <div class="container-fluid iw">
            <a href="/e-ticketing/admin/index.php">Dashboard</a>
            <a href="/e-ticketing/admin/pengguna/">Data Pengguna</a>
            <a href="/e-ticketing/admin/maskapai/">Data Maskapai</a>
            <a href="/e-ticketing/admin/kota/">Data Kota</a>
            <a href="/e-ticketing/admin/rute/">Data Rute</a>
            <a href="/e-ticketing/admin/jadwal/">Data Jadwal Penerbangan</a>
            <a href="/e-ticketing/admin/order/">Pemesanan Tiket</a>
            <a href="/e-ticketing/logout.php" onClick="return confirm('Apakah anda yakin ingin logout?')">Logout</a>
        </div>
    </div>
</body>

</html>