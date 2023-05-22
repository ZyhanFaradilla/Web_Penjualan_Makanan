<?php
//koneksi dengan database
$koneksi = mysqli_connect("localhost", "root", "", "penjualan_mvc");

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($makanan){
    global $koneksi;
    $id_makanan = $makanan["id_makanan"];
    $nama_makanan = $makanan["nama_makanan"];
    $harga = $makanan["harga"];
    $ket = $makanan["ket"];
    $gbr_makanan = $makanan["gbr_makanan"];

    
    //tambah data ke tabel
    $query = "INSERT INTO makanan VALUES ('$id_makanan', '$nama_makanan', '$harga', '$ket', '$gbr_makanan')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id_makanan){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM makanan WHERE id_makanan = $id_makanan");
    return mysqli_affected_rows($koneksi);
}
