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

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai");

?>

<?php require '../../layouts/sidebar_petugas.php'; ?> 
<h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
<div class="rute">
    <h1>Data Rute | E - Ticketing</h1>
    <a href="tambah.php">Tambah</a><br><br> 
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Maskapai</th>
            <th>Rute Asal</th>
            <th>Rute Tujuan</th>
            <th>Tanggal Pergi</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach($rute as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data["nama_maskapai"]; ?></td>
                <td><?= $data["rute_asal"]; ?></td>
                <td><?= $data["rute_tujuan"]; ?></td>
                <td><?= $data["tanggal_pergi"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $data["id_rute"]; ?>">Edit</a>
                    <a href="hapus.php?id=<?= $data["id_rute"]; ?>" onClick="return confirm('Apakah ANda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php $no++; ?>
        <?php endforeach; ?>    
    </table>
</div>