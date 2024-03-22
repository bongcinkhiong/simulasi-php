<?php 
require '../../koneksi.php';
$id = $_GET["id_order"];

$query = mysqli_query($conn, "UPDATE order_tiket SET status ='Berhasil' WHERE id_order = '$id'");

if($query){
    echo "
    <script type='text/javascript'>
        alert('Konfirmasi Berhasil');
        window.location = 'index.php';
    </script>
";
}
?>