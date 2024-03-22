<?php

session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

$id = $_GET["id"];
$maskapai = query("SELECT * FROM maskapai WHERE id_maskapai = '$id'")[0];

if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Data maskapai berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data maskapai gagal diedit')
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
    
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_maskapai" value="<?= $maskapai["id_maskapai"]; ?>">
        
        <label for="logo_maskapai">Logo Maskapai</label><br />
        <input type="file" name="logo_maskapai" id="logo_maskapai" class="form-control" value="<?= $maskapai["logo_maskapai"]; ?>"><br /> <br />
    
        <label for="nama_maskapai">Nama Maskapai</label><br />
        <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control" value="<?= $maskapai["nama_maskapai"]; ?>"><br /> <br />
    
        <label for="kapasitas">kapasitas</label><br />
        <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="<?= $maskapai["kapasitas"]; ?>"><br /> <br />
    
        <button type="submit" name="edit">Edit</button>
    </form>
</div>