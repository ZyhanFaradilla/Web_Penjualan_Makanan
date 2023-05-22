<?php

require 'functions_minuman.php';
$id_minuman = $_GET["id_minuman"];
if(hapus($id_minuman) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = '?page=admin&aksi=tampil_barang';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = '?page=admin&aksi=tampil_barang';
        </script>
    ";
}
?>