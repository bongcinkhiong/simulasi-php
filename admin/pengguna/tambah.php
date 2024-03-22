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
                alert('Data pengguna berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data pengguna gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="container-fluid">
    <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    <h1>Tambah Petugas</h1>
    
    <form action="" method="POST">
        <label for="username">Username</label><br />
        <input class="form-control"  type="text" name="username" id="username" class="form-control"><br /> <br />
    
        <label for="nama_lengkap">Nama Lengkap</label><br />
        <input class="form-control"  type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"><br /> <br />
    
        <label for="password">Password</label><br />
        <input class="form-control"  type="password" name="password" id="password" class="form-control"><br /> <br />
    
        <label for="roles">Roles</label><br />
        <select class="form-control"     name="roles" id="roles">
            <option value="Petugas">Petugas</option>
            <option value="Penumpang">Penumpang</option>
        </select><br /> <br />
    
        <button class="form-control btn btn-primary" type="submit" name="tambah">Tambah</button>
    </form>
</div>
