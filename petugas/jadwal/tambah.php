<?php

session_start();
require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Data jadwal penerbangan berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data jadwal penerbangan gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai");


?>

<?php require '../../layouts/sidebar_petugas.php'; ?>

<div class="main">
<h1>Tambah Jadwal Penerbangan</h1>

<form action="" method="POST">
    <label for="id_rute">Pilih Rute</label><br />
    <select name="id_rute" id="id_rute">
        <?php foreach($rute as $data) : ?>
        <option value="<?= $data["id_rute"]; ?>"><?= $data["nama_maskapai"]; ?> - <?= $data["rute_asal"]; ?> - <?= $data["rute_tujuan"]; ?></option>
        <?php endforeach; ?>
    </select><br /> <br />

    <label for="waktu_berangkat">Waktu Berangkat</label><br />
    <input type="time" name="waktu_berangkat" id="waktu_berangkat"><br /><br />

    <label for="waktu_tiba">Waktu Tiba</label><br />
    <input type="time" name="waktu_tiba" id="waktu_tiba"><br /><br />
     
    <label for="tanggal_pergi">Tanggal Pergi</label><br>
    <input type="date" name="tanggal_pergi" id="tanggal_pergi"><br><br>

    <label for="harga">Harga</label><br />
    <input type="number" name="harga" id="harga"><br /><br />

    <button type="submit" name="tambah">Tambah</button>
</form>

</div>