<?php
$conn = mysqli_connect("localhost", "root", "", "toko_laptop");

function queryProduk($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambahProduk($data) {
    global $conn;

    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga"]);
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $query = "INSERT INTO produk VALUES('', '$nama_produk', '$harga', '$foto', '$deskripsi')";
    mysqli_query($conn, $query);

    move_uploaded_file($files, "image/" . $foto);
    return mysqli_affected_rows($conn);
}

function hapusProduk($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id'");
    return mysqli_affected_rows($conn);
}

function editProduk($data)
{
    global $conn;

    $id = htmlspecialchars($data["id_produk"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $foto = htmlspecialchars($data["foto"]);
    $files = $_FILES["foto"]["tmp_name"];
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

 if (empty($foto)) {
        $query = "UPDATE produk SET
        nama_produk = '$nama_produk',
        harga = '$harga',     
        deskripsi = '$deskripsi' WHERE id_produk = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } else {
        $query = "UPDATE produk SET
        nama_produk = '$nama_produk',
        harga = '$harga',
        foto = '$foto',
        deskripsi = '$deskripsi' WHERE id_produk = '$id'";

        move_uploaded_file($files, "image/" . $foto);

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}