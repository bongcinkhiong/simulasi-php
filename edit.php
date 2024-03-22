<?php

session_start();
require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

$id = $_GET["id"];
$order = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
WHERE jadwal_penerbangan.id_jadwal = $id_order")[0];


if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Data jadwal penerbangan berhasil diedit')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data jadwal penerbangan gagal diedit')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require 'layouts/navbar.php.php'; ?>

<div class="edit">
<h1>Edit Rute</h1>
<form action="" method="POST">
    <input type="hidden" name="id_jadwal" value="<?= $jadwal["id_jadwal"]; ?>">

    <label for="id_rute">Pilih Rute</label><br />
    <select name="id_rute" id="id_rute">
        <?php foreach($rute as $data) : ?>
        <option value="<?= $data["id_rute"]; ?>"><?= $data["nama_maskapai"]; ?> - <?= $data["rute_asal"]; ?> - <?= $data["rute_tujuan"]; ?></option>
        <?php endforeach; ?>
    </select><br /> <br />

    <label for="tanggal_pergi">Tanggal Pergi</label>
    <input type="date" name="tanggal_pergi" id="tanggal_pergi" value="<?= $rute["tanggal_pergi"] ?>"><br><br>

    <label for="harga">Harga</label><br />
    <input type="number" name="harga" id="harga" value="<?= $jadwal["harga"]; ?>"><br /><br />

    <label for="kapasitas">kapasitas</label><br />
    <input type="number" name="kapasitas" id="kapasitas" value="<?= $jadwal["kapasitas"]; ?>"><br /><br />

    <button type="submit" name="edit">Edit</button>
</form>
</div>
