<?php 
require '../koneksi.php';
$id = $_GET["id"];

$query = mysqli_query($conn, "UPDATE order_tiket SET status ='Berhasil' WHERE id_order = '$id'");

if($query){
    echo "
    <script type='text/javascript'>
        alert('Berhasil update');
        window.location = 'history.php
    </script>
";
}
?>