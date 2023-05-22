
		<div class="col-md-8">
		<div class="panel panel-primary">
		<div class="panel-heading">
		<h3>Input Data Minuman</h3>
		</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
								<form  action="" method="post" enctype="multipart/form-data" role="form">
								<div class="form-group">
								    <label>Id Minuman</label>
								    <input type="text" name="id_minuman" class="form-control" placeholder="Masukkan nama Minuman" />							 
								</div>
								<div class="form-group">
								    <label>Nama Minuman</label>
								    <input type="text" name="nama_minuman" class="form-control" placeholder="Masukkan nama Minuman" />							 
								</div>
								<div class="form-group">
								    <label>Id Jenis Minuman</label>
								    <input type="text" name="id_jns_minuman" class="form-control" placeholder="Masukkan id Jenis Minuman" />							 
								</div>
								<div class="form-group">
								    <label> Harga Minuman</label>
								    <input type="text" name="harga" class="form-control" placeholder=" Masukkan Harga Minuman" />
								</div>
								<div class="form-group">
								    <label> Stock Minuman</label>
								    <input type="text" name="jmlh_stok" class="form-control" placeholder=" Masukkan Jumlah Stock" />
								</div>
								
								<div class="form-group">
								    <label> Keterangan</label>
								    <input type="text" name="ket" class="form-control" placeholder=" Masukkan Keterangan" />
								</div>
								<div class="form-group">
								    <label>Gambar Minuman</label>

								    <input type="file" name="gbr_minuman" style="height: 30px; color: white; background-color: dodgerblue;" />
								</div>
								<div class="form-group">
									<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
									<input type="reset" name="reset" value="Reset" class="btn btn-danger">
									
								</div>
								</form>
								<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'oneksi.php';

	// membuat variabel untuk menampung data dari form
  $id_minuman   = @$_POST['id_minuman'];
  $id_jns_minuman = @$_POST['id_jns_minuman'];
  $nama_minuman   = @$_POST['nama_minuman'];
  $harga     = @$_POST['harga'];
  $jmlh_stok    = @$_POST['jmlh_stok'];
  $ket    = @$_POST['ket'];
  $gbr_minuman = @$_FILES['gbr_minuman']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gbr_minuman != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gbr_minuman); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gbr_minuman']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gbr_minuman; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../asset/images/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO minuman (id_minuman, nama_minuman, id_jns_minuman, harga, jmlh_stok, ket, gbr_minuman) VALUES ('$id_minuman', '$nama_minuman', '$id_jns_minuman', '$harga', '$jmlh_stok', '$ket', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='?page=admin&aksi=tampil_barang';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='?page=admin&aksi=';</script>";
            }
}
?>
	
			</div>
		</div>
	</div>
		</div>
		</div>