<?php

session_start();
require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
            alert('Silahkan login terlebih dahulu');
            window.location = '../auth/login/'
        </script>
    ";
}

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0){
        echo "
        <script type='text/javascript'>
            alert('Data kota berhasil ditambahkan!');
            window.location = 'index.php'
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data kota gagal ditambahkan!');
            window.location = 'index.php'
        </script>
    ";
    }
}

?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="main">
    <h1>Tambah Data kota | E - Ticketing</h1>
    <form action="" method="post" enctype="multipart/form-data">
        
        <label for="nama_kota">nama kota</label><br>
        <input type="text" name="nama_kota" id="nama_kota" class="form-control"><br><br>

        <button type="submit" name="tambah">tambah</button>
    </form>
</div>