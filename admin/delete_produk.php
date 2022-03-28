<?php

require 'function.php';

$id = $_GET['id'];

if(hapusProduk($id) > 0 ){
    echo"
    <script type='text/javascript'>
        alert('Data Produk Berhasil diapus!')
        window.location = 'product.php';
    </script>
    ";
}else{
    echo"
    <script type='text/javascript'>
        alert('Data Produk gagal diapus!')
        window.location = 'product.php';
    </script>
    ";
}