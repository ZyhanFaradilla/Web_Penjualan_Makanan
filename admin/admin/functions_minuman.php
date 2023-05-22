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

function tambah($minuman){
    global $koneksi;
    $id_minuman = $minuman["id_minuman"];
    $id_jns_minuman = $minuman["id_jns_minuman"];
    $nama_minuman = $minuman["nama_minuman"];
    $harga = $minuman["harga"];
    $jmlh_stok = $minuman["jmlh_stok"];
    $ket = $minuman["ket"];
    $gbr_minuman = $minuman["gbr_minuman"];

    
    //tambah data ke tabel
    $query = "INSERT INTO minuman VALUES ('$id_minuman', '$id_jns_minuman', '$nama_minuman', '$harga', '$jmlh_stok', '$ket', '$gbr_minuman')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id_minuman){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM minuman WHERE id_minuman = $id_minuman");
    return mysqli_affected_rows($koneksi);
}

?>