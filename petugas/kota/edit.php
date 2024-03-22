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

$id = $_GET["id"];
$kota = query("SELECT * FROM kota WHERE id_kota = '$id'")[0];

if(isset($_POST["edit"])){
    if(edit($_POST) > 0){                                                      
        echo "
        <script type='text/javascript'>
            alert('Data kota berhasil di perbahurui!');
            window.location = 'index.php'
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data kota gagal di perbahurui!');
            window.location = 'index.php'
        </script>
    ";
    }
}

?>

<?php require '../../sidebar_admin.php'; ?>

<div class="edit">
    <h1>edit Data kota | E - Ticketing</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_kota" value="<?= $kota["id_kota"]; ?>"><br>

        <label for="nama_kota">nama kota</label><br>
        <input type="text" name="nama_kota" id="nama_kota" class="form-control" value="<?= $kota["nama_kota"]; ?>"><br><br>

        <button type="submit" name="edit">edit</button>
    </form>
</div>