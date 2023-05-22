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

function tambah($menu_paket){
    global $koneksi;
    $id_paket = $menu_paket["id_paket"];
    $id_makanan = $menu_paket["id_makanan"];
    $id_minuman = $menu_paket["id_minuman"];
    $id_harga_paket = $menu_paket["id_harga_paket"];
    $nama_paket = $menu_paket["nama_paket"];
    $quantity = $menu_paket["quantity"];
    $harga = $menu_paket["harga"];
    $ket = $menu_paket["ket"];
    $gbr_paket = $menu_paket["gbr_paket"];

    
    //tambah data ke tabel
    $query = "INSERT INTO menu_paket VALUES ('$id_paket', '$id_makanan', '$id_minuman', '$id_harga_paket',
     '$nama_paket', '$quantity', '$harga', '$ket', '$gbr_paket)";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id_paket){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM menu_paket WHERE id_paket = $id_paket");
    return mysqli_affected_rows($koneksi);
}

?>