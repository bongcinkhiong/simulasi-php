<?php

session_start();
require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
            alert('Silahkan login terlebih dahulu');
            window.location = '../auth/login/'
        </script>
    ";
}

$maskapai = query("SELECT * FROM maskapai");
$kota = query("SELECT * FROM kota");

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0){
        echo "
        <script type='text/javascript'>
            alert('Data kota berhasil ditambahkan!');
            window.location = 'index.php'
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data kota gagal ditambahkan!');
            window.location = 'index.php'
        </script>
    ";
    }
}

?>

<?php require '../../layouts/sidebar_petugas.php'; ?>

<div class="main">
<h1>Tambah Rute</h1>
<form action="" method="post">
    <label for="id_maskapai">Nama Maskapai</label><br>
    <select name="id_maskapai" id="id_maskapai">
        <?php foreach($maskapai as $namaMaskapai) : ?>
            <option value="<?= $namaMaskapai["id_maskapai"]; ?>"><?= $namaMaskapai["nama_maskapai"]; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="rute_tujuan">Rute Asal</label><br>
    <select name="rute_asal" id="rute_asal">
        <?php foreach($kota as $namaKota) : ?>
            <option value="<?= $namaKota["nama_kota"]; ?>"><?= $namaKota["nama_kota"]; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="rute_tujuan">Rute Tujuan</label><br>
    <select name="rute_tujuan" id="rute_tujuan">
        <?php foreach($kota as $namaKota) : ?>
            <option value="<?= $namaKota["nama_kota"]; ?>"><?= $namaKota["nama_kota"]; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="tanggal_pergi">Tanggal Pergi</label><br>
    <input type="date" name="tanggal_pergi" id="tanggal_pergi"><br><br>

    <button type="submit" name="tambah">tambah</button>
</form>
</div>