<?php

require 'functions_jns_minuman.php';
$id_jns_minuman = $_GET["id_jns_minuman"];
if(hapus($id_jns_minuman) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = '?page=admin&aksi=lihat_jns_minuman';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = '?page=admin&aksi=lihat_jns_minuman';
        </script>
    ";
}
?>