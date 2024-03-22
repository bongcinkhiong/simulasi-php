<?php require 'layouts/navbar.php'; ?>
<?php 

$id = $_SESSION['id_user'];
$history = query("SELECT * FROM order_tiket INNER JOIN order_detail ON order_tiket.id_order = order_detail.id_order INNER JOIN user ON order_detail.id_user = user.id_user WHERE order_detail.id_user = '$id'");
?>


<div class="container-fluid">
    <div class="list-tiket-pesawat">
        <h1>Histori Pemesanan - E Ticketing</h1>
        <table class="table">
            <tr>
                <th>No</th>
                <th>No Order</th>
                <th>Struk</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($history as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['id_order']; ?></td>
                <td><?= $data['struk']; ?></td>
                <td><?= $data['status']; ?></td>
                <td>
                    <a class="btn btn-danger" href="detailHistory.php?id=<?= $data['id_order']; ?>">Hapuskan Aku</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>