<?php

require '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "UPDATE transaksi SET status='ditolak' WHERE id_transaksi= '$id'");

if($query){
    echo '
    <script type="text/javascript">
    alert("Data berhasil di tolak");
    window.location = "transaksi.php";
    </script>
    ';
}

?>