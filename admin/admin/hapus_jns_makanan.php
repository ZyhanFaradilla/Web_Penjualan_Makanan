<?php

require 'functions_jns_makanan.php';
$id_jns_makanan = $_GET["id_jns_makanan"];
if(hapus($id_jns_makanan) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = '?page=admin&aksi=lihat_jns_makanan';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = '?page=admin&aksi=lihat_jns_makanan';
        </script>
    ";
}
?>