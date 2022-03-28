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

if(isset($_POST["submit"])){
    if(tambahProduk($_POST) > 0 ){
        echo "
        <script type='text/javascript'>
            alert('Data Berhasil Ditambahkan');
            window.location = 'product.php';
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data Gagal Ditambahkan');
            window.location = 'tambah_produk.php';
        </script>
        ";
    }
}


?>

<?php include '../layout/sidebar.php' ?>

<div class="main">
    
    <div class="box">
        <h2>Tambah Produk</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control"> <br><br>

            <label>Harga Produk</label>
            <input type="text" name="harga_produk" class="form-control"> <br><br>

            <label>Foto Produk</label>
            <input type="file" name="foto_produk" class="form-control"> <br><br>
            
            <label>Deskripsi Produk</label> <br>
            <textarea name="deskripsi_produk" rows="10" class="form-control"></textarea> <br><br>
            
            <label>Stok Produk</label>
            <input type="text" name="stok_produk" class="form-control"> <br><br>

            <button type="submit" name="submit">Tambah Produk</button>
        </form>
    </div>
</div>