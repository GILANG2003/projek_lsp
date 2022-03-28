<?php

require '../koneksi.php';

function query($query){

    global $conn;

    $rows = [];

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;

}

function tambahProduk($data){

    global $conn;

    $nama_produk = $data["nama_produk"];
    $harga_produk = $data["harga_produk"];
    $foto_produk = $_FILES["foto_produk"]["name"];
    $files = $_FILES["foto_produk"]["tmp_name"];
    $deskripsi_produk = $data["deskripsi_produk"];
    $stok_produk = $data["stok_produk"];

    $query = "INSERT INTO product VALUES(NULL, '$nama_produk', '$harga_produk', '$foto_produk', '$deskripsi_produk', '$stok_produk')";

    move_uploaded_file($files, "../foto/".$foto_produk);
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    
}

function hapusProduk($id){

    global $conn;

    mysqli_query($conn, "DELETE FROM product WHERE id_produk = $id");

    return mysqli_affected_rows($conn);


}

function editProduk($data){

    global $conn;

    $id = $data["id_produk"];
    $nama_produk = $data["nama_produk"];
    $harga_produk = $data["harga_produk"];
    $foto_produk = $_FILES["foto_produk"]["name"];
    $files = $_FILES["foto_produk"]["tmp_name"];
    $deskripsi_produk = $data["deskripsi_produk"];
    $stok_produk = $data["stok_produk"];

    if(empty($foto_produk)){

        $query = "UPDATE product SET 
        nama_produk = '$nama_produk',
        harga_produk = '$harga_produk',
        deskripsi_produk = '$deskripsi_produk',
        stok_produk = '$stok_produk' WHERE id_produk = '$id'
        ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    
    }else{

        $query = "UPDATE product SET 
        nama_produk = '$nama_produk',
        harga_produk = '$harga_produk',
        foto_produk = '$foto_produk',
        deskripsi_produk = '$deskripsi_produk',
        stok_produk = '$stok_produk' WHERE id_produk = '$id'
        ";

        move_uploaded_file($files, "../foto/".$foto_produk);

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

}

?>