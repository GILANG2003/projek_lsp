<?php

session_start();

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
?>

<?php include '../layout/sidebar.php' ?>

<div class="main">
    <h2>Selamat datang di Gepstore, Jual beli printer berkualitas</h2>
</div>