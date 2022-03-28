<?php

session_start();

require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
    <script>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php'   
    </script>
    ";
}

if($_SESSION["roles"] != "admin"){
    echo "
    <script>
        alert('Anda bukan admin')
        window.location = '../login/index.php'
    </script>
    ";
}

$id = $_GET["id"];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi = $id")[0];

?>

<?php include '../layout/sidebar.php' ?>

<div class="main">
    <h3>Data Transaksi</h3>

    <div class="detail-transaksi">
        <div class="foto">
            <img src="../foto/<?= $transaksi['foto_produk']; ?>" width="250px" alt="">
        </div>

        <div class="transaksi">
            <h3>Nama Pembeli : <?= $transaksi["name"]; ?></h3>
            <h3>Alamat : <?= $transaksi["alamat"]; ?></h3>
            <h3>Nomor Handphone : <?= $transaksi["no_hp"]; ?></h3>
            <h3>Nama Produk : <?= $transaksi['nama_produk']; ?></h3>
            <h3>Harga produk : <?= number_format($transaksi["harga_produk"]); ?></h3>
            <h3>Sub Total Harga : <?= number_format($transaksi["subtotal"]); ?></h3>
            <h3>Status : <?= $transaksi["status"]; ?></h3>
        <?php
        if($transaksi['status'] == "proses"){
            ?>
            <div class="aksi">
            <a href="verif.php?id=<?= $transaksi["id_transaksi"]; ?>" class="verif">Verifikasi Transaksi</a>
            <a href="reject.php?id=<?= $transaksi["id_transaksi"]; ?>" class="reject">Reject</a>
            </div>
            <?php
        }else if($transaksi["status"] == "dikirim"){
            ?>
                <button>Produk telah dikirim</button>
            <?php
        }else if($transaksi["status"] == "ditolak"){
            ?>
                <button>Produk telah ditolak</button>
            <?php
        }
        ?>
        </div>


    </div>
</div>