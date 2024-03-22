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

$kota = query("SELECT * FROM kota");

?>

<?php require '../../sidebar_admin.php'; ?>
<h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
<div class="main">
    <h1>Data kota | E - Ticketing</h1>
    <a href="tambah.php">Tambah</a><br><br> 
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama kota</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach($kota as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data["nama_kota"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $data["id_kota"]; ?>">Edit</a>
                    <a href="hapus.php?id=<?= $data["id_kota"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php $no++; ?>
        <?php endforeach; ?>    
    </table>
</div>