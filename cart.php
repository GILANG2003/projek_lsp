<?php include 'layout/navbar.php'; ?>

<?php

if(empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "<script>alert('Keranjang kosong, silahkan berbelanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>
<div class="container">
    <?php foreach($_SESSION["cart"] as $id_produk => $hasil) : ?>
    <?php
        $data = query("SELECT * FROM product WHERE id_produk = $id_produk")[0];
        $subtotalHarga = $hasil * $data["harga_produk"];

    ?>

    <div class="cart-cart">
        <img src="foto/<?= $data["foto_produk"]; ?>" width="20%" alt="">
        <div class="child-cart">
            <h4>Nama Produk : <?= $data["nama_produk"]; ?></h4>
            <h4>Harga Satuan : Rp. <?= number_format($data["harga_produk"]); ?></h4>
            <h4 style="margin-top: 10px;">Total Harga : Rp. <?= number_format($subtotalHarga); ?></h4>
            <h4 style="margin-top: 10px; margin-bottom: 20px;"><?php echo $_SESSION['name']; ?></h4>

            <a href="cart-delete.php?id=<?= $data['id_produk']; ?>" class="cart-delete">Hapus</a>

            <a href="checkout.php" class="checkout">Checkout Produk</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
