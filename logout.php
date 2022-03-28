<?php

session_start();

unset($_SESSION["username"]);
session_destroy();
echo "
<script>
    alert('Logout Berhasil')
    window.location = 'login/index.php'
</script>
";

?>