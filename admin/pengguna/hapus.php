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

if(hapus($id) > 0){
    echo "
    <script type='text/javascript'>
        alert('Data pengguna berhasil dihapus');
        window.location = 'index.php';
    </script>
    ";
}else{
    echo "
    <script type='text/javascript'>
        alert('Data pengguna gagal ditambahkan :(')
        window.location = 'index.php';
    </script>
    ";
}


?>


