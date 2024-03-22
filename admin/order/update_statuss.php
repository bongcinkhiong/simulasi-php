<?php 
require '../../koneksi.php';
$id = $_GET["id_order"];

$query = mysqli_query($conn, "UPDATE order_tiket SET status ='Gagal' WHERE id_order = '$id'");

if($query){
    echo "
    <script type='text/javascript'>
        alert('Ditolakkkkkkkkkkkkkkkkkkkkkkkkkkk');
        window.location = 'index.php';
    </script>
";
}
?>