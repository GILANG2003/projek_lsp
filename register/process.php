<?php

require '../koneksi.php';

function tambahUser($data){
    global $conn;

    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $roles = $_POST["roles"];

    $query = mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$name', '$password', '$roles')");

    return mysqli_affected_rows($conn);

}
?>