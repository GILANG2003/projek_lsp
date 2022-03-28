<?php include 'layout/navbar.php'; ?>

<?php

$id = $_GET["id"];
$data = query("SELECT * FROM product WHERE id_produk = $id")[0];

?>

<div class="container">
    <div class="text-detail-produk">
        <h2>Detail Produk</h2>
    </div>

    <div class="wrapper-detail-produk">
        <div class="item">
            <img src="foto/<?= $data["foto_produk"]; ?>" alt="">
        </div>

        <form action="" method="POST">
            <div class="detail-produk">
                <h4 class="nama-produk">Nama Produk : <?= $data["nama_produk"]; ?></h4>
                <p class="harga-produk">Harga Produk : <?= $data["harga_produk"]; ?></p>
                
                <p class="deskripsi-produk">Deskripsi Produk : <?= $data["deskripsi_produk"]; ?></p> 

                <p class="stok-produk">Stok Produk : <?= $data["stok_produk"]; ?></p>
                <label>Kuantitas</label>
                <input type="number" name="qty" value="1"> <br> <br>

                <button type="submit" name="beli">Beli Sekarang</button>
            </div>
        </form>
    </div>
</div>

<?php

    if(isset($_POST["beli"])) {
        $qty = $_POST["qty"];
        $_SESSION["cart"][$id] = $qty;

        echo '
        <script type="text/javascript">
            alert("Produk telah ditambahkan ke Keranjang Belanja")
        </script>';
        
        echo '
        <script type="text/javascript">
            location = "cart.php";
        </script>';
        
    }

?>