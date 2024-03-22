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
                alert('Data kota berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data kota gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="container-fluid">
    <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    <h1>Tambah Kota</h1>
    
    <form action="" method="POST">
        <label for="nama_kota">Nama Kota</label><br />
        <input class="form-control" type="text" name="nama_kota" id="nama_kota" class="form-control"><br /> <br />
    
        <button class="form-control btn btn-primary" type="submit" name="tambah">Tambah</button>
    </form>
</div>
