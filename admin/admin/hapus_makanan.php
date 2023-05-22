<?php

require 'functions_makanan.php';
$id_makanan = $_GET["id_makanan"];
if(hapus($id_makanan) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = '?page=admin&aksi=lihat_makanan';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = '?page=admin&aksi=lihat_makanan';
        </script>
    ";
}
?>