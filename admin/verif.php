<?php

require '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "UPDATE transaksi SET status='dikirim' WHERE id_transaksi= '$id'");

if($query){
    echo '
    <script type="text/javascript">
    alert("Data berhasil diverifikasi");
    window.location = "transaksi.php";
    </script>
    ';
}

?>