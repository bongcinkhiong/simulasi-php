<?php

session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

$id = $_GET["id"];
$kota = query("SELECT * FROM kota WHERE id_kota = '$id'")[0];

if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Data kota berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data kota gagal diedit :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="container-fluid">
    <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    <h1>Edit Petugas</h1>
    
    <form action="" method="POST">
        <input type="hidden" name="id_kota" value="<?= $kota["id_kota"]; ?>">
        <label for="nama_kota">Nama Kota</label><br />
        <input class="form-control" type="text" name="nama_kota" id="nama_kota" class="form-control" value="<?= $kota["nama_kota"]; ?>"><br /> <br />
    
        <button class="form-control btn btn-primary" type="submit" name="edit">Edit</button>
    </form>
</div>
