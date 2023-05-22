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

function hapus($id_jns_makanan){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM jenis_makanan WHERE id_jns_makanan = $id_jns_makanan");
    return mysqli_affected_rows($koneksi);
}

?>