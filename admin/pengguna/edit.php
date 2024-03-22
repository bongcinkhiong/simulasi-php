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
$pengguna = query("SELECT * FROM user WHERE id_user = '$id'")[0];

if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Data pengguna berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data pengguna gagal diedit')
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
        <input type="hidden" name="id_user" value="<?= $pengguna["id_user"]; ?>">
        <label for="username">Username</label><br />
        <input class="form-control" type="text" name="username" id="username" class="form-control" value="<?= $pengguna["username"]; ?>"><br /> <br />
    
        <label for="nama_lengkap">Nama Lengkap</label><br />
        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $pengguna["nama_lengkap"]; ?>"><br /> <br />
    
        <label for="password">Password</label><br />
        <input class="form-control" type="password" name="password" id="password" class="form-control" value="<?= $pengguna["password"] ?>"><br /> <br />
    
        <label for="roles">Roles</label><br />
        <select class="form-control" name="roles" id="roles">
            <option value="<?= $pengguna["roles"]; ?>"><?= $pengguna["roles"]; ?></option>
            <option value="Petugas">Petugas</option>
            <option value="Penumpang">Penumpang</option>
        </select><br /> <br />
    
        <button class="form-control btn btn-primary" type="submit" name="edit">Edit</button>
    </form>
</div>
