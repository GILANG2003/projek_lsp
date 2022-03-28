<?php include 'layout/navbar.php'; ?>

<?php

$data = query("SELECT * FROM transaksi WHERE name = '{$_SESSION['name']}'");

?>


<div class="container">

    <div class="informasi">
        <h2>Halo, Selamat Datang <?= $_SESSION["name"]; ?> ini Dashboard Belanja Mu</h2><br><br>

        <p>Status = proses <br> Mohon bersabar, produk kamu sedang di proses oleh admin</p>

        <p>Status = dikirim <br> Mohon tunggu di rumah, produk kamu sedang dalam pengiriman</p>
        
        <p>Status = ditolak <br> Mohon diperiksa kembali tenggat pembayaran, pembayaran kamu telah melewati masa waktu yang diberikan</p>
    </div>

    <div class="data-transaksi">
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nama Produk</th>
            <th>Alamat</th>
            <th>Harga Produk</th>
            <th>Foto Produk</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($data as $data) : ?>
        <tr>
                <td><?= $i; ?></td>
                <td><?= $data["name"]; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td>Rp. <?= number_format($data["harga_produk"]); ?></td>
                <td><img src="foto/<?= $data["foto_produk"]; ?>" width="80px" alt=""></td>
                <td><?= $data["status"]; ?></td>
                <td>
                    <a href="detail_transaksi.php?id=<?= $data["id_transaksi"]; ?>" class="detail">Detail Transaksi</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
    </table>
    </div>
</div>