<?php

session_start();
require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
            alert('Silahkan login terlebih dahulu ya!');
            window.location = '../auth/login/'
        </script>
    ";
}

$id = $_GET["id"];
$rute = query("SELECT * FROM rute INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_rute = '$id'")[0];

$maskapai = query("SELECT * FROM maskapai");
$kota = query("SELECT * FROM kota");

if(isset($_POST["edit"])){
    if(edit($_POST) > 0){                                                      
        echo "
        <script type='text/javascript'>
            alert('Data rute berhasil di perbahurui!');
            window.location = 'index.php'
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data rute gagal di perbahurui!');
            window.location = 'index.php'
        </script>
    ";
    }
}

?>

<?php require '../../layouts/sidebar_petugas.php'; ?>

<div class="main">
    <h1>edit Data rute | E - Ticketing</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_rute" value="<?= $rute["id_rute"]; ?>">
        <label for="id_maskapai">Nama Maskapai</label><br>
        <select name="id_maskapai" id="id_maskapai">
            <Option value="<?= $rute["id_maskapai"]; ?>"><?= $rute["nama_maskapai"]; ?></Option>
            <?php foreach($maskapai as $namaMaskapai) : ?>
                <?php if($data["id_maskapai"] != $rute["id_maskapai"]) : ?>
                    <option value="<?= $namaMaskapai["id_maskapai"]; ?>"><?= $namaMaskapai["nama_maskapai"]; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br><br>

        <label for="rute_tujuan">Rute Asal</label><br>
        <select name="rute_asal" id="rute_asal">
            <option value="<?= $rute["rute_asal"]; ?>"><?= $rute["rute_asal"]; ?></option>
            <?php foreach($kota as $namaKota) : ?>
                <?php if($data["nama_kota"] != $rute["rute_asal"]) : ?>
                    <option value="<?= $namaKota["nama_kota"]; ?>"><?= $namaKota["nama_kota"]; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br><br>

        <label for="rute_tujuan">Rute Tujuan</label><br>
        <select name="rute_tujuan" id="rute_tujuan">
            <option value="<?= $rute["rute_tujuan"]; ?>"><?= $rute["rute_tujuan"]; ?></option>
            <?php foreach($kota as $namaKota) : ?>
                <?php if($data["nama_kota"] != $rute["rute_tujuan"]) : ?>
                    <option value="<?= $namaKota["nama_kota"]; ?>"><?= $namaKota["nama_kota"]; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br><br>

        <label for="tanggal_pergi">Tanggal Pergi</label><br>
        <input type="date" name="tanggal_pergi" id="tanggal_pergi" value="<?= $rute["tanggal_pergi"] ?>"><br><br>

        <button type="submit" name="edit">edit</button>
    </form>
</div>