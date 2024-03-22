<?php require 'layouts/navbar.php'; ?>
<?php 

$id = $_GET["id"];
$jadwalPenerbangan = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id'")[0];
?>

<div class="list-tiket-pesawat">
    <h1>Detail Jadwal Penerbangan - E Ticketing</h1>
    <div class="wrapper-detail-tiket-pesawat">
        <div class="card-detail-tiket-pesawat">
            <div class="image"><img src="assets/images/<?= $jadwalPenerbangan["logo_maskapai"]; ?>"  width="80"></div>
            <div class="nama-maskapai"><?= $jadwalPenerbangan["nama_maskapai"]; ?></div>
            <div class="tanggal-berangkat"><?= $jadwalPenerbangan["tanggal_pergi"]; ?></div>
            <div class="waktu-berangkat"><?= $jadwalPenerbangan["waktu_berangkat"]; ?> - <?= $jadwalPenerbangan["waktu_tiba"]; ?></div>
            <div class="rute-penerbangan"><?= $jadwalPenerbangan["rute_asal"] ?> - <?= $jadwalPenerbangan["rute_tujuan"]; ?></div>
            <div class="kapasitas">Kapastias Kursi : <?= $jadwalPenerbangan["kapasitas_kursi"]; ?></div>
            <div class="text-harga">Rp <?= number_format($jadwalPenerbangan["harga"]); ?></div><br />
            <form action="" method="POST">
                <input type="number" name="qty"><br /><br />
                <button type="submit" name="beliTiket">Beli</button>
            </form>
        </div>
    </div>
</div>

<?php 

if(isset($_POST["beliTiket"])){
    if($_POST["qty"] > $jadwalPenerbangan["kapasitas_kursi"]){
        echo "
        <script type='text/javascript'>
            alert('Mesen Tiket yang wajar');
            window.location = 'index.php'
        </script>
    ";
    }else if($_POST["qty"] <= 0){
        echo "
        <script type='text/javascript'>
            alert('Beli 1 tiket ajah');
            window.location = 'index.php'
        </script>
        ";
    }else{
        $qty = $_POST["qty"];
        $_SESSION["cart"][$id] = $qty;
    
        echo "
            <script type='text/javascript'>
                alert('Tiket berhasil ditambahkan ke keranjang!');
                window.location = 'cart.php'
            </script>
        ";
    }
}

?>