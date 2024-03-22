<?php
require '../layouts/sidebar_admin.php';
require 'function.php';

$tiket = query("SELECT * FROM order_detail 
INNER JOIN order_tiket ON order_detail.id_order = order_tiket.id_order
INNER JOIN user ON order_detail.id_user = user.id_user
INNER JOIN jadwal_penerbangan ON order_detail.id_jadwal = jadwal_penerbangan.id_jadwal
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute
INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai");

?>
<div class="main">
    <h1>History Pemesanan</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Maskapai</th>
            <th>Jumlah Tiket</th>
            <th>Rute Asal</th>
            <th>Rute Tujuan</th>
            <th>Tanggal Pergi</th>
            <th>Waktu Berangkat</th>
            <th>Waktu Tiba</th>
            <th>Harga</th>
            <th>Status</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($tiket as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data["nama_maskapai"]; ?></td>
                <td><?= $data["jumlah_tiket"]; ?></td>
                <td><?= $data["rute_asal"]; ?></td>
                <td><?= $data["rute_tujuan"]; ?></td>
                <td><?= $data["tanggal_pergi"]; ?></td>
                <td><?= $data["waktu_berangkat"]; ?></td>
                <td><?= $data["waktu_tiba"]; ?></td>
                <td>Rp <?= number_format($data["harga"]); ?></td>
                <td>
                    <?php 
                    if($data["status"] == "Proses"){
                        ?>
                        <a href="update_status.php?id=<?= $data["id_order"]; ?>" style="color: yellow;">Proses</a>
                        <?php
                    }else if($data["status"] == "Berhasil"){
                        ?>
                        <a href="" style="color: green;">berhasil</a>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</div>
