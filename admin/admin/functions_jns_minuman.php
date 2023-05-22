<?php
//koneksi dengan database
$koneksi = mysqli_connect("localhost", "root", "", "si_penjualan_makanan_dishserve");

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id_jns_minuman){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM jenis_minuman WHERE id_jns_minuman = $id_jns_minuman");
    return mysqli_affected_rows($koneksi);
}

?>