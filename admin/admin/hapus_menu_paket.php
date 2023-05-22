<?php

require 'functions_menu_paket.php';
$id_paket = $_GET["id_paket"];
if(hapus($id_paket) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = '?page=admin&aksi=lihat_menu';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = '?page=admin&aksi=lihat_menu';
        </script>
    ";
}
?>