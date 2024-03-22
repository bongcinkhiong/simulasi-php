<?php

require '../../koneksi.php';

$username = htmlspecialchars($_POST["username"]);
$nama_lengkap = htmlspecialchars($_POST["nama_lengkap"]);
$password = htmlspecialchars($_POST["password"]);
$roles = "penumpang";

$query = mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$username', '$nama_lengkap', '$password', '$roles')");

if($query){
    echo "
        <script type='text/javascript'>
            alert('Register berhasil, Silahkan Login ya!');
            window.location = '../login/'
        </script>
    ";
}else{
    echo "
    <script type='text/javascript'>
        alert('Register gagal, silahkan cek kembali ya!');
        window.location = 'index.php'
    </script>
";
}

?>