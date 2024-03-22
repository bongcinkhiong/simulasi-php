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

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Data maskapai berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data maskapai gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="container-fluid">
    <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    <h1>Tambah Maskapai</h1>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="logo_maskapai">Logo Maskapai</label><br />
        <input class="form-control" type="file" name="logo_maskapai" id="logo_maskapai" class="form-control"><br /> <br />
    
        <label for="nama_maskapai">Nama Maskapai</label><br />
        <input class="form-control" type="text" name="nama_maskapai" id="nama_maskapai" class="form-control"><br /> <br />
    
        <label for="kapasitas">kapasitas</label><br />
        <input class="form-control" type="number" name="kapasitas" id="kapasitas" class="form-control"><br /> <br />
    
        <button class="form-control btn btn-primary" type="submit" name="tambah">Tambah</button>
    </form>
</div>
