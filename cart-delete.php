<?php

session_start();
$id = $_GET['id'];
unset($_SESSION["cart"][$id]);
echo "<script text='text/javascript'>
alert('Produk Telah terhapus!');
window.location = 'index.php'
</script>";

if (isset($_SESSION["cart"]) < 0) {
    echo "<script text='text/javascript'>
    alert('Keranjang belanja anda kosong!, silahkan berbelanja terlebih dahulu');
    window.location = 'index.php'
    </script>";
}

?>