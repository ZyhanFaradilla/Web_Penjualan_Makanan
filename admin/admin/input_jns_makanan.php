
		<div class="col-md-8">
		<div class="panel panel-primary">
		<div class="panel-heading">
		<h3>Input Data Jenis Makanan</h3>
		</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
								<form  action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
								    <label>Id Jenis Makanan</label>
								    <input type="text" name="id_jns_makanan" class="form-control" placeholder="Masukkan id Jenis Makanan" />							 
								</div>
								<div class="form-group">
								    <label>Nama Jenis Makanan</label>
								    <input type="text" name="nama_jns_makanan" class="form-control" placeholder="Masukkan nama Jenis Makanan" />							 
								</div>
								
								<div class="form-group">
								    <label> Keterangan</label>
								    <input type="text" name="ket" class="form-control" placeholder=" Masukkan Keterangan" />
								</div>
								<div class="form-group">
								    <label>Gambar Jenis Makanan</label>

								    <input type="file" name="gbr_jns_makanan" style="height: 30px; color: white; background-color: dodgerblue;" />
								</div>
								<div class="form-group">
									<input type="submit" name="submit" value="Simpan" class="btn btn-info">
									<input type="reset" name="reset" value="Reset" class="btn btn-danger">
									
								</div>
								</form>
								<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'oneksi.php';

	// membuat variabel untuk menampung data dari form
  $id_jns_makanan   = @$_POST['id_jns_makanan'];
  $nama_jns_makanan   = @$_POST['nama_jns_makanan'];
  $ket    = @$_POST['ket'];
  $gbr_jns_makanan = @$_FILES['gbr_jns_makanan']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gbr_jns_makanan != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gbr_jns_makanan); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gbr_jns_makanan']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gbr_jns_makanan; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../asset/images/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO jenis_makanan (id_jns_makanan, nama_jns_makanan, ket, gbr_jns_makanan) VALUES ('$id_jns_makanan', '$nama_jns_makanan', '$ket', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='?page=admin&aksi=lihat_jns_makanan';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='?page=admin&aksi=jns_makanan';</script>";
            }
}
?>
	
			</div>
		</div>
	</div>
		</div>
		</div>