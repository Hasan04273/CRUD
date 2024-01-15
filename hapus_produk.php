<?php
require 'function.php';
$id = $_GET["id"];

if (hapusProduk($id) > 0) {
    echo "
    <script type='text/javascript'>
        alert('Yey, Data berhasil dihapus');
        window.location = 'index.php'
    </script>
   ";
} else {
    echo "
    <script type='text/javascript'>
        alert('Yahh, Data gagal dihapus');
        window.location = 'index.php'
    </script>
   ";
}
