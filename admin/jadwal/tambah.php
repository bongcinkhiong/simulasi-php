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

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="container-fluid">
    <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    <h1>Tambah Jadwal Penerbangan</h1>
    
    <form action="" method="POST">
        <label for="id_rute">Pilih Rute</label><br />
        <select name="id_rute" id="id_rute" class="form-control">
            <?php foreach($rute as $data) : ?>
            <option value="<?= $data["id_rute"]; ?>"><?= $data["nama_maskapai"]; ?> - <?= $data["rute_asal"]; ?> - <?= $data["rute_tujuan"]; ?></option>
            <?php endforeach; ?>
        </select><br /> <br />
    
        <label for="waktu_berangkat">Waktu Berangkat</label><br />
        <input class="form-control" type="time" name="waktu_berangkat" id="waktu_berangkat"><br /><br />
    
        <label for="waktu_tiba">Waktu Tiba</label><br />
        <input class="form-control" type="time" name="waktu_tiba" id="waktu_tiba"><br /><br />
    
        <label for="harga">Harga</label><br />
        <input class="form-control" type="number" name="harga" id="harga"><br /><br />
    
        <label for="kapasitas_kursi">kapasitas_kursi</label><br />
        <input class="form-control" type="number" name="kapasitas_kursi" id="kapasitas_kursi"><br /><br />
    
        <button class="form-control btn btn-primary" type="submit" name="tambah">Tambah</button>
    </form>
</div>
