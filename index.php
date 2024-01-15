<?php
require 'function.php';
$produk = queryProduk("SELECT * FROM produk");
?>

<div class="content">
    <h1>Data produk</h1>
    <a href="tambah_produk.php">Tambah produk</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($produk as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><?= $data["harga"]; ?></td> 
                <td><img style="widht: 200px;" src="image/<?= $data["foto"];  ?>" alt=""></td>
                <td><?= $data["deskripsi"]; ?></td>
                <td>
                    <a href="hapus_produk.php?id=<?= $data["id_produk"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                    <a href="edit_produk.php?id=<?= $data["id_produk"]; ?>">Edit</a>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</div>