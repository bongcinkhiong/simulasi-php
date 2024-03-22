<?php

session_start();
require 'functions.php';

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

$pengguna = query("SELECT * FROM user WHERE roles = 'Petugas' || roles = 'Penumpang'");


?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="container-fluid">
    <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    <h1>Halaman Pengguna</h1>

    <a class="btn btn-dark mb-3" href="tambah.php">Tambah <i class='bx bx-plus bx-flip-horizontal' style='color:#ffffff'></i></a>
    
    <table class="table" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Roles</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($pengguna as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data["username"]; ?></td>
                <td><?= $data["nama_lengkap"]; ?></td>
                <td><?= $data["roles"]; ?></td>
                <td>
                    <a style="color: green;" href="edit.php?id=<?= $data["id_user"]; ?>">Edit</a>
                    <a style="color: red;" href="hapus.php?id=<?= $data["id_user"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</div>