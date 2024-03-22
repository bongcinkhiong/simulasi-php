<?php

session_start();

$id = $_GET["id"];

unset($_SESSION["cart"][$id]);
echo "
        <script type='text/javascript'>
            alert('anda berhasil logout');
        </script>
    ";
header("location: cart.php");
?>