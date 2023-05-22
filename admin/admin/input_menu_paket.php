
		<div class="col-md-8">
		<div class="panel panel-primary">
		<div class="panel-heading">
		<h3>Input Data Menu Paket</h3>
		</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
								<form  action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
								    <label>Nama Paket</label>
								    <input type="text" name="nama_paket" class="form-control" placeholder="Masukkan nama Paket" />							 
								</div>
								<div class="form-group">
								    <label> Harga Paket</label>
								    <input type="text" name="harga" class="form-control" placeholder=" Masukkan Harga Paket" />
								</div>
								<div class="form-group">
								    <label> Id Makanan</label>
								    <input type="text" name="id_makanan" class="form-control" placeholder=" Masukkan Id Makanan" />
								</div>
								<div class="form-group">
								    <label> Id Minuman</label>
								    <input type="text" name="id_minuman" class="form-control" placeholder=" Masukkan Id Minuman" />
								</div>
								<div class="form-group">
								    <label> Quantity</label>
								    <input type="text" name="quantity" class="form-control" placeholder=" Masukkan Quantity" />
								</div>
								
								<div class="form-group">
								    <label> Keterangan</label>
								    <input type="text" name="ket" class="form-control" placeholder=" Masukkan Keterangan" />
								</div>
								<div class="form-group">
								    <label>Gambar Paket</label>

								    <input type="file" name="gbr_paket" style="height: 30px; color: white; background-color: dodgerblue;" />
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
    $id_paket = @$_POST['id_paket'];
    $nama_paket = @$_POST['nama_paket'];
	$id_makanan = @$_POST['id_makanan'];
	$id_minuman = @$_POST['id_minumnan'];
    $quantity = @$_POST['quantity'];
    $harga = @$_POST['harga'];
    $ket = @$_POST['ket'];
    $gbr_paket = @$_FILES['gbr_paket']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gbr_paket != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gbr_paket); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gbr_paket']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gbr_paket; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../asset/images/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO menu_paket (nama_paket, id_makanan, id_minuman, quantity, harga, ket, gbr_paket) VALUES ('$nama_paket', '$id_makanan', '$id_minuman', '$quantity', '$harga', '$ket', '$nama_gambar_baru')";
				  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='?page=admin&aksi=lihat_menu';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='?page=admin&aksi=menu_paket';</script>";
            }
}
?>
	
			</div>
		</div>
	</div>
		</div>
		</div>