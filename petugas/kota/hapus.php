<?php

require 'function.php';

$id = $_GET["id"];


if(hapus($id) > 0){
    echo"
        <script type=text/javascript>
            alert('Data Kota Berhasil Di Hapus');
            window.location = 'index.php';
        </script>
    ";
}else{
    echo"
        <script typw=text/javascript>
            alert('Data Kota Gagal Di Hapus');
            window.location = 'index.php';
        </script>
    ";
}

?>