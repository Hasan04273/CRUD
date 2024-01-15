<?php

require 'function.php';

$id = $_GET["id"];
$produk = queryProduk("SELECT * FROM produk WHERE id_produk = '$id'")[0];


if (isset($_POST["submit"])) {
    if (editProduk($_POST) > 0) {
        echo "
        <script type='text/javascript'>
            alert('Yay, Data berhasil diedit');
            window.location = 'index.php'
        </script>
       ";
    } else {
        echo "  
        <script type='text/javascript'>
            alert('Yahh, Data gagal diedit');
            window.location = 'index.php'
        </script>
       ";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>

<body>
    <div class="Edit-produk">
        <h1>Edit Produk</h1>
        <form action="" method="POST">
            <input type="hidden" name="id_produk" class="form-control" value="<?= $produk["id_produk"]; ?>"><br /> <br />
            <label>Nama Produk</label><br />
            <input type="text" name="nama_produk" class="form-control" value="<?= $produk["nama_produk"]; ?>"><br /> <br />

            <label>Harga</label><br />
            <input type="number" name="harga" class="form-control" value="<?= $produk["harga"]; ?>"><br /><br />

            <label>Foto</label><br>
            <input type="file" name="foto" class="form-control" value="<?= $produk["harga"]; ?>"><br><br>

            <label>Deskripsi Produk</label><br>
            <textarea name="deskripsi" id="" cols="30" rows="7"><?= $produk["deskripsi"]; ?></textarea><br><br>

            <button type="submit" name="submit">Edit</button>
        </form>
    </div>
</body>

</html>